 $(function() {
	 $("#logoutButton").on("click",function(){
		$.ajax({
			url: "././methods.php",
			type: "POST",
			data: {
			  q: 'logout'
			},
			cache: false,
			success: function() {
				window.location.reload(true);
		  }
		});
	});
});