CREATE TABLE grievances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    register_number VARCHAR(255) NOT NULL,
    course_name VARCHAR(255) NOT NULL,
    mobile VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    id_card_filename VARCHAR(255) NOT NULL,
    grievance_type ENUM('Course Completion Certificate', 'Result', 'Current Mark Statement', 'Consolidated Mark Statement', 'Provisional Certificate', 'Grievance Certificate', 'PSTM') NOT NULL
);
