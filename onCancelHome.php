<html>
<html>
<head>
  <title>Bill Claims Management Application</title>
  <link rel="stylesheet" type="text/css" media="all" href="/jsdate/jsDatePick_ltr.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
  <script type="text/javascript" src="/jsdate/jsDatePick.min.1.3.js"></script>


  <script language="javascript">
  function isAlpha(thefield)
  {
    var v=thefield.value;
    l=v.length;
    for(i=0;i<l;i++)
    {
      c=v.substring(i,i+1);
      if(!(c>='A' && c<='Z' || c>='a' && c<='z' || c==' '))
      {
        thefield.focus();
        return false;
      }
    }
    return true;
  }

  function isEmpty(thefield){
    var v=thefield.value;
    l=v.length;
    if(l==0){thefield.focus();
      return true;
    }
    return false;
  }

  function f(){
    new JsDatePick({
      useMode:2,
      target:"dateval",
      dateFormat:"%Y/%m/%d"
    });
  }
  
  function checkDt(thefield){
    //alert("checking date");

    var dt=thefield.value;
    d=dt.substring(8,10);
    m=dt.substring(5,7);
    y=dt.substring(0,4);
    //alert(""+d+m+y);
    sep1=dt.substring(4,5);
    sep2=dt.substring(7,8);
    if(sep1!='/' || sep2!='/')
    {
      //  alert("sep");
      return false;

    }
    else if(d<1 || d>31 || m<1 || m>12|| y<1950 || y>2017)
    {
      return false;

    }

    else if((m==4 || m==6 || m==9 || m==11) && d>30)
    {
      return false;

    }

    else if(m==2)
    {

      if(y%4==0 && !(y%400!=0  && y%100==100) )
      {
        if(d>29)
        return false;
      }
      else if(d>28)

      return false;
    }

    return true;
  }

  function isId(thefield)
  {
    var s=thefield.value;
    var i=s.substring(0,2);
    if (i!="XI")
    return false;
    return true;
  }

  function validate(){
    if (document.myForm.id.value=="XI"){
      alert("Employee ID: Incomplete field value");
      document.myForm.id.focus();
    }
    else if (!isId(document.myForm.id)){
      alert("Employee ID: Invalid");
      document.myForm.id.focus();
    }
    else if (isEmpty(document.myForm.name)){
      alert("Name: Empty field");
      document.myForm.name.focus();
    }
    else if (!isAlpha(document.myForm.name)){
      alert("Employe Name: non-alphabetic");
      document.myForm.name.focus();
    }
    else if (isEmpty(document.myForm.acc)){
      alert("Bank A/C No. (UserId): Empty field");
      document.myForm.acc.focus();
    }
    else if (isEmpty(document.myForm.mname)){
      alert("  Manager: Empty field");
      document.myForm.mname.focus();
    }

    else if (!isAlpha(document.myForm.mname)){
      alert("Name: Non-alphabetic");
      document.myForm.mname.focus();
    }
    else if(isEmpty(document.myForm.dateval))
    {

      alert("Date Field can't be left empty");
      document.myForm.dateval.focus();
    }
    else if(!checkDt(document.myForm.dateval))
    {

      alert("Date  :  Invalid ");
      document.myForm.dateval.focus();
    }


    else
    {
      document.myForm.action="feedData.php";
      document.myForm.submit();



    }
  }


  </script>
</head>

<form class="pure-form pure-form-stacked" name="myForm" method="post">

  <?php
  $dbhandle = mysqli_connect("localhost", "root", "mysql","cabBills")
  or die("Unable to connect to MySQL");
  $sdate = $_POST['sdate'];
  $id = $_POST['id'];
  $del1="delete from Employee where id='".$id."' and pmtdt='".$sdate."'";
  mysqli_query($dbhandle,$del1);
  $del2="delete from temp_collectdata";
  mysqli_query($dbhandle,$del2);

  ?>

  <fieldset>
    <center>

      <h2><legend>Bill Claims Management Application </legend></h2>

      <label for="nature">Expenses Nature:</label>

      <select name="exp">
        <option selected value="Weekly">Weekly
          <option value="15 days"> 15 days
            <option value="Monthly">Monthly
            </select>
            <label for="dateval">Bill Submission Date: </label>
            <input id="dateval" type="text" placeholder="Choose Date" name="dateval" onClick="f()">
            <span class="pure-form-message">This is a required field.</span>

            <label for="id">Employee ID : </label>
            <input id="id" type="email" name="id" value="XI" autofocus>
            <span class="pure-form-message">This is a required field.</span>
            <label for="name">Employee Name : </label>
            <input id="name" type="text" placeholder="Enter your Name"name="name">
            <span class="pure-form-message">This is a required field.</span>
            <label for="acc">Bank Account Number : </label>
            <input id="acc" type="text" placeholder="Enter Bank Account Number" name="acc">
            <span class="pure-form-message">This is a required field.</span>
            <label for="manager">Manager : </label>
            <input id="mname" type="text" placeholder="Enter Manager's Name" name="mname">
            <span class="pure-form-message">This is a required field.</span>
            <br>
            <input type="button" class="pure-button pure-button-primary" value="Next" onClick="validate()">
            <input type="reset" class="pure-button pure-button-primary" value="Cancel">
            <input type="button" class="pure-button pure-button-primary" value="See History" onclick="location.href='billHistory.php';"">

          </fieldset>
        </form>



      </body>
      </html>
