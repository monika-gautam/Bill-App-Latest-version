#ExClaiMadEasy

##Introduction
**ExClaiMadEasy** (stands for *Expense Claims Made Easy*) is an extremely light-weight MySQL backed Web-app written in PHP for making submission of your Cab Expense Claims a breeze. All you need is to choose date(s) & enter bill amount in its soothing, beautiful UI. ExClaiMadEasy will automatically generate a PDF document with the tables of your entries that you can print out, sign & submit to your office department for reimbursements. No more struggling with Excel sheets :-)

##Requirements
Since ExClaiMadEasy is a PHP application, it can be self-hosted using any of your favorite webservers like Apache or Nginx. Its very light & uses very little resources. You can also host it on any cloud platforms. I have already hosted it on OpenShift & the application is available at http://exclaimadeasy-monika.rhcloud.com/ to have a glimpse of what it can do :-)

##Installation
If you are planning to self-host this application, just unpack the contents of this repository to your ``DocumentRoot`` & you're good to go. You will also need to create a MySQL database & an appropriate database user. You will need to change the code accordingly.

##Acknowledgements
ExClaiMadEasy is a fork of [Bill-App-Latest-version] (https://github.com/monika-gautam/Bill-App-Latest-version) developed by [Monika Gautam] (https://github.com/monika-gautam). I have collaborated with her to introduce new features & report bugs. All credit goes to her hard work & selflessness!

It also uses below resources for its functionalities & their respective authors deserve all the kudos & special thanks for their awesome products :-)

* [FPDF] (http://www.fpdf.org/)
* [jsDatePick] (http://javascriptcalendar.org/javascript-date-picker.php)
* [Pure CSS] (https://purecss.io/)
