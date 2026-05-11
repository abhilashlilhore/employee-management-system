CREATE DATABASE employee_portal;
USE employee_portal;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'hr', 'employee') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password, role)
VALUES
('Admin User', 'admin@test.com', MD5('123456'), 'admin'),
('HR User', 'hr@test.com', MD5('123456'), 'hr'),
('Employee User', 'employee@test.com', MD5('123456'), 'employee');

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_code VARCHAR(50) UNIQUE NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    gender ENUM('male','female','other'),
    dob DATE,
    phone VARCHAR(20),
    alternate_phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    pincode VARCHAR(20),
    department VARCHAR(100),
    designation VARCHAR(100),
    joining_date DATE,
    employment_type VARCHAR(50),
    profile_photo VARCHAR(255),
    basic_salary DECIMAL(10,2),
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    attendance_date DATE NOT NULL,
    check_in TIME,
    check_out TIME,
    total_hours VARCHAR(20),
    status ENUM('present','absent','late','half_day') DEFAULT 'present',
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE leaves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    leave_type VARCHAR(50),
    from_date DATE,
    to_date DATE,
    total_days INT,
    reason TEXT,
    status ENUM('pending','approved','rejected','cancelled') DEFAULT 'pending',
    approved_by INT NULL,
    approved_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE leave_balances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    casual_leave INT DEFAULT 0,
    sick_leave INT DEFAULT 0,
    paid_leave INT DEFAULT 0,
    remaining_leave INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE payroll (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    payroll_month VARCHAR(20),
    payroll_year YEAR,
    basic_salary DECIMAL(10,2),
    allowances DECIMAL(10,2) DEFAULT 0,
    bonus DECIMAL(10,2) DEFAULT 0,
    deductions DECIMAL(10,2) DEFAULT 0,
    net_salary DECIMAL(10,2),
    payment_status ENUM('paid','unpaid','processing') DEFAULT 'unpaid',
    payment_date DATE NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE salary_structures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    basic_salary DECIMAL(10,2),
    hra DECIMAL(10,2) DEFAULT 0,
    allowances DECIMAL(10,2) DEFAULT 0,
    tax DECIMAL(10,2) DEFAULT 0,
    pf DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    department VARCHAR(100),
    vacancies INT,
    job_type VARCHAR(50),
    salary_range VARCHAR(100),
    location VARCHAR(100),
    description TEXT,
    status ENUM('open','closed') DEFAULT 'open',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE candidates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150),
    email VARCHAR(100),
    phone VARCHAR(20),
    resume VARCHAR(255),
    applied_job_id INT,
    experience VARCHAR(100),
    skills TEXT,
    status ENUM('applied','shortlisted','interview','selected','rejected') DEFAULT 'applied',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE interviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_id INT,
    interview_date DATETIME,
    interviewer VARCHAR(100),
    interview_type VARCHAR(50),
    status ENUM('scheduled','completed','selected','rejected') DEFAULT 'scheduled',
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE performance_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    reviewer_id INT,
    review_period VARCHAR(100),
    rating INT,
    strengths TEXT,
    weaknesses TEXT,
    comments TEXT,
    goals TEXT,
    review_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    document_name VARCHAR(255),
    document_type VARCHAR(100),
    file_name VARCHAR(255),
    file_path VARCHAR(255),
    uploaded_by INT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active','deleted') DEFAULT 'active'
);
CREATE TABLE compliance_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    pf_number VARCHAR(100),
    esic_number VARCHAR(100),
    uan_number VARCHAR(100),
    pan_number VARCHAR(50),
    compliance_status ENUM('active','inactive') DEFAULT 'active',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE policies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    policy_title VARCHAR(255),
    policy_document VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE policy_acknowledgments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    policy_id INT,
    employee_id INT,
    acknowledged_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('acknowledged','pending') DEFAULT 'pending'
);