/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function() {	
	function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	}

	$("#btn-admin").click(function() {
		var data = $("#login-admin").serialize();

		$.ajax({
			type : 'POST',
			url  : 'http://www.grand-pillar.com/uploads/Subicjobs/loginadmin.php',
			data : data,
			beforeSend: function()
			{
				$("#error").fadeOut();
				$("#btn-login").html('<i class="fa fa-spinner"></i> &nbsp; sending ...');
			},
			success :  function(response)
			{
				console.log(response);
				//if(response=="ok"){
				if(response > 0)
				{
					$("#btn-admin").html('<i class="fa fa-spinner"></i> &nbsp; Signing In');
					setTimeout(' window.location.href = "admin.html?amdId='+response+'"; ',4000);
				}
				else
				{
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"><i class="fa fa-spinner">Error</i> &nbsp; '+response+' </div>');
						$("#btn-admin").html('<i class="fa fa-spinner"></i> &nbsp; Sign In');
					});
				}
			}
		});

		return false;
	});	 

	$("#btn-locator").click(function() {
		var data = $("#login-locator").serialize();

		$.ajax({
			type : 'POST',
			url  : 'http://www.grand-pillar.com/uploads/Subicjobs/loginlocator.php',
			data : data,
			beforeSend: function()
			{
				$("#error").fadeOut();
				$("#btn-login").html('<i class="fa fa-spinner"></i> &nbsp; sending ...');
			},
			success :  function(response)
			{	
				if(response > 0)
				{
					$("#btn-locator").html('<i class="fa fa-spinner"></i> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "company.html?locId='+response+'"; ',4000);
				}
				else
				{
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"><i class="fa fa-spinner">https</i> &nbsp; '+response+' !</div>');
						$("#btn-locator").html('<i class="fa fa-spinner"></i> &nbsp; Sign In');
					});
				}
			}
		});

		return false;
	});	 

	$("#btn-applicant").click(function() {
		var data = $("#login-applicant").serialize();

		$.ajax({
			type : 'POST',
			url  : 'http://www.grand-pillar.com/uploads/Subicjobs/loginapplicant.php',
			data : data,
			beforeSend: function()
			{
				$("#error").fadeOut();
				$("#btn-applicant").html('<i class="fa fa-spinner"></i> &nbsp; sending ...');
			},
			success :  function(response)
			{
				if(response > 0)
				{
					$("#btn-applicant").html('<i class="fa fa-spinner"></i> &nbsp; Signing In ...');
					
					var postId = getUrlParameter('postId');
					
					if(postId) {
						setTimeout(' window.location.href = "jobfulldetails.html?appId='+response+'&postId='+postId+'"; ',4000);
					} else {
						setTimeout(' window.location.href = "applicant.html?appId='+response+'"; ',4000);
					}
				}
				else
				{
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"><i class="fa fa-spinner">Error</i> &nbsp; '+response+' </div>');
						$("#btn-applicant").html('<i class="fa fa-spinner"></i> &nbsp; Sign In');
					});
				}
			}
		});

		return false;
	});		
});