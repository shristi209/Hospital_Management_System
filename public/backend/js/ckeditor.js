
// ClassicEditor
//     .create(document.querySelector('#editor'))
//     .then(editor => {
//         console.log('Editor initialized:', editor);
//     })
//     .catch(error => {
//         console.error('Error initializing editor:', error);
//     });

// Initialize CKEditor
ClassicEditor
    .create(document.querySelector('#editor'), {
        data: document.querySelector('#editor').value // Initialize CKEditor with textarea's value
    })
    .then(editor => {
        console.log('Editor initialized:', editor);
    })
    .catch(error => {
        console.error('Error initializing editor:', error);
    });

// Before submitting the form, set the textarea's value with CKEditor's content
document.querySelector('form').addEventListener('submit', function() {
    document.querySelector('#editor').value = CKEDITOR.instances.editor.getData();
});

