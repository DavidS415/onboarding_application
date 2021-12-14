<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../loginsys/login.php");
  exit;
}

// MairaDB connection block/information

$hostname = "localhost";
$username = "david";
$password = "Dknocks530";
$db = "oba";

// Connect to database or return an error message if connection fails

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

// Translate data from HTML for into PHP variables

if(isset($_POST['submit'])) {
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
  $current_status=$_POST['current_status'];

// Insert data from PHP variables into SQL database with script/query

  $query = "INSERT INTO new_obrfs (branch, contract_type, sdate, onboarding_type, consultant_status, reporting_type, tracker_placement_id, pay_cycle, first_name, last_name, middle_name, nick_name, customer, wf_consumer_lending, mailing_address, email_address, cell_phone, ssn, dob, militray_veteran, militray_spouse, candidate_source, tracker_candidate_id, visa, visa_expiration_date, end_date, candidate_job_title, hiring_manager_name, candidate_work_location, placement_recruiter, placement_sourcer, placement_am, hourly_wage, health_benefits, misc_exp_type, misc_exp_amount, network_partner_name, bill_rate, placement_cto, current_status)
  VALUES ('$branch', '$contract_type', '$sdate', '$onboarding_type', '$consultant_status', '$reporting_type', '$tracker_placement_id', '$pay_cycle', '$first_name', '$last_name', '$middle_name', '$nick_name', '$customer', '$wf_consumer_lending', '$mailing_address', '$email_address', '$cell_phone', '$ssn', '$dob', '$militray_veteran', '$militray_spouse', '$candidate_source', '$tracker_candidate_id', '$visa', '$visa_expiration_date', '$end_date', '$candidate_job_title', '$hiring_manager_name', '$candidate_work_location', '$placement_recruiter', '$placement_sourcer', '$placement_am', '$hourly_wage', '$health_benefits', '$misc_exp_type', '$misc_exp_amount', '$network_partner_name', '$bill_rate', '$placement_cto', '$current_status')";

// Return an error message if script/query fail or confirm success and provide links back to other pages

    if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred. Your OBRF has not been submitted.');
    } else {
      echo "Your OBRF is being processed.";
      echo "<p>Click <a href='../index.php'>here</a> to return to home and view OBRFs</p>";
      echo "<p>Click <a href='../form.php'>here</a> to submit a new OBRF</p>";
    }

}
?>
