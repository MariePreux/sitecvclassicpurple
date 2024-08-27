window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');
    if (status && message) {
        alert(message);
        if (status === 'success') {
            document.querySelector('form').reset();
        }
    }
}







