<?php
include 'connection.php';

if(isset($_GET['category'])) { //list of category
	$category = 'SELECT * FROM tbl_category';
	$categoryStmt = $dbh->prepare($category);
	$categoryStmt->execute();
	$categoryStmtResult = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($categoryStmtResult);		
}

if(isset($_GET['count'])) { //list of category
	$count = 'SELECT * FROM tbl_application WHERE jobpost_id = :jobpost_id';
	$countStmt = $dbh->prepare($count);
	$countStmt->bindParam(':jobpost_id', $count, PDO::PARAM_INT);
	$countStmt->execute();
	$countStmtResult = $countStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($countStmtResult);		
}

if(isset($_GET['applicant_id']) && isset($_GET['jobpost_id'])) { //list of application validation
	$applicantvalidation = $_GET['applicant_id'];
	$jobvalidation = $_GET['jobpost_id'];
	$applicationvalid = 'SELECT * FROM tbl_application WHERE applicant_id = :applicant_id AND jobpost_id = :jobpost_id';
	$applicationvalidStmt = $dbh->prepare($applicationvalid);
	$applicationvalidStmt->bindParam(':applicant_id', $applicantvalidation, PDO::PARAM_INT);
	$applicationvalidStmt->bindParam(':jobpost_id', $jobvalidation, PDO::PARAM_INT);
	$applicationvalidStmt->execute();
	$applicationvalidStmtResult = $applicationvalidStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($applicationvalidStmtResult);               
}


if(isset($_GET['catId'])) { //list of category
	$catId = $_GET['catId'];
	$category = 'SELECT * FROM tbl_category WHERE category_id = :category_id';
	$categoryStmt = $dbh->prepare($category);
	$categoryStmt->bindParam(':category_id', $catId, PDO::PARAM_INT);
	$categoryStmt->execute();
	$categoryStmtResult = $categoryStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($categoryStmtResult);		
}

if(isset($_GET['jobpost'])) { //list of job postings request admin
	$jobpost = 'SELECT * FROM tbl_jobpost WHERE jobpost_status = 1';
	$jobpostStmt = $dbh->prepare($jobpost);
	$jobpostStmt->execute();
	$jobpostStmtResult = $jobpostStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($jobpostStmtResult);		
}

if(isset($_GET['closedjobpost'])) { //list of job postings na closed
	$closedjobpost = 'SELECT * FROM tbl_jobpost WHERE jobpost_status = 0';
	$closedjobpostStmt = $dbh->prepare($closedjobpost);
	$closedjobpostStmt->execute();
	$closedjobpostStmtResult = $closedjobpostStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($closedjobpostStmtResult);		
}

if(isset($_GET['jobpostings'])) { //list of job postings request front end
	$jobpostings = 'SELECT * FROM tbl_jobpost WHERE jobpost_status = 3';
	$jobpostingsStmt = $dbh->prepare($jobpostings);
	$jobpostingsStmt->execute();
	$jobpostingsStmtResult = $jobpostingsStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($jobpostingsStmtResult);		
}

if(isset($_GET['appIdJob'])) { //filtered list of job postings
	$jPostIdArr = array();

	$appId = $_GET['appIdJob'];
	$applicant = "SELECT * FROM tbl_skills WHERE applicant_id = :applicant_id";
	$applicantStmt = $dbh->prepare($applicant);
	$applicantStmt->bindParam(':applicant_id', $appId, PDO::PARAM_INT);
	$applicantStmt->execute();
	$applicantStmtResult = $applicantStmt->fetchAll();
	
	foreach($applicantStmtResult as $cat) {
		$jobpost = 'SELECT * FROM tbl_jobpost a, tbl_qualification b WHERE a.jobpost_id = b.jobpost_id AND b.category_id = :category_id AND a.jobpost_status = 3';
		$jobpostStmt = $dbh->prepare($jobpost);
		$jobpostStmt->bindParam(':category_id', $cat['category_id'], PDO::PARAM_INT);
		$jobpostStmt->execute();
		$jobpostStmtResult = $jobpostStmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($jobpostStmtResult as $result) {
			array_push($jPostIdArr, $result['jobpost_id']);
		}
	}
	
	$unique = array_unique($jPostIdArr);
	
	$consolidated = implode(',', $unique);

	$jobpost = 'SELECT * FROM tbl_jobpost WHERE jobpost_status = 3 AND jobpost_id IN ('.$consolidated.')';
	$jobpostStmt = $dbh->prepare($jobpost);
	$jobpostStmt->execute();
	$jobpostStmtResult = $jobpostStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($jobpostStmtResult);
}

if(isset($_GET['forNotif']) && isset($_GET['locIdd'])) { //view list of applicant for interview
	$locIdd = $_GET['locIdd'];
	$appPerJob = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.application_status = 3 AND a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id AND c.locators_id = :locators_id';
	$appPerJobStmt = $dbh->prepare($appPerJob);
	$appPerJobStmt->bindParam(':locators_id', $locIdd, PDO::PARAM_INT);
	$appPerJobStmt->execute();
	$appPerJobStmtResult = $appPerJobStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($appPerJobStmtResult);	
}

if(isset($_GET['jpostlocview'])) { //view list of applicant per job post locators
	$jpost = $_GET['jpostlocview'];
	$appPerJob = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.jobpost_id = :jobpost_id AND a.application_status = 1 AND a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id';
	$appPerJobStmt = $dbh->prepare($appPerJob);
	$appPerJobStmt->bindParam(':jobpost_id', $jpost, PDO::PARAM_INT);
	$appPerJobStmt->execute();
	$appPerJobStmtResult = $appPerJobStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($appPerJobStmtResult);	
}

if(isset($_GET['jpostadmview'])) { //view list of applicant per job post admin
	$jpost = $_GET['jpostadmview'];
	$appPerJob = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.jobpost_id = :jobpost_id AND a.application_status = 0 AND a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id';
	$appPerJobStmt = $dbh->prepare($appPerJob);
	$appPerJobStmt->bindParam(':jobpost_id', $jpost, PDO::PARAM_INT);
	$appPerJobStmt->execute();
	$appPerJobStmtResult = $appPerJobStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($appPerJobStmtResult);	
}

if(isset($_GET['shortadmview'])) { //view list of applicant per job post admin
	$jpost = $_GET['shortadmview'];
	$appPerJob = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.jobpost_id = :jobpost_id AND a.application_status = 2 AND a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id';
	$appPerJobStmt = $dbh->prepare($appPerJob);
	$appPerJobStmt->bindParam(':jobpost_id', $jpost, PDO::PARAM_INT);
	$appPerJobStmt->execute();
	$appPerJobStmtResult = $appPerJobStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($appPerJobStmtResult);	
}

if(isset($_GET['gpass'])) { //view list of applicant per job post
	$gpass = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.applicant_id = b.applicant_id AND a.application_status = 3 AND a.jobpost_id = c.jobpost_id';
	$gpassStmt = $dbh->prepare($gpass);
	$gpassStmt->execute();
	$gpassStmtResult = $gpassStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($gpassStmtResult);	
}

if(isset($_GET['locatorpost'])) { //list of job postings per locator
	$locId = $_GET['locatorpost'];
	$jobpost = 'SELECT * FROM tbl_jobpost WHERE locators_id = :locators_id';
	$jobpostStmt = $dbh->prepare($jobpost);
	$jobpostStmt->bindParam(':locators_id', $locId, PDO::PARAM_INT);
	$jobpostStmt->execute();
	$jobpostStmtResult = $jobpostStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($jobpostStmtResult);		
}

if(isset($_GET['jobpostdtls'])) { //job postings details of locators
	$jobpostId = $_GET['jobpostdtls'];
	$jobpostdtls = 'SELECT * FROM tbl_jobpost a, tbl_locators b WHERE jobpost_id = :jobpost_id';
	$jobpostdtlsStmt = $dbh->prepare($jobpostdtls);
	$jobpostdtlsStmt->bindParam(':jobpost_id', $jobpostId, PDO::PARAM_INT);
	$jobpostdtlsStmt->execute();
	$jobpostdtlsStmtResult = $jobpostdtlsStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($jobpostdtlsStmtResult);		
}

if(isset($_GET['locators'])) { //list of locators
	$locators = 'SELECT * FROM tbl_locators';
	$locatorsStmt = $dbh->prepare($locators);
	$locatorsStmt->execute();
	$locatorsStmtResult = $locatorsStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($locatorsStmtResult);		
}

if(isset($_GET['locId'])) { //list of locators
	$locId = $_GET['locId'];
	$locators = 'SELECT * FROM tbl_locators WHERE locators_id = :locators_id';
	$locatorsStmt = $dbh->prepare($locators);
	$locatorsStmt->bindParam(':locators_id', $locId, PDO::PARAM_INT);
	$locatorsStmt->execute();
	$locatorsStmtResult = $locatorsStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($locatorsStmtResult);		
}

if(isset($_GET['loc'])) { //list of locators
	$loc = $_GET['loc'];
	$locators = 'SELECT * FROM tbl_locators WHERE locators_id = :locators_id';
	$locatorsStmt = $dbh->prepare($locators);
	$locatorsStmt->bindParam(':locators_id', $loc, PDO::PARAM_INT);
	$locatorsStmt->execute();
	$locatorsStmtResult = $locatorsStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($locatorsStmtResult);		
}

if(isset($_GET['adminid'])) { //list of admin
	$adminid = $_GET['adminid'];
	$admin = 'SELECT * FROM tbl_admin WHERE admin_id = :admin_id';
	$adminStmt = $dbh->prepare($admin);
	$adminStmt->bindParam(':admin_id', $adminid, PDO::PARAM_INT);
	$adminStmt->execute();
	$adminStmtResult = $adminStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($adminStmtResult);		
}


if(isset($_GET['admin'])) { //list of applicants
	$admin = 'SELECT * FROM tbl_applicant';
	$adminStmt = $dbh->prepare($admin);
	$adminStmt->execute();
	$adminStmtResult = $adminStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($adminStmtResult);		
}

if(isset($_GET['applicants'])) { //list of applicants
	$applicants = 'SELECT * FROM tbl_applicant WHERE applicant_status = 1';
	$applicantsStmt = $dbh->prepare($applicants);
	$applicantsStmt->execute();
	$applicantsStmtResult = $applicantsStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($applicantsStmtResult);		
}

if(isset($_GET['applicationlist'])) { //list of application
	$applicationlist = 'SELECT * FROM tbl_application a, tbl_applicant b WHERE a.applicant_id = b.applicant_id';
	$applicationlistStmt = $dbh->prepare($applicationlist);
	$applicationlistStmt->execute();
	$applicationlistStmtResult = $applicationlistStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($applicationlistStmtResult);               
	}
	

if(isset($_GET['appfilter'])) { //list of filter
	$locId = $_GET['appfilter'];
	$appfilter = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c, tbl_locators d WHERE
	a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id AND c.locators_id = d.locators_id AND d.locators_id = :locators_id';
	$appfilterStmt = $dbh->prepare($appfilter);
	$appfilterStmt->bindParam(':locators_id', $locId, PDO::PARAM_INT);
	$appfilterStmt->execute();
	$appfilterStmtResult = $appfilterStmt->fetchAll(PDO::FETCH_ASSOC);
	
	echo json_encode($appfilterStmtResult);               
	}	


if(isset($_GET['app'])) { //list of app
	$app = 'SELECT * FROM tbl_applicant';
	$applicantsStmt = $dbh->prepare($app);
	$applicantsStmt->execute();
	$applicantsStmtResult = $applicantsStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($applicantsStmtResult);		
}

if(isset($_GET['applicantsprofile'])) { //applicants profile
	$appId = $_GET['applicantsprofile'];
	$applicantspro = 'SELECT * FROM tbl_applicant WHERE applicant_id = :applicant_id';
	$applicantsproStmt = $dbh->prepare($applicantspro);
	$applicantsproStmt->bindParam(':applicant_id', $appId, PDO::PARAM_INT);
	$applicantsproStmt->execute();
	$applicantsproStmtResult = $applicantsproStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($applicantsproStmtResult);		
}


if(isset($_GET['appId'])) { //applicants skill set
	$appId = $_GET['appId'];
	$skillSet = 'SELECT * FROM tbl_skills a, tbl_category b WHERE a.applicant_id = :applicant_id AND a.category_id = b.category_id';
	$skillSetStmt = $dbh->prepare($skillSet);
	$skillSetStmt->bindParam(':applicant_id', $appId, PDO::PARAM_INT);
	$skillSetStmt->execute();
	$skillSetStmtResult = $skillSetStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($skillSetStmtResult);		
}


if(isset($_GET['educ'])) { //list of educ
	$educ = 'SELECT * FROM tbl_educ';
	$educStmt = $dbh->prepare($educ);
	$educStmt->execute();
	$educStmtResult = $educStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($educStmtResult);		
}

if(isset($_GET['applicanteduc'])) { //applicants educ
	$applicanteduc = $_GET['applicanteduc'];
	$applicantsed = 'SELECT * FROM tbl_educ WHERE educ_id = :educ_id';
	$applicantsedStmt = $dbh->prepare($applicantsed);
	$applicantsedStmt->bindParam(':educ_id', $applicanteduc, PDO::PARAM_INT);
	$applicantsedStmt->execute();
	$applicantsedStmtResult = $applicantsedStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($applicantsedStmtResult);		
}

if(isset($_GET['job'])) { //list of educ
	$job = 'SELECT * FROM tbl_job_exp';
	$jobStmt = $dbh->prepare($job);
	$jobStmt->execute();
	$jobStmtResult = $jobStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($jobStmtResult);		
}

if(isset($_GET['jobexperience'])) { //applicants jobexp
	$jobexperience = $_GET['jobexperience'];
	$jobex = 'SELECT * FROM tbl_job_exp WHERE jobex_id = :jobex_id';
	$jobexStmt = $dbh->prepare($jobex);
	$jobexStmt->bindParam(':jobex_id', $jobexperience, PDO::PARAM_INT);
	$jobexStmt->execute();
	$jobexStmtResult = $jobexStmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode($jobexStmtResult);		
}

if(isset($_GET['application'])) { //aplicants applications list
	$applicant_id = $_GET['application'];
	$application = 'SELECT * FROM tbl_application a, tbl_jobpost b WHERE a.jobpost_id = b.jobpost_id AND applicant_id = :applicant_id';
	$applicationStmt = $dbh->prepare($application);
	$applicationStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
	$applicationStmt->execute();
	$applicationStmtResult = $applicationStmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($applicationStmtResult);	
}

?>