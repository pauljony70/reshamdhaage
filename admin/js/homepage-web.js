var code_ajax = $("#code_ajax").val();
$('#imageUploadForm').parsley();


var modal = $('#imageUploadModal');
var form = $('#imageUploadForm');

function uploadTopCategory(event) {
    event.preventDefault();

    var button = event.target;

    // Set values of hidden inputs
    var id = button.getAttribute('data-id');
    var link = button.getAttribute('data-link');
    var type = button.getAttribute('data-type');
    $('#uploadId').val(id);
    $('#uploadLink').val(link);
    $('#bannerType').val(type);

    // Open the modal
    modal.modal('show');
}

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
            successmsg(response.message);
            $('#' + $('#bannerType').val()).css('background-image', 'url(' + $('#base_url').val() + 'media/' + response.filePath + ')');
            // Close the modal if needed
            modal.modal('hide');
            // Reset the form
            $('#imageUploadForm').parsley().reset();
            form[0].reset();
        },
        error: function (error) {
            console.error(error);
        }
    });
});

