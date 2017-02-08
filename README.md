#ExClaiMadEasy

##Introduction
**ExClaiMadEasy** (stands for *Expense Claims Made Easy*) is an extremely light-weight MySQL backed Web-app written in PHP for making submission of your Cab Expense Claims a breeze. All you need is to choose date(s) & enter bill amount in its soothing, beautiful UI. ExClaiMadEasy will automatically generate a PDF document with the tables of your entries that you can print out, sign & submit to your office department for reimbursements. No more struggling with Excel sheets :-)

##Requirements
Since ExClaiMadEasy is a PHP application, it can be self-hosted using any of your favorite webservers like Apache or Nginx. Its very light & uses very little resources. You can also host it on any cloud platform. I have already hosted it on OpenShift & the application is available at http://exclaimadeasy-monika.rhcloud.com/ to have a glimpse of what it can do :-)

##Installation
If you are planning to self-host this application, just unpack the contents of this repository to your ``DocumentRoot`` & you're good to go. You will also need to create a MySQL database & an appropriate database user. You will need to change the code accordingly. So, first of all create a database called ``cabBills`` by issuing ``CREATE DATABASE cabBills;``. Then return to your command prompt (Windows) or CLI (Linux) and execute this SQL script ``gentables.sql`` (already packaged with this project). General syntax is as follows:-
```
mysql -h hostname -u username cabBills < /path/to/gentables.sql
```
This will create the tables in database where data will be written to (this also acts as means to hold historical data for retrieval).

**FPDF Installation** : - At the heart of this app, there lies the core feature i.e generation of PDF file containing all your entries to be submitted. So, proper installation of FPDF library is must. To install it, download the archive from its official site (mentioned in last segment) & unpack the contents to the DocumentRoot. Then rename it to ``fpdf``. Make sure, it has Read & Execute permissions for owner. Then, in all the scripts that call FPDF viz. ``genbillpdf.php``, ``genbill1pdf.php``, ``monthly_genbillpdf.php`` & ``monthly_genbillpdf1.php`` look for the line that says : -
```
require('fpdf.php');
```
Change this to ``require('fpdf/fpdf.php');`` This will make it look for the class script inside ``fpdf`` directory.
Please note that this project is based on Ubuntu which provides a repository to install ``fpdf`` from ``apt-get`` command. If you are using the same, install it with ``apt-get install fpdf`` command & then create a directory called ``fpdf`` inside your DocumentRoot. After this, create a soft-link to this directory using below command after changing to this directory.
```
ln -s /usr/share/php/fpdf fpdf/
```
This will install FPDF correctly. In case no PDF is generated, look for PHP logs. You will see errors like :-
```
'FPDF error: Could not include font definition file'
```
So, you get the idea what's wrong. Make sure you enter correct location in those scripts as told above or install it correctly.

##Acknowledgements
ExClaiMadEasy is a fork of [Bill-App-Latest-version] (https://github.com/monika-gautam/Bill-App-Latest-version) developed by [Monika Gautam] (https://github.com/monika-gautam). I have collaborated with her to introduce new features & report bugs. All credit goes to her hard work & selflessness!

It also uses below resources for its functionalities & their respective authors deserve all the kudos & special thanks for their awesome products :-)

* [FPDF] (http://www.fpdf.org/)
* [jsDatePick] (http://javascriptcalendar.org/javascript-date-picker.php)
* [Pure CSS] (https://purecss.io/)
