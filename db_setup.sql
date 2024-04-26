-- DROP DATABASE universitydb;
CREATE DATABASE universitydb;
USE universitydb;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    middle_initial VARCHAR(1),
    gender INT,
    role VARCHAR(50)
);

CREATE TABLE students (
    stud_id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    middle_initial VARCHAR(1),
    gender INT,
    email VARCHAR(255),
    contact_no VARCHAR(20),
    address TEXT
);

CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(50) NOT NULL,
    course_desc TEXT
);

CREATE TABLE student_courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stud_id INT,
    course_id INT,
    FOREIGN KEY (stud_id) REFERENCES students(stud_id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);


INSERT INTO students (last_name, first_name, middle_initial, email, contact_no, address, gender)
VALUES
('Avenido', 'Trisha', 'P', 'trisha@example.com', '0123456789', '123 Main St, Lanao del Norte', 0),
('Doe', 'John', 'A', 'john.doe@example.com', '1234567890', '123 Main St, City', 1),
('Smith', 'Jane', 'B', 'jane.smith@example.com', '0987654321', '456 Elm St, Town', 0),
('Johnson', 'Michael', 'C', 'michael.johnson@example.com', '2345678901', '789 Oak St, Village', 1),
('Williams', 'Emily', 'D', 'emily.williams@example.com', '3456789012', '101 Pine St, County', 0),
('Brown', 'David', 'E', 'david.brown@example.com', '4567890123', '222 Cedar St, State', 1),
('Jones', 'Sarah', 'F', 'sarah.jones@example.com', '5678901234', '333 Maple St, Country', 0),
('Garcia', 'Christopher', 'G', 'christopher.garcia@example.com', '6789012345', '444 Birch St, Kingdom', 1),
('Martinez', 'Jessica', 'H', 'jessica.martinez@example.com', '7890123456', '555 Walnut St, Empire', 0),
('Rodriguez', 'James', 'I', 'james.rodriguez@example.com', '8901234567', '666 Ash St, Republic', 1),
('Lopez', 'Megan', 'J', 'megan.lopez@example.com', '9012345678', '777 Elm St, Dominion', 0),
('Gonzalez', 'William', 'K', 'william.gonzalez@example.com', '0123456789', '888 Oak St, Alliance', 1),
('Wilson', 'Ashley', 'L', 'ashley.wilson@example.com', '1234509876', '999 Pine St, Coalition', 0),
('Anderson', 'Daniel', 'M', 'daniel.anderson@example.com', '2345678901', '111 Cedar St, Federation', 1),
('Thomas', 'Jessica', 'N', 'jessica.thomas@example.com', '3456789012', '222 Maple St, Confederation', 0),
('Taylor', 'Matthew', 'O', 'matthew.taylor@example.com', '4567890123', '333 Birch St, Union', 1),
('Moore', 'Jennifer', 'P', 'jennifer.moore@example.com', '5678901234', '444 Walnut St, Alliance', 0),
('Jackson', 'Andrew', 'Q', 'andrew.jackson@example.com', '6789012345', '555 Ash St, Republic', 1),
('White', 'Elizabeth', 'R', 'elizabeth.white@example.com', '7890123456', '666 Cedar St, State', 0),
('Harris', 'Christopher', 'S', 'christopher.harris@example.com', '8901234567', '777 Elm St, Dominion', 1),
('Martin', 'Amanda', 'T', 'amanda.martin@example.com', '9012345678', '888 Maple St, Federation', 0),
('Thompson', 'Brian', 'U', 'brian.thompson@example.com', '0123456789', '999 Birch St, Confederation', 1),
('Garcia', 'Stephanie', 'V', 'stephanie.garcia@example.com', '1234509876', '111 Walnut St, Union', 0),
('Martinez', 'Joseph', 'W', 'joseph.martinez@example.com', '2345678901', '222 Ash St, Empire', 1),
('Smith', 'Melissa', 'X', 'melissa.smith@example.com', '3456789012', '333 Cedar St, Kingdom', 0);


INSERT INTO courses (course_code, course_desc)
VALUES
('CSCI101', 'Introduction to Computer Science'),
('MATH201', 'Calculus I'),
('PHYS101', 'Physics for Engineers'),
('CHEM101', 'General Chemistry'),
('ENGL101', 'English Composition'),
('HIST101', 'World History'),
('ART101', 'Art Appreciation'),
('MUSC101', 'Music Fundamentals'),
('BIOL101', 'Biology I'),
('ECON101', 'Principles of Economics'),
('PSYC101', 'Introduction to Psychology'),
('COMM101', 'Public Speaking'),
('SOC101', 'Introduction to Sociology'),
('BUSI101', 'Introduction to Business'),
('PHIL101', 'Introduction to Philosophy');
