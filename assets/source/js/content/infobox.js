function insert(editor, html) {
    let dom = editor.dom;
    let root = dom.getRoot();
    let first = root.firstChild
    let fragment = dom.createFragment(html);

    root.insertBefore(fragment, first);
}

export default (editor) => {
    const titleText = editor.getLang('infobox.titleText', 'Title'),
        contentText = editor.getLang('infobox.contentText', 'Content'),
        buttonTitle = editor.getLang('infobox.buttonTitle', 'Infobox'),
        html = `
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
}
