var code_ajax = $("#code_ajax").val();
$('#imageUploadForm').parsley();
function uploadTopCategory(event) {
    event.preventDefault();

    var button = event.target;
    var modal = $('#imageUploadModal');
    var form = $('#imageUploadForm');

    // Set values of hidden inputs
    var id = button.getAttribute('data-id');
    var link = button.getAttribute('data-link');
    $('#uploadId').val(id);
    $('#uploadLink').val(link);

    // Open the modal
    modal.modal('show');

    // Handle form submission using AJAX
    form.submit(function (e) {
        e.preventDefault();
        // Append the CSRF token to form data
        var formData = new FormData(form[0]);
        formData.append('code', code_ajax);

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Handle the response here (update UI, show messages, etc.)
                console.log(response);
                // Close the modal if needed
                modal.modal('hide');
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
}
