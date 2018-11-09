#!/bin/bash

set -o errexit -o nounset

# Build translations.
find languages -iname "*.po" | while read lang; do
    msgfmt "$lang" -o "$(echo $lang | sed 's/po$/mo/')"
done

# Build assets.
npm install
npm run production
npm run sass-lint
