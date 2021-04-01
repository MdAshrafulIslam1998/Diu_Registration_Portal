# Diu_Registration_Portal
A dedicated project for diu_registration_system. HTML, CSS &amp; Bootstrap with PHP Mysql

# Overview
A web application for the batch advisors of DIU to keep track of the registered students and 
their registration status.

# Motivation
It is very difficult to keep track of the registered students for an advisor because they have to 
register a large number of students in a short period of time. On the other hand, the 
registration status changed time to time. So, sometimes the registration process became 
slower. A technological change like a registration portal for the advisors can easily change 
this kind of problem.

# How it will work
Our team has created a web portal to track the registration status. An advisor can add a 
student, delete a student record, Update the record, see registration status, update 
registration status, see student details, and search by id and name on this portal.

# Site link
The DIU registration portal URL : https://diuregistration.theurbanbangla.com

# Documentation
- Parent Domain : The site is a subdomain of our parent domain called “theurbanbangla.com”. 
The site and the hosting server belongs to our team - “Team Brotherhood”

- Database: We used “php myadmin “database of our hosting server. Our site can store data 
and retrieve that.

- Database Name: Our database name is “trupples_registration”. Our datatable name is 
“student_record “ . We have 6 rows in out tabe – id, name, status, section, course , roll . Here 
“id” is the unique primary key and auto incremented.

- PHP files: We used some mysql query to do all the work. For design purpose we used –
HTML,BOOTSTRAP 4 & CSS. We stored all the php files on our subdomain’s root folder on our 
cpanel file manager.

- PHP files : config.php – for database connection, add.php – for adding student info, 
delete.php – for delete information, developer.php – for our team page, error.php – error 
page, idex.php – main dashboard, retrieve.php – for showing the details, search.php – for 
search query, update.php – for updating the data. 

Here delete2.php, retrieve2.php and update2.php are dedicated only for the search page. 
They are same as delete,retrieve and update , but one change for the back button… back 
button again bring them to search page. So, to bring back to the search page we changed 
only the back button and make duplicate version like delete2, retrieve2, update2. Source 
code can give a better understanding about these.

# Source code
Source code is provided with the project file.

# Key Feature
The registration status will be change color with the output. Completed – green, Incomplete –
Red, Partially Completed – will be yellow. It will help a lot to find the student status within a 
few second.

# Conclusion
Our team believes that this web application can be helpful for all the batch advisors.

# Developer
- copyright & developed by @ Md. Ashraful Islam
- github - https://github.com/MdAshrafulIslam1998






