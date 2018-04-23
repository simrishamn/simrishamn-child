const html = `
    <div class="infobox">
        <div class="title">
            <h2>Title</h2>
        </div>

        <div class="content">
            Content
        </div>
    </div>
`;

function insert(editor) {
    let dom = editor.dom;
    let root = dom.getRoot();
    let first = root.firstChild
    let fragment = dom.createFragment(html);

    root.insertBefore(fragment, first);
}

export default (editor, url) => {
    editor.addButton('infobox', {
        icon: 'template',
        onClick: () => insert(editor),
    });
}
