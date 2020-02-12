$(function() {

  $("#loginForm input,#loginForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var username = $("#loginForm input#username").val();
      var pass = $("#loginForm input#password").val();
      $this = $("#loginForm #sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././methods.php",
        type: "POST",
        data: {
		  q: 'login',
          username: username,
          pass: pass
        },
        cache: false,
        success: function(data) {
			console.log(data);
			if(data.trim() == 'success'){
				window.location.reload(true);
			}else{
			
			  // Success message
			  $('#loginForm #success').html("<div class='alert alert-success'>");
			  $('#loginForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#loginForm #success > .alert-success')
				.append("<strong>Couldn't login.</strong>");
			  $('#loginForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#loginForm').trigger("reset");
			}
        },
        error: function() {
          // Fail message
          $('#loginForm #success').html("<div class='alert alert-danger'>");
          $('#loginForm #success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#loginForm #success > .alert-danger').append($("<strong>").text("Sorry it seems that my mail server is not responding. Please try again later!"));
          $('#loginForm #success > .alert-danger').append('</div>');
          //clear all fields
          $('#loginForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#loginForm #success').html('');
});
