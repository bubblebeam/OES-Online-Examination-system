# OES-Online-Examination-system
Online examination system in HTML, CSS, JavaScript, PHP and mySQL

An online examination system application where students can give MCQ type tests of their choice. The admin can add or delete tests. Students can appear for tests only after logging in to the system using valid email id and
password.


The Database folder contains the SQL files comprising of the backend for the application.Run these and your backend is set!
The Quiz folder consists of all the the code files defining the interface of the application.

**Pre-requisite installation for running the project:**
MySql Server Database(Example :WAMP,XAMPP,LAMP,MAMP)

For managing the database use any software like PhpMyAdmin or mySQL workbench.

After the backend is set and the WAMP server is up and running,
Place the contents of the "quiz" folder in the webserver root directory.(www directory in WAMP server)
first load the file homepage.php using wamp server, this page is the home page of the applicaion.You can use the application from here.

**USERS OF THE APPLICATION**

*Admin*: Has the privilage to add/delete tests under the manage tests option in the navbar
*normal*: All functionality except add/delete tests.

For admin login:
Username: Admin
Password: Admin123

**Users can perform the following functionality:**
Home: It basically displays the homepage of the website.

Sign-up: This window contains a form that has to be filled by the user inorder to get access
to appear for the tests.

Login: This window offers the user two choices for logging into the system according to the
preset privileges -Candidate login and Administrator login. The candidate login will take the user
to the user profile. The Administrator Login will take the user to the administrator profile.

Tests: This window contains all the exams candidate can give.

Final Result: This window displays the result of exam the candidate has appeared for.








