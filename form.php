<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <link href="styles/styles.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Submit a new OBRF</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>
  </head>
  <body>
    <header>
        <h1>Welcome to the Onboarding Application</h1>
    </header>

    <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="form.php">Submit a new OBRF</a></li>
          <li><a href="edit.php">View or edit an OBRF</a></li>
        </ul>
    </nav>
  <main>
    <h2>Submit a new OBRF</h2>  
    <form action="scripts/submitform.php" method="post">
        <ul>
            <li>
                <label for="branch-select">Branch:</label>
                <select name="branch" id="branch-select">
                    <option value="">--Please choose a branch--</option>
                    <option value="motown">Motown</option>
                    <option value="south">South</option>
                    <option value="west">West</option>
                    <option value="midwest">MidWest</option>
                    <option value="midatlantic">MidAtlantic</option>
                    <option value="carolinas">Carolinas</option>
                </select>
            </li>
            <li>
                <label for="contract-type-select">Contract Type:</label>
                <select name="contract_type" id="contract-type-select">
                    <option value="">--Please choose a contract type--</option>
                    <option value="w2/vacation/exempt">W2 with vacation (exempt)</option>
                    <option value="w2/vacation/non-exempt">W2 with vacation (non-exempt)</option>
                    <option value="w2/no-vacation/exempt">W2 without vacation (exempt)</option>
                    <option value="w2/no-vacation/non-exempt">W2 without vacation (non-exempt)</option>
                    <option value="1099">1099</option>
                </select>
            </li>
            <li>
                <label for="start-date-select">Start Date:</label>
                <input type="date" id="start-date-select" name="sdate" required>
            </li>
            <li>
                <label for="onboarding-type-select">Onboarding type:</label>
                <select name="onboarding_type" id="onboarding-type-select">
                    <option value="">--Please select an onboarding type--</option>
                    <option value="new-hire">New Hire</option>
                    <option value="rehire">Rehire</option>
                    <option value="other">Other</option>
                </select>
            </li>
            <li>
                <label for="consutlant-status-select">Consultant Status:</label>
                <select name="consultant_status" id="consutlant-status-select">
                    <option value="">--Please select a consultant status--</option>
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                </select>
            </li>
            <li>
                <label for="reporting-type-select">Reporting Type:</label>
                <select name="reporting_type" id="reporting-type-select">
                    <option value="">--Please select a reporting type--</option>
                    <option value="cto">CTO</option>
                    <option value="fixed">Fixed Fee</option>
                </select>
            </li>
            <li>
                <label for="placementid">Tracker Placement ID:</label>
                <input type="number" id="placementid" name="tracker_placement_id" required>
            </li>
            <li>
                <label for="pay-cycle-select">Pay Cycle:</label>
                <select name="pay_cycle" id="pay-cycle-select">
                    <option value="">--Please select a pay cycle--</option>
                    <option value="bi-monthly">Bi-Monthly</option>
                    <option value="weekly">Weekly</option>
                </select>
            </li>
            <li>
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first_name">
            </li>
            <li>
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last_name">
            </li>
            <li>
                <label for="middle-name">Middle Name:</label>
                <input type="text" id="middle-name" name="middle_name">
            </li>
            <li>
                <label for="nick-name">Nick Name:</label>
                <input type="text" id="nick-name" name="nick_name">
            </li>
            <li>
                <label for="customer-select">Customer:</label>
                <select name="customer" id="customer-select">
                    <option value="">--Please select a customer--</option>
                    <option value="wellsfargomrs">Wells Fargo MRS</option>
                    <option value="wellsfargonon-it">Wells Fargo Non-IT</option>
                    <option value="cambia">Cambia</option>
                    <option value="chevron">Chevron</option>
                    <option value="farmers">Farmers</option>
                </select>
            </li>
            <li>
                <label for="consumer-lending-select">Wells Fargo Consumer Lending Hire:</label>
                <select name="wf_consumer_lending" id="consumer-lending-select">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                </select>
            </li>
            <li>
                <label for="mailing-address">Mailing Address:</label>
                <input type="text" id="mailing-address" name="mailing_address">
            </li>
            <li>
                <label for="email-address">Email:</label>
                <input type="email" id="email-address" name="email_address">
            </li>
            <li>
                <label for="cell-phone">Cell Phone:</label>
                <input type="text" id="cell-phone" name="cell_phone" title="Please provide a valid 10 digit phone number" pattern="[1-9]{1}[0-9]{9}" required> 
            </li>
            <li>
                <label for="ssn-input">SSN:</label>
                <input type="text" id="ssn-input" name="ssn" title="Please provide a valid 9 digit ssn" pattern="[0-9]{9}" required> 
            </li>
            <li>
                <label for="dob-select">DOB:</label>
                <input type="date" id="dob-select" name="dob" required>
            </li>
            <li>
                <label for="military-veteran">Military Veteran Status:</label>
                <select name="militray_veteran" id="military-veteran">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                    <option value="unknown">Unknown</option>
                </select>
            </li>
            <li>
                <label for="military-spouse">Military Spouse Status:</label>
                <select name="militray_spouse" id="military-spouse">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                    <option value="unknown">Unknown</option>
                </select>
            </li>
            <li>
                <label for="candidate-source-select">Candidate Source:</label>
                <select name="candidate_source" id="candidate-source-select">
                    <option value="">--Please select a candidate source--</option>
                    <option value="dice">Dice</option>
                    <option value="careerbuilder">Career Builder</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="indeed">InDeed</option>
                    <option value="referral">Referral</option>
                    <option value="networkpartner">Network Partner</option>
                    <option value="other">Other</option>
                </select>
            </li>
            <li>
                <label for="candidateid">Tracker Candidate ID:</label>
                <input type="number" id="candidateid" name="tracker_candidate_id">
            </li>
            <li>
                <label for="work-auth-select">Visa or Work Authorization:</label>
                <select name="visa" id="work-auth-select">
                    <option value="">--Please select candidate work authorization or visa type--</option>
                    <option value="usc">US Citizen</option>
                    <option value="greencard">Green Card/Perm Resident</option>
                    <option value="h4">H4 EAD</option>
                    <option value="h1b">H1b Visa</option>
                    <option value="l2">L2 EAD</option>
                    <option value="asylum">Asylum EAD</option>
                    <option value="opt/cpt">OPT or CPT EAD</option>
                </select>
            </li>
            <li>
                <label for="visa-exp-select">Visa Expiration:</label>
                <input type="date" id="visa-exp-select" name="visa_expiration_date" required>
            </li>
            <li>
                <label for="end-date-select">End Date:</label>
                <input type="date" id="end-date-select" name="end_date" required>
            </li>
            <li>
                <label for="job-title">Job Title:</label>
                <input type="text" id="job-title" name="candidate_job_title">
            </li>
            <li>
                <label for="hiring-manager">Site Supervisor (Hiring Manager):</label>
                <input type="text" id="hiring-manager" name="hiring_manager_name">
            </li>
            <li>
                <label for="work-location">Work Location (or Remote):</label>
                <input type="text" id="work-location" name="candidate_work_location">
            </li>
            <li>
                <label for="recruiter">Recrutier:</label>
                <input type="text" id="recruiter" name="placement_recruiter">
            </li>
            <li>
                <label for="sourcer">Sourcer:</label>
                <input type="text" id="sourcer" name="placement_sourcer">
            </li>
            <li>
                <label for="am">Account Manager:</label>
                <input type="text" id="am" name="placement_am">
            </li>
            <li>
                <label for="hourly-pay-rate">Hourly Wage:</label>
                <input type="number" id="hourly-pay-rate" name="hourly_wage" step="0.01" required>
            </li>
            <li>
                <label for="health">Health Benefits</label>
                <select name="health_benefits" id="health">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </li>
            <li>
                <label for="misc-exp-type">Misc Expense Type:</label>
                <select name="misc_exp_type" id="misc-exp-type">
                    <option value="">N/A</option>
                    <option value="npa">NPA Fee</option>
                    <option value="immigration">Immigration Expense</option>
                    <option value="referral">Referral</option>
                    <option value="other">Other</option>
                </select>
            </li>
            <li>
                <label for="misc-exp-amount">Misc Expense Amount:</label>
                <input type="number" id="misc-exp-amount" name="misc_exp_amount" step="0.01" placeholder="Enter 0 if there is none" required>
            </li>
            <li>
                <label for="np-name">Network Partner:</label>
                <input type="text" id="np-name" name="network_partner_name" placehodler="Please enter N/A if no NP">
            </li>
            <li>
                <label for="billing">Bill Rate:</label>
                <input type="number" id="billing" name="bill_rate" step="0.01" required>
            </li>
            <li>
                <label for="cto">CTO:</label>
                <input type="number" id="cto" name="placement_cto" step="0.01" required>
            </li>
                <input type='hidden' name='current_status' value='OBRF Created'>
                <input type="submit" value="Submit" name="submit">
            
        </ul>
    </form>
  </main>  
  </body>
</html>