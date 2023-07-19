# Student Management System 
# Introduction

The Student Management System is a web-based application that allows administrators, teachers and students to manage courses, assignments and grades. The system provides different user roles with specific functionalities. Administrators can manage student and teacher databases, assign usernames and passwords and perform administrative tasks. Teachers can create and assign assignments, view student submissions and assign grades. Students can access their courses, view assignments, submit their answers and check their grades.


# Features

The Student Management System includes the following features:

1.	User Roles:

•	Student: Can access courses, view assignments, submit answers, and check grades.
•	Teacher: Can manage courses, create assignments, and assign grades.
•	Administrator: Can manage student and teacher databases, assign usernames and passwords and perform administrative tasks.

2.	Course Management:

•	Students can view their enrolled courses.
•	Teachers can create, edit and manage the courses they are assigned to.

3.	Assignment Management:

•	Teachers can create assignments with a title, deadline, and description.
•	Assignments are displayed to students in the student portal.
•	Students can submit their answers for assignments.
•	Teachers can view student submissions for each assignment.

4.	Grade Management:

•	Teachers can assign grades to student submissions.
•	Students can view their grades for each assignment.


5.	User Management (Administrator Only):

•	Administrators can manage student and teacher databases.
•	Administrators can assign usernames and passwords to students and teachers.
•	Administrators can perform administrative tasks such as adding or removing users.


# Technologies Used

The Student Management System is developed using the following technologies:

•	HTML: For creating the structure and layout of web pages.
•	CSS: For styling the web pages and enhancing the user interface.
•	JavaScript: Used for implementing interactive features and dynamic behavior on the user interface.
•	PHP: For server-side scripting and handling database operations.
•	MySQL: For storing the data related to courses, assignments, submissions, and grades.
•	PDO (PHP Data Objects): For connecting to the MySQL database and performing database operations.


# Code Overview

The codebase of the Student Management System consists of the following files:

1.	index.php:  The main landing page of the application, displaying a login form for administrators, teachers and students.

2.	admin/index.php:  The dashboard page for administrators after successful login. It provides access to user management.

3.	teacher/index.php:  The dashboard page for teachers after successful login. It provides access to course management, assignment creation and grade management.

4.	student/index.php:  The dashboard page for students after successful login. It displays the enrolled courses, assignments and grades.

5.	courses.php:  The page for managing courses. Administrators and teachers can create, edit and delete courses. Students can view their enrolled courses.

6.	assignments.php:  The page for managing assignments. Teachers can create assignments and view student submissions. Students can view assignments and submit their answers.

7.	grades.php:  The page for managing grades. Teachers can assign grades to student submissions. Students can view their grades for each assignment.

8.	student.php & teacher.php:  The page for managing users. Administrators can add, edit and delete users. This includes assigning usernames and passwords to students and teachers.

9.	connection.php:  The file for establishing a database connection using PDO.

10.	style.css:  The CSS file for styling the web pages.


# Installation

To set up the Student Management System, follow these steps:

1.	Copy the whole project into your WAMP/LAMP/XAMPP folder.
2.	Create a MySQL database and import the provided SQL dump file to set up the necessary tables and sample data.
3.	Update the database credentials in the connection.php file to match your MySQL database configuration.
4.	Deploy the project to a web server that supports PHP.
5.	Access the application using the appropriate URL in a web browser.

# Conclusion

The Student Management System is a comprehensive web-based application that simplifies course management, assignment creation and grade assignment for administrators, teachers and students. With its user-friendly interface and robust features, the system streamlines the process of managing student data, assigning assignments and tracking grades. It promotes effective communication and collaboration between administrators, teachers and students, ensuring an efficient learning environment.

# Support and Feedback

For any issues or feedback regarding the Student Management System, you can contact me on various platforms:
•	Github: https://github.com/Anant-Bomzan
•	Linkedin: https://www.linkedin.com/in/anant-bomzan
•	Email: anantmani31@gmail.com
