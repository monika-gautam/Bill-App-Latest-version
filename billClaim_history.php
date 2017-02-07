<html>
<head>
  <title> Bill Claim - Record Status </title>
  <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
  <script type="text/javascript">
  //stopping browser back button
  history.pushState(null, null, 'Cab form');
  window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'Cab form');
  });
  function status_back(){


    document.myForm.action="index.html";
    document.myForm.submit();
  }



  </script>
</head>
<body>
  <form class="pure-form pure-form-stacked" name="myForm" method="post"

  <?php
  $dbhandle = mysqli_connect("localhost", "root", "mysql","cabBills")
  or die("Unable to connect to MySQL");


  $dateval = $_POST['dateval'];
  $id = $_POST['id'];


  $sql1="select * from collectdata where id='".$id."' and submission_date='".$dateval."'";
  $result1= mysqli_query($dbhandle,$sql1);

  ?>
  <br>
  <br>

  <center>
    <h2><legend>Below are the details of the Expense Claim for Date:- "<?= $dateval ?>"</legend></h2>
    <br>
    <center>	<div id="mydiv">
      <label for="id">Employee ID</label>
      <input id="id" type="email" name="id" value="<? echo $id ?>" size="5" readonly>
      <br>
      <label for="dateval">Submission Date(yyyy/mm/dd)</label>
      <input type="text" name="dateval" id="dateval" value="<? echo $dateval ?>" size="8" readonly>
      <br>

      <center>

        <table class="pure-table pure-table-bordered">
          <thead>
            <tr>

              <th><center>Date</center></th>

              <th><center>Board Time</center></th>
              <th><center>Amount</center></th>
              <th><center>Rate</center></th>


            </tr>
</thead>

          <?
            $total=0.00;
            while ($row = mysqli_fetch_array($result1,MYSQLI_NUM))
            {
              $aed=  number_format(($row{4}*$row{5}), 2,'.', '');
              $total=number_format(($total+$aed), 2,'.', '');


              ?>
              <tbody>
              <tr>

                <td><center><? echo $row{2} ?></center></td>

                <td><? echo $row{3} ?></td>
                <td><center><? echo $row{4} ?></center></td>
                <td><center><? echo $row{5} ?></center></td>

              </tr>

              <?
            }
            ?>

</tbody>
          </table>
          <br>
          <div style ='font:17px Tahoma;color:#Blue'> TOTAL : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $total ?></div>

          <br>
        </div>
        <input type="button" class="pure-button pure-button-primary" value="Back" onClick="status_back()">
        </center>

      </form>

    </body>

    </html>
