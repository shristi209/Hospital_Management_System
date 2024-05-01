
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log('Editor initialized:', editor);
        })
        .catch(error => {
            console.error('Error initializing editor:', error);
        });
