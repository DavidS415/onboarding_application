CREATE DATABASE oba;

GRANT ALL ON oba.* to obaadmin@localhost IDENTIFIED BY 'S3admin100pine'; 

use oba;

CREATE TABLE new_obrfs(
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    branch VARCHAR(225),
    contract_type VARCHAR(225),
    sdate DATE,
    onboarding_type VARCHAR(225),
    consultant_status VARCHAR(225),
    reporting_type VARCHAR(225),
    tracker_placement_id VARCHAR(225),
    pay_cycle VARCHAR(225),
    first_name VARCHAR(225),
    last_name VARCHAR(225),
    middle_name VARCHAR(225),
    nick_name VARCHAR(225),
    customer VARCHAR(225),
    wf_consumer_lending VARCHAR(225),
    mailing_address VARCHAR(225),
    email_address VARCHAR(225),
    cell_phone CHAR(10),
    ssn CHAR(9),
    dob DATE,
    militray_veteran VARCHAR(225),
    militray_spouse VARCHAR(225),
    candidate_source VARCHAR(225),
    tracker_candidate_id VARCHAR(225),
    visa VARCHAR(225),
    visa_expiration_date DATE,
    end_date DATE,
    candidate_job_title VARCHAR(225),
    hiring_manager_name VARCHAR(225),
    candidate_work_location VARCHAR(225),
    placement_recruiter VARCHAR(225),
    placement_sourcer VARCHAR(225),
    placement_am VARCHAR(225),
    hourly_wage DECIMAL(10,2),
    health_benefits VARCHAR(225),
    misc_exp_type VARCHAR(225),
    misc_exp_amount DECIMAL(10,2),
    network_partner_name VARCHAR(225),
    bill_rate DECIMAL(10,2),
    placement_cto DECIMAL(10,2),
    current_status VARCHAR(225)
    );

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE new_users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);