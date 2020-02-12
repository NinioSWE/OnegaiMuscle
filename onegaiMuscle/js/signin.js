$(function() {

  $("#signinForm input,#signinForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var username = $("#signinForm input#username").val();
      var pass = $("#signinForm input#password").val();
      var imageLink = $("#signinForm input#imageLink").val();
      $this = $("#signinForm #sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././methods.php",
        type: "POST",
        data: {
		  q: 'signin',
          username: username,
          pass: pass,
          imageURL: imageLink
        },
        cache: false,
        success: function(data) {
			console.log(data);
			if(data.trim() == 'success'){
				// Success message
			  $('#signinForm #success').html("<div class='alert alert-success'>");
			  $('#signinForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#signinForm #success > .alert-success')
				.append("<strong>Account is created!</strong>");
			  $('#signinForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#signinForm').trigger("reset");
			}else if(data.trim() == 'UsernameExist'){
				// Success message
			  $('#signinForm #success').html("<div class='alert alert-success'>");
			  $('#signinForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#signinForm #success > .alert-success')
				.append("<strong>Username exits.</strong>");
			  $('#signinForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#signinForm').trigger("reset");
			}
			else{
			
			  // Success message
			  $('#signinForm #success').html("<div class='alert alert-success'>");
			  $('#signinForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#signinForm #success > .alert-success')
				.append("<strong>Something went wrong.</strong>");
			  $('#signinForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#signinForm').trigger("reset");
			}
        },
        error: function() {
          // Fail message
          $('#signinForm #success').html("<div class='alert alert-danger'>");
          $('#signinForm #success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#signinForm #success > .alert-danger').append($("<strong>").text("Sorry it seems that my mail server is not responding. Please try again later!"));
          $('#signinForm #success > .alert-danger').append('</div>');
          //clear all fields
          $('#signinForm').trigger("reset");
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
  $('#signinForm #success').html('');
});
