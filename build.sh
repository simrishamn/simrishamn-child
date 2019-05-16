#!/bin/bash

REPO_REV="$(cat 'package-lock.json' | sha256sum)"
NODE_REV="$(cat 'node_modules/.npm' | sha256sum)"

set -o errexit -o nounset

# Build translations.
find languages -iname "*.po" | while read lang; do
    msgfmt "$lang" -o "$(echo $lang | sed 's/po$/mo/')"
done

# Install dependencies.
if [ ! -e 'package-lock.json' ]; then
    npm install
elif [ "$REPO_REV" != "$NODE_REV" ]; then
    npm ci
fi

# Copy lock.
cp 'package-lock.json' 'node_modules/.npm'

# Build assets.
npm run production

# Run checks.
npm run --silent sass-lint || true
npm run --silent eslint || true
phpcs || true
