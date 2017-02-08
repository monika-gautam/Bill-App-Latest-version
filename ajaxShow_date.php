<html>
<head>
  <title>Bill Claims Management Application</title>
  <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
  <script language="javascript">
  </script>
</head>
<body>
  <form class="pure-form pure-form-stacked" name="myForm" method="post">
    <?php
    $dbhandle = mysqli_connect("localhost", "root", "mysql","cabBills")
    or die("Unable to connect to MySQL");
    $id = $_POST['id'];
    $s1="select distinct id from employee";
    $r1= mysqli_query($dbhandle,$s1);
    $sql="select distinct pmtdt  from  employee where id='".$id."'";
    $result1= mysqli_query($dbhandle,$sql);
    $num=mysqli_num_rows($result1);
    ?>
    <table class="pure-table pure-table-bordered">
      <thead>
        <tr>
          <th>Employee ID:</th>
          <td>
            <select name="id" onchange="sdate()">
              <option selected value="<? echo $id ?>"> <? echo $id ?> </option>
              <?
              while ($row11 = mysqli_fetch_array($r1,MYSQLI_NUM))
              {
                ?>
                <option  value="<? echo $row11{0} ?>"> <? echo $row11{0} ?> </option>
                <?
              }
              ?>
            </select>
          </td>
          </tr>
        </thead>
<tbody>
  <tr>
    <th>Bill Submission Date:</th>
              <td>
                <select name="dateval">
                  <option selected value="none">Choose Date</option>
                  <?
                  while ($row = mysqli_fetch_array($result1,MYSQLI_NUM))
                  {
                    ?>
                    <option  value="<? echo $row{0} ?>"> <? echo $row{0} ?> </option>
                    <?
                  }
                  ?>
                </select></td>
              </tr>
</tbody>
            </table>
            <br>
            <input type="button" class="pure-button pure-button-primary" value="See History" onClick="myresult()">
            <input type="button" class="pure-button pure-button-primary" value="Back" onClick="home()"/>
            </form>
          </body>
          </html>
