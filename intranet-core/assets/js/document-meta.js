jQuery(document).ready(function ($) {
    let fileFrame;

    $('#upload_button').on('click', function (e) {
        e.preventDefault();

        // If the media frame already exists, reopen it.
        if (fileFrame) {
            fileFrame.open();
            return;
        }

        // Create a new media frame.
        fileFrame = wp.media({
            title: 'Select or Upload File',
            button: {
                text: 'Use this file',
            },
            multiple: false, // Only allow one file.
        });

        // When a file is selected, run a callback.
        fileFrame.on('select', function () {
            const attachment = fileFrame.state().get('selection').first().toJSON();
            $('#document_file_url').val(attachment.url); // Set the URL in the hidden field.
            $('#uploaded_file_preview').html('<a href="' + attachment.url + '" target="_blank">View File</a>');
        });

        // Finally, open the modal.
        fileFrame.open();
    });
});