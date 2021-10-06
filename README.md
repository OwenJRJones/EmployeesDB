<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Assignment

## Prerequisites

Recommended: Labs 1 & 2: PHP Debugging and PHP Basics.<br/>
Strongly Recommended: Lab 3: Introduction to PHP + MySQL, JavaScript.

## Summary

You will create a web site in PHP that will allow for the viewing, searching, inserting, updating, and deleting of employee records from the MySQL `Employees` sample database. Forms to allow for insertion and update will have client-side validation of valid input. Only authenticated users will be able to access the system. Some significant value-added innovation will be included on top of the system requirements. The code will be integrated with source control throughout the development process.

1.	Don’t forget that a code review is a required part of this assignment (worth <b>5pts</b> of your final assignment grade). You will need to show your code to the instructor in code review on or shortly after the due date while going through an evaluation of the site’s functionality. You will need to explain how the code works and complete the code review part of the rubric. You will need to do this to at least a competent level (refer to the rubric for more details).
2.	Late submissions will be subject to the late penalties laid out in the course outline. 

## General Requirements

### REQ-1: DISPLAY OF EMPLOYEE RECORDS (3 PTS.)

Employee records will be displayed in an HTML table with borders and gridlines as seen in Figure 1 below. All fields from the `employees` table will be displayed. 

### REQ-2:	PAGING THROUGH EMPLOYEE RECORDS (3 PTS.)

Only a maximum of 25 rows from the `employees` table will displayed on the page at any one time. The ability to page through the entire record set will be implemented with previous and next buttons/links. This paging feature must not break if users click on the previous link on the first page.

### REQ-3: SEARCHING FOR EMPLOYEE RECORDS (3 PTS.)

Employee records will be searched for. The user will type a search string in a textbox and only matching results will display. The search string will be preserved in the textbox upon page refresh (i.e. a sticky form). The search string will be matched against both the employee’s last name and first name. See Figure 1 below:

<figure>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/assignment/fig1.png" width="300px" />
  <figcaption><i>Figure 1 – Searching for Employees</i></figcaption>
</figure>

### REQ-4: ADDING EMPLOYEE RECORDS (3 PTS.)

New employee records will be inserted. An HTML Form will allow the user to fill out all fields corresponding to all fields in the `employees` table. The HTML Form will be subjected to proper client-side validation prior to submission to PHP for database insertion (see REQ-006). A new employee ID will be generated for the new record (<b>Note: That this might be tricky given the current structure of the database</b>). The number of affected rows will be reported.

### REQ-5: UPDATING EMPLOYEE RECORDS (3 PTS.)

Employee records will be updated. A specified record will be selectable for update. (<b>This will be done with an Edit button in the table that displays records (as shown in Figure 1 above</b>). An HTML Form will display, which will allow the user to modify fields that will be prepopulated to contain existing data corresponding to all fields in the `employees` table. The HTML Form will be subjected to proper client-side validation prior to submission to PHP for database update (see REQ-6). The number of affected rows will be reported.

### REQ-6: EMPLOYEE DATA ENTRY/MODIFICATIONS WITH CLIENT-SIDE VALIDATION (3 PTS.)

The data on HTML forms for employee insertion or update in the database will be fully validated client-side before being allowed to submit to server-side code for database modification. The birth date and hire dates must be in `YYYY-MM-DD` number format. First and last names must begin with a capital letter followed by one or more lower case letters. The gender can be only a single character to accommodate various gender types. (Ex: `M` for male, `F` for female, `T` for transgender, and so on.) It is your discretion as to which letters to include in your form.) . Appropriate error messages must be displayed in areas next to the erroneous fields in the form and <b>not as pop-up boxes</b>.

### REQ-7: DELETING EMPLOYEE RECORDS (3 PTS.)

Employee records will be deleted. A specified record will be selectable for deletion. <b>This will be done with a `Delete` button in the table that displays records (as shown in Figure 1 above)</b>. The deletion will be confirmed before executing. The number of affected rows will be reported.

### REQ-8: LIMITING ACCESS TO ONLY AUTHENTICATED USERS (3 PTS.)

Only authenticated users will be able access the site’s pages and view/modify the data. A login screen that prompts for the username and password will be presented when a user tries to access any page of the website. The password field will be masked with asterisks when the user types. The login information will match against data stored in a new `users` table that you add to the `Employees` database and the password will be appropriately hashed using modern web techniques. If the credentials match, they will be redirected to the site; otherwise they will stay on the login screen and get an appropriate message. Each page will have a `Logout` button, which will redirect to the login page and clear current logged in credentials when clicked. 

### REQ-9: INCLUDING AN INNOVATIVE FEATURE IN THE WEB SITE (6 PTS.)

A <b>significant and unique</b> feature will be added to the web site to give additional value to its role as an HR tool for interacting with Employee data. This feature will provide functionality in addition to the previous set of requirements and should involve making an alteration/addition to the employees database.



