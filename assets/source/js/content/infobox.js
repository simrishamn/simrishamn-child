function insert(editor, html) {
    const { dom } = editor;
    const root = dom.getRoot();
    const first = root.firstChild;
    const fragment = dom.createFragment(html);

    root.insertBefore(fragment, first);
}

export default (editor) => {
    const titleText = editor.getLang('infobox.titleText', 'Title');
    const contentText = editor.getLang('infobox.contentText', 'Content');
    const buttonTitle = editor.getLang('infobox.buttonTitle', 'Infobox');

    const html = `
            <div class="infobox">
                <div class="title">
                    <h2>${titleText}</h2>
                </div>

                <div class="content">
                    ${contentText}
                </div>
            </div>
        `;

    editor.addButton('infobox', {
        title: buttonTitle,
        icon: 'template',
        onClick: () => insert(editor, html),
    });
};
