function applyModularityAdditions() {
    const query = "meta[name=modularity-additions]";
    const content = jQuery(query).attr('content');
    const modules = Modularity.Editor.Module;

    if (!modules || !content) {
        return;
    }

    const data = JSON.parse(content) || {};

    for (const [target, entries] of Object.entries(data)) {
        const area = jQuery(`#modularity-mb-${target} ul`);

        for (const params of entries) {
            modules.addModule(area, ...params);
        }
    }
}

export default () => {
    applyModularityAdditions();
};
