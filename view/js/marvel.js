function showSuccess(message) {
    iziToast.success({
        title: 'Sucesso!',
        message: message,
    });
}

function showError(message) {
    iziToast.error({
        title: 'Erro!',
        message: message,
    });
}