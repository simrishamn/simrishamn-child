function applyModularityAdditions() {
    const query = 'meta[name=modularity-additions]';
    const content = jQuery(query).attr('content');
    const modules = Modularity.Editor.Module;

    if (!modules || !content) {
        return;
    }

    const data = JSON.parse(content) || {};

    Object.entries(data).forEach(([target, entries]) => {
        const area = jQuery(`#modularity-mb-${target} ul`);

        entries.forEach((params) => {
            modules.addModule(area, ...params);
        });
    });
}

export default () => {
    applyModularityAdditions();
};
