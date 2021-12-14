<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}

$_SESSION['tracker_placement_id'] = $_GET['tracker_placement_id'];
$tracker_placement_id = $_GET['tracker_placement_id'];

require_once "loginsys/config.php";

$sql = "select * from new_obrfs where tracker_placement_id='$tracker_placement_id'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$branch=$row['branch'];
$contract_type=$row['contract_type'];
$sdate=$row['sdate'];
$onboarding_type=$row['onboarding_type'];
$consultant_status=$row['consultant_status'];
$reporting_type=$row['reporting_type'];
$pay_cycle=$row['pay_cycle'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$middle_name=$row['middle_name'];
$nick_name=$row['nick_name'];
$customer=$row['customer'];
$wf_consumer_lending=$row['wf_consumer_lending'];
$mailing_address=$row['mailing_address'];
$email_address=$row['email_address'];
$cell_phone=$row['cell_phone'];
$ssn=$row['ssn'];
$dob=$row['dob'];
$militray_veteran=$row['militray_veteran'];
$militray_spouse=$row['militray_spouse'];
$candidate_source=$row['candidate_source'];
$tracker_candidate_id=$row['tracker_candidate_id'];
$visa=$row['visa'];
$visa_expiration_date=$row['visa_expiration_date'];
$end_date=$row['end_date'];
$candidate_job_title=$row['candidate_job_title'];
$hiring_manager_name=$row['hiring_manager_name'];
$candidate_work_location=$row['candidate_work_location'];
$placement_recruiter=$row['placement_recruiter'];
$placement_sourcer=$row['placement_sourcer'];
$placement_am=$row['placement_am'];
$hourly_wage=$row['hourly_wage'];
$health_benefits=$row['health_benefits'];
$misc_exp_type=$row['misc_exp_type'];
$misc_exp_amount=$row['misc_exp_amount'];
$network_partner_name=$row['network_partner_name'];
$bill_rate=$row['bill_rate'];
$placement_cto=$row['placement_cto'];

echo

"<html>
<head>
    <title>Update an OBRF</title>
    <link href='styles/styles.css' rel='stylesheet'>
</head>
<body>
<header>
        <h1>Welcome to the Onboarding Application</h1>
    </header>

    <nav>
        <ul>
          <li><a href='index.php'>Home</a></li>
          <li><a href='form.php'>Submit a new OBRF</a></li>
          <li><a href='edit.php'>View or edit an OBRF</a></li>
        </ul>
    </nav>

<form action='scripts/updateformscript.php' method='post'>
<h2>Update the OBRF for Placement ID: $tracker_placement_id</h2>
<input type='hidden' name='tracker_placement_id' value='$tracker_placement_id'>
<ul>
<li>
Branch: <select name='branch' id='branch-select'>
    <option value='$branch'>$branch</option>
    <option value='motown'>Motown</option>
    <option value='south'>South</option>
    <option value='west'>West</option>
    <option value='midwest'>MidWest</option>
    <option value='midatlantic'>MidAtlantic</option>
    <option value='carolinas'>Carolinas</option>
</select><br>
</li>
<li>
Contract Type: <select name='contract_type' id='contract-type-select'>
    <option value='$contract_type'>$contract_type</option>
    <option value='w2/vacation/exempt'>W2 with vacation (exempt)</option>
    <option value='w2/vacation/non-exempt'>W2 with vacation (non-exempt)</option>
    <option value='w2/no-vacation/exempt'>W2 without vacation (exempt)</option>
    <option value='w2/no-vacation/non-exempt'>W2 without vacation (non-exempt)</option>
    <option value='1099'>1099</option>
</select><br>
</li>
<li>
Start Date: <input type='date' id='start-date-select' name='sdate' value='$sdate' required><br>
</li>
<li>
Onboarding Type: <select name='onboarding_type' id='onboarding-type-select'>
<option value='$onboarding_type'>$onboarding_type</option>
<option value='new-hire'>New Hire</option>
<option value='rehire'>Rehire</option>
<option value='other'>Other</option>
</select><br>
</li>
<li>
Consultant Status: <select name='consultant_status' id='consutlant-status-select'>
<option value='$consultant_status'>$consultant_status</option>
<option value='full-time'>Full Time</option>
<option value='part-time'>Part Time</option>
</select><br>
</li>
<li>
Reporting Type: <select name='reporting_type' id='reporting-type-select'>
<option value='$reporting_type'>$reporting_type</option>
<option value='cto'>CTO</option>
<option value='fixed'>Fixed Fee</option>
</select><br>
</li>
<li>
Pay Cycle: <select name='pay_cycle' id='pay-cycle-select'>
<option value='$pay_cycle'>$pay_cycle</option>
<option value='bi-monthly'>Bi-Monthly</option>
<option value='weekly'>Weekly</option>
</select><br>
</li>
<li>
First Name: <input type='text' id='first-name' name='first_name' value='$first_name'><br>
</li>
<li>
Last Name: <input type='text' id='last-name' name='last_name' value='$last_name'><br>
</li>
<li>
Middle Name: <input type='text' id='middle-name' name='middle_name' value='$middle_name'><br>
</li>
<li>
Nick Name: <input type='text' id='nick-name' name='nick_name' value='$nick_name'><br>
</li>
<li>
Customer:<select name='customer' id='customer-select'>
    <option value='$customer'>$customer</option>
    <option value='wellsfargomrs'>Wells Fargo MRS</option>
    <option value='wellsfargonon-it'>Wells Fargo Non-IT</option>
    <option value='cambia'>Cambia</option>
    <option value='chevron'>Chevron</option>
    <option value='farmers'>Farmers</option>
</select><br>
</li>
<li>
Wells Fargo Consumer Lending Hire: <select name='wf_consumer_lending' id='consumer-lending-select'>
    <option value='$wf_consumer_lending'>$wf_consumer_lending</option>
    <option value='No'>No</option>
    <option value='Yes'>Yes</option>
</select><br>
</li>
<li>
Mailing Address: <input type='text' id='mailing-address' name='mailing_address' value='$mailing_address'><br>
</li>
<li>
Email: <input type='email' id='email-address' name='email_address' value='$email_address'><br>
</li>
<li>
Cell Phone: <input type='text' id='cell-phone' name='cell_phone' title='Please provide a valid 10 digit phone number' pattern='[1-9]{1}[0-9]{9}' required value='$cell_phone'><br>
</li>
<li>
SSN: <input type='text' id='ssn-input' name='ssn' title='Please provide a valid 9 digit ssn' pattern='[0-9]{9}' required value='$ssn'> <br>
</li>
<li>
DOB: <input type='date' id='dob-select' name='dob' required value='$dob'><br>
</li>
<li>
Military Veteren Status: <select name='militray_veteran' id='military-veteran'>
    <option value='$militray_veteran'>$militray_veteran</option>
    <option value='no'>No</option>
    <option value='yes'>Yes</option>
    <option value='unknown'>Unknown</option>
</select><br>
</li>
<li>
Military Spouse Status: <select name='militray_spouse' id='military-veteran'>
    <option value='$militray_spouse'>$militray_spouse</option>
    <option value='no'>No</option>
    <option value='yes'>Yes</option>
    <option value='unknown'>Unknown</option>
</select><br>
</li>
<li>
Candidate Source: <select name='candidate_source' id='candidate-source-select'>
                    <option value='$candidate_source'>$candidate_source</option>
                    <option value='dice'>Dice</option>
                    <option value='careerbuilder'>Career Builder</option>
                    <option value='linkedin'>LinkedIn</option>
                    <option value='indeed'>InDeed</option>
                    <option value='referral'>Referral</option>
                    <option value='networkpartner'>Network Partner</option>
                    <option value='other'>Other</option>
</select><br>
</li>
<li>
Tracker Candidate ID: <input type='number' id='candidateid' name='tracker_candidate_id' value='$tracker_candidate_id'><br>
</li>
<li>
Visa or Work Authorization: <select name='visa' id='work-auth-select'>
    <option value='$visa'>$visa</option>
    <option value='usc'>US Citizen</option>
    <option value='greencard'>Green Card/Perm Resident</option>
    <option value='h4'>H4 EAD</option>
    <option value='h1b'>H1b Visa</option>
    <option value='l2'>L2 EAD</option>
    <option value='asylum'>Asylum EAD</option>
    <option value='opt/cpt'>OPT or CPT EAD</option>
</select><br>
</li>
<li>
Visas Expiration Date: <input type='date' id='visa-exp-select' name='visa_expiration_date' required value='$visa_expiration_date'><br>
</li>
<li>
Contract End Date: <input type='date' id='end-date-select' name='end_date' required value='$end_date'><br>
</li>
<li>
Job Title: <input type='text' id='job-title' name='candidate_job_title' value='$candidate_job_title'><br>
</li>
<li>
Site Supervisor (Hiring Manager): <input type='text' id='hiring-manager' name='hiring_manager_name' value='$hiring_manager_name'><br>
</li>
<li>
Work Location (or Remote): <input type='text' id='work-location' name='candidate_work_location' value='$candidate_work_location'><br>
</li>
<li>
Recruiter: <input type='text' id='recruiter' name='placement_recruiter' value='$placement_recruiter'><br>
</li>
<li>
Sourcer: <input type='text' id='sourcer' name='placement_sourcer' value='$placement_sourcer'><br>
</li>
<li>
Account Manager: <input type='text' id='am' name='placement_am' value='$placement_am'><br>
</li>
<li>
Hourly Wage: <input type='number' id='hourly-pay-rate' name='hourly_wage' step='0.01' required value='$hourly_wage'><br>
</li>
<li>
Health Benefits: <select name='health_benefits' id='health'>
    <option value='$health_benefits'>$health_benefits</option>
    <option value='Yes'>Yes</option>
    <option value='No'>No</option>
</select><br>
</li>
<li>
Misc Expense Type: <select name='misc_exp_type' id='misc-exp-type'>
    <option value='$misc_exp_type'>$misc_exp_type</option>
    <option value='npa'>NPA Fee</option>
    <option value='immigration'>Immigration Expense</option>
    <option value='referral'>Referral</option>
    <option value='other'>Other</option>
</select><br>
</li>
<li>
Misc Expense Amount: <input type='number' id='misc-exp-amount' name='misc_exp_amount' step='0.01' placeholder='Enter 0 if there is none' required value='$misc_exp_amount'><br>
</li>
<li>
Network Partner: <input type='text' id='np-name' name='network_partner_name' placehodler='Please enter N/A if no NP' value='$network_partner_name'><br>
</li>
<li>
Bill Rate: <input type='number' id='billing' name='bill_rate' step='0.01' required value='$bill_rate'><br>
</li>
<li>
CTO: <input type='number' id='cto' name='placement_cto' step='0.01' required value='$placement_cto'><br>
</li>

<input type ='submit'>
</ul>
</form>

</body>
</html>";

} else {
	echo "Not Found";
}
$mysqli->close();

?>