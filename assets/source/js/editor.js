import infobox from './content/infobox';

const META = {
    name: 'Simrishamn',
    url: 'https://github.com/simrishamn',
};

function plugin(editor, url) {
    infobox(editor, url);
    return { getMetadata: () => META };
}

tinymce.PluginManager.add('simrishamn', plugin);
