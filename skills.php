<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="icon" type="image/png" href="icon.png" />
	<title>Subic Jobs</title>
</head>
<body>
	<nav class="  blue lighten-1 " role="navigation">
		<div class="nav-wrapper container">
			<ul class="right hide-on-med-and-down">
				
				<li><a href="index.html"><img src="icons/sign-in.png" class="icon"> Logout</a></li>
				 <li><a href="" id="link8"><i class="fa fa-refresh" aria-hidden="true"> Refresh</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col s12">
			<div class="card z-depth-5">
				<div class="card-image" >
					<img id="cdImg" src="bground354.jpg">
				</div>
				<div class="col s2">
					<img id="crImg" src="icons/user.png" alt="" class="circle responsive-img z-depth-2"> 
				</div>
				<div class="card-content">
					<h4 id="hAdmin">Hello Admin!</h4>
					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s2">
			<div class="collection">
				
				<a href="" id="link1" class="collection-item">Locators List</a>
				<a href="" id="link7" class="collection-item">Applicants List <b id="pendong"></b></a>
				<a href="" id="link2" class="collection-item">Job Category</a>
				<a href="" id="link3" class="collection-item">Job Post Request <b id="pending"></b></a>
				<a href="" id="link6" class="collection-item">Evaluation <b id="eval"></b></a>
				<a href="" id="link8" class="collection-item">Skills Inventory</a>
				<a href="" id="link4" class="collection-item">Register of Eligibles <b id="roe"></b></a>
				
				
			</div>
		</div>
	
	<div class="row">
		<div class="col s10">
			<h5 class="teal white-text header2">Skills Inventory</h5>	
<form action="skills.php" method="post"> 		
		<div class="row">
		<br>
				       			<div class="input-field col l6 right">
								<input id="emp_search" type="search" name="search">
								<label class="label-icon" for="search"><i class="material-icons">search</i>Search</label>
				       			</div>
							
							<div hidden>
							<input type="submit" name="submit" value="Submit" />
							</div>
</form>			
			<table class ="highlight bordered centered responsive-table">
				<thead>
					<tr>
					
						<!--<th data-field="Action">Action</th>-->
						<th data-field="Title">Title</th>
						<th data-field="Locator">Locator</th>
						<th data-field="Date Posted">Date Posted</th>
						<th data-field="Closing Date">Closing Date</th>
						<th data-field="Applicant">Applicant</th>
						<th data-field="Tel. No">Tel. No</th>
						<th data-field="Place of Birth">Place of Birth</th>
						
					</tr>
				</thead>
				<tbody id="applist">
<?php
include("connection.php");

	
	if(isset($_POST['submit'])) {
		$search = "%".$_POST['search']."%";
		$sel = $dbh->prepare("SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c, tbl_locators d WHERE a.applicant_id = b.applicant_id AND a.application_status = 2 AND a.jobpost_id = c.jobpost_id AND c.locators_id = d.locators_id AND jobpost_title LIKE ?");
		$sel->execute([$search]);	
		$res = $sel->fetchAll(PDO::FETCH_ASSOC);
		foreach($res as $data) {
					
	?>
		
          <tr>
				<td><?php echo $data['jobpost_title']; ?></td>
				<td><?php echo $data['locators_name']; ?></td>
				<td><?php echo $data['jobpost_date_posted']; ?></td>
				<td><?php echo $data['jobpost_date_closing']; ?></td>
				<td><?php echo $data['applicant_lname']; ?>, <?php echo $data['applicant_fname']; ?></td>
				<td><?php echo $data['applicant_contact']; ?></td>
				<td><?php echo $data['applicant_pob']; ?></td>
				<td></td>
			</tr>
	<?php
		}
	} else {
		$sel = $dbh->prepare("SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c, tbl_locators d WHERE a.applicant_id = b.applicant_id AND a.application_status = 2 AND a.jobpost_id = c.jobpost_id AND c.locators_id = d.locators_id");
		$sel->execute();
		$res = $sel->fetchAll(PDO::FETCH_ASSOC);
		foreach($res as $data) {
			
	?>
			<tr>
				<td><?php echo $data['jobpost_title']; ?></td>
				<td><?php echo $data['locators_name']; ?></td>
				<td><?php echo $data['jobpost_date_posted']; ?></td>
				<td><?php echo $data['jobpost_date_closing']; ?></td>
				<td><?php echo $data['applicant_lname']; ?>, <?php echo $data['applicant_fname']; ?></td>
				<td><?php echo $data['applicant_contact']; ?></td>
				<td><?php echo $data['applicant_pob']; ?></td>
				
			
			</tr>
	<?php
		}
	}

	?>
				
				</tbody>
			</table>		
		</div>
	</div>
	</div>
	
	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>
	<script>
	$(document).ready(function() {
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
		
		function selectCount(jobId) {
			$.getJSON('server/loadData.php?applicationCount='+jobId, function(json) {
				$('#count_'+jobId).text(json.length);
			});		
		}
		
		function pendingApplicant() {
			$.getJSON('server/loadData.php?applicationPending=true', function(json) {
				$('#pendong').text(json.length);
			});		
		}
		
		pendingApplicant();	

	function pendingJob() {
			$.getJSON('server/loadData.php?jobrequestPending=true', function(json) {
				$('#pending').text(json.length);
			});		
		}
		
		pendingJob();	
		
		function pendingEvaluation() {
			$.getJSON('server/loadData.php?applicationEval=true', function(json) {
				$('#eval').text(json.length);
			});		
		}
		
		pendingEvaluation();	

	function hiredApplicant() {
			$.getJSON('server/loadData.php?applicationHired=true', function(json) {
				$('#roe').text(json.length);
			});		
		}
		
		hiredApplicant();		
		
		var amdId = getUrlParameter('amdId');
		
		$("#link1").attr("href", "admin.html?amdId="+amdId);
		$("#link2").attr("href", "jobcategory.html?amdId="+amdId);
		$("#link3").attr("href", "jobrequest.html?amdId="+amdId);
		$("#link4").attr("href", "gatepass.html?amdId="+amdId);
		$("#link6").attr("href", "evaluation.html?amdId="+amdId);
		$("#link7").attr("href", "applicantlist.html?amdId="+amdId);
		$("#link8").attr("href", "skills.php?amdId="+amdId);
		
		/*$.getJSON('server/loadData.php?invent=true', function(json) {
			$.each(json, function (key, val) {
				var status = '';
				if(val.jobpost_status == 0) {
					status = 'Closed';
				} else if(val.jobpost_status == 3) {
					status = 'Open';
				}			
				$("#applist").append('<tr><td><a href="profile.html?amdId=1&appId='+val.applicant_id+'" class="btn waves-effect waves-light btn-large responsive-button">View Profile</a></td></tr>');
			});			
		});
		*/
		
		/*
		$.getJSON('server/loadData.php?invent=true', function(json) {
			$.each(json, function (key, val) {
				var status = '';
				if(val.jobpost_status == 0) {
					status = 'Closed';
				} else if(val.jobpost_status == 3) {
					status = 'Open';
				}			
				$("#applist").append('<tr><td id="count_'+val.jobpost_id+'">'+selectCount(val.jobpost_id)+'</td></tr>');
			});			
		});
		*/
		$.getJSON('server/loadData.php?adminid='+amdId, function(json) {
			$("#hi").text(json.admin_fname);		
		});
		
		
		
	});
	</script>	
	
	<div class="footer-copyright  blue lighten-1">
		<div class="container">
			<a class="white-text" href="#">Copyright. All Rights Reserved</a>
		</div>
	</div>
</body>
</html>