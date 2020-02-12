$(function() {

  $("#addTimeForm input,#addTimeForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var runningTime = $("#addTimeForm input#runningTime").val();
      var distance = $("#addTimeForm input#distance").val();
	  var yourId = $("#addTimeForm input#yourId").val();
      $this = $("#addTimeForm #sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././methods.php",
        type: "POST",
        data: {
		  q: 'addTime',
          userID: yourId,
          runningTime: runningTime,
		  distance: distance
        },
        cache: false,
        success: function(data) {
			console.log(data);
			if(data.trim() == 'success'){
				// Success message
			  $('#addTimeForm #success').html("<div class='alert alert-success'>");
			  $('#addTimeForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#addTimeForm #success > .alert-success')
				.append("<strong>Time added!</strong>");
			  $('#addTimeForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#addTimeForm').trigger("reset");
			}else{
			
			  // Success message
			  $('#addTimeForm #success').html("<div class='alert alert-success'>");
			  $('#addTimeForm #success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			  $('#addTimeForm #success > .alert-success')
				.append("<strong>Something went wrong.</strong>");
			  $('#addTimeForm #success > .alert-success')
				.append('</div>');
			  //clear all fields
			  $('#addTimeForm').trigger("reset");
			}
        },
        error: function() {
          // Fail message
          $('#addTimeForm #success').html("<div class='alert alert-danger'>");
          $('#addTimeForm #success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#addTimeForm #success > .alert-danger').append($("<strong>").text("Sorry it seems that my server is not responding. Please try again later!"));
          $('#addTimeForm #success > .alert-danger').append('</div>');
          //clear all fields
          $('#addTimeForm').trigger("reset");
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
  $('#addTimeForm #success').html('');
});
