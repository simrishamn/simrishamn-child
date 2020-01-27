function initTranslate() {
    const modal = document.getElementById('translate-modal');
    const close = document.getElementById('translate-close');
    const buttons = document.getElementsByClassName('translate-button');

    close.onclick = () => {
        modal.style.display = 'none';
    };

    buttons.forEach((button) => {
        button.onclick = () => {
            modal.style.display = 'block';
        };
    });

    window.onclick = (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
}

export default initTranslate;
