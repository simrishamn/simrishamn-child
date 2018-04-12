const META = {
    name: "Simrishamn",
    url: "https://github.com/simrishamn",
};


function plugin(editor, url) {
    return { getMetadata: () => META };
}


tinymce.PluginManager.add('simrishamn', plugin);
