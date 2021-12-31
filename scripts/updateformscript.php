<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginsys/login.php");
    exit;
}

$branch=$_POST['branch'];
$contract_type=$_POST['contract_type'];
$sdate=$_POST['sdate'];
$onboarding_type=$_POST['onboarding_type'];
$consultant_status=$_POST['consultant_status'];
$reporting_type=$_POST['reporting_type'];
$tracker_placement_id=$_POST['tracker_placement_id'];
$pay_cycle=$_POST['pay_cycle'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$middle_name=$_POST['middle_name'];
$nick_name=$_POST['nick_name'];
$customer=$_POST['customer'];
$wf_consumer_lending=$_POST['wf_consumer_lending'];
$mailing_address=$_POST['mailing_address'];
$email_address=$_POST['email_address'];
$cell_phone=$_POST['cell_phone'];
$ssn=$_POST['ssn'];
$dob=$_POST['dob'];
$militray_veteran=$_POST['militray_veteran'];
$militray_spouse=$_POST['militray_spouse'];
$candidate_source=$_POST['candidate_source'];
$tracker_candidate_id=$_POST['tracker_candidate_id'];
$visa=$_POST['visa'];
$visa_expiration_date=$_POST['visa_expiration_date'];
$end_date=$_POST['end_date'];
$candidate_job_title=$_POST['candidate_job_title'];
$hiring_manager_name=$_POST['hiring_manager_name'];
$candidate_work_location=$_POST['candidate_work_location'];
$placement_recruiter=$_POST['placement_recruiter'];
$placement_sourcer=$_POST['placement_sourcer'];
$placement_am=$_POST['placement_am'];
$hourly_wage=$_POST['hourly_wage'];
$health_benefits=$_POST['health_benefits'];
$misc_exp_type=$_POST['misc_exp_type'];
$misc_exp_amount=$_POST['misc_exp_amount'];
$network_partner_name=$_POST['network_partner_name'];
$bill_rate=$_POST['bill_rate'];
$placement_cto=$_POST['placement_cto'];

require_once "../loginsys/config.php";

$sql = "update new_obrfs set branch='$branch', contract_type='$contract_type', sdate='$sdate', onboarding_type='$onboarding_type', consultant_status='$consultant_status', reporting_type='$reporting_type', pay_cycle='$pay_cycle', first_name='$first_name', last_name='$last_name', middle_name='$middle_name', nick_name='$nick_name', customer='$customer', wf_consumer_lending='$wf_consumer_lending', mailing_address='$mailing_address', email_address='$email_address', cell_phone='$cell_phone', ssn='$ssn', dob='$dob', militray_veteran='$militray_veteran', militray_spouse='$militray_spouse', candidate_source='$candidate_source', tracker_candidate_id='$tracker_candidate_id', visa='$visa', visa_expiration_date='$visa_expiration_date', end_date='$end_date', candidate_job_title='$candidate_job_title', hiring_manager_name='$hiring_manager_name', candidate_work_location='$candidate_work_location', placement_recruiter='$placement_recruiter', placement_sourcer='$placement_sourcer', placement_am='$placement_am', hourly_wage='$hourly_wage', health_benefits='$health_benefits', misc_exp_type='$misc_exp_type', misc_exp_amount='$misc_exp_amount', network_partner_name='$network_partner_name', bill_rate='$bill_rate', placement_cto='$placement_cto' where tracker_placement_id='$tracker_placement_id'";

if ($mysqli->query($sql) === TRUE) {
	echo "Records updated";
    echo "<p>Click <a href='../index.php'>here</a> to return to home and view OBRFs</p>";
    echo "<p>Click <a href='../form.php'>here</a> to submit a new OBRF</p>";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$mysqli->close();

?>