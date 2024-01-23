$(document).ready(function() {
    // Intercept form submission
    $('#conversionForm').submit(function(event) {
      event.preventDefault();

      // Show loading modal
      $('#loadingModal').modal('show');

      // Perform the form submission using AJAX
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the success response, if needed
          console.log(response);
        },
        error: function(error) {
          // Handle the error response, if needed
          console.error(error);
        },
        complete: function() {
          // Hide loading modal after the request is complete
          $('#loadingModal').modal('hide');
        }
      });
    });
  });
