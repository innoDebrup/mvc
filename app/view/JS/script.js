$(document).ready(function() {
  $('#otpcon').hide();
  $("#check").click(function() {
    $.ajax({
      url: 'controller/OTPProcess.php', // PHP file handling the request
      type: 'POST', // Request method
      data: { // Data to be sent to the server
        message: 'Hello from AJAX!',
        email: $('#email').val()
      },
      success: function(response) { // Callback function to handle successful AJAX response
        $("#response").html(response); // Update HTML content with response
        $('#otpcon').slideDown(200);
        $('#check').val('Resend OTP');
      },
      error: function(xhr, status, error) { // Callback function to handle error
        console.error(xhr.responseText);  
      }
    });
  });
});