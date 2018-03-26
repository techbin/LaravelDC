# aligent
## The source code for the competition

This project has been developed in Laravel Framework, below are the configuration and steps to execute the project. For more detailed steps check the Readme.doc file.

###### A. Configuration and technologies used which is required to run the project

1. Apache	2.4.29 (Win32) OpenSSL/1.0.2l PHP/7.1.11
2. Laravel	5.5.33
3. PHP	7.1.11
4. MySQL	5.5
5. Bootstrap	3.3.5
6. JQuery	3.3.1

The project was developed in Windows 8.1 Operating System.

###### B. Below are the steps to execute the project

Step 1: Assumed the webserver is running and it supports above the stated configuration and other required configurations to run a Laravel project.

Step 2: Create a folder "aligent" and Unzip the compressed project folder. 

Say for example  c:\xammp\htdocs\aligent

Step 3: rename example.env to .env

Step 4: Run "composer install" to install the vendor files. 

Step 5:  If everything works fine then you should be able to access the project by accessing the url(assuming the webserver is local): 

http://localhost/aligent/public/questions

Step 6: Click the link "Answers" to redirect to a form page. Input the parameters for the questions and get the results.


###### Incase you are unable to execute or run the project then go for a fresh install.

1. composer global require "laravel/installer"

2. laravel new aligent

3. composer install 

4. rename .env.example to .env

5. Copy the controller and view folders from the github project extract and paste in the new instance.

5.1 Controllers: aligent/app/Http/Controllers/
Copy and paste the DateHelp.php and Question1Controller.php

5.2 Views: aligent/resources/views/
Copy and paste the "questions" folder.


###### C. File Structure

The projects main controller files are located at aligent/app/Http/Controllers

1. DateHelper.php
Helper class with date functions
Usage:
Given date range - start:$start_dateM and end date:$end_dateM.
		
		1. Create object of the datehelper - with functions 
		
		DateHelper: app/Http/Controllers/DateHelper.php
		$dFunc = new DateHelper();
		
		2. Date helper function to calculate the days in a given range
		
		$dFunc->getDaysFromDateRange($start_dateM,$end_dateM);
		
		3. Date helper function to calculate the weekdays (excluding weekends) in a given range
		
		$dFunc->getWeekDaysFromDateRange($start_dateM,$end_dateM);
		
		4. Date helper function to calculate the complete weeks
		 
		$dFunc->getCompleteWeeksFromDateRange($start_dateM,$end_dateM,$detailed);


2. Question1Controller.php
Main controller to the landing and questions page. This controller calls the helper class for the functionality.

The projects view files are located at: aligent/resources/views/questions

1. index.blade.php - laravel's default landing page - this page shows the challenge question page with a link to the form page.
2. question1.blade.php - project's form page to accept parameters and return results.

:+1: 

