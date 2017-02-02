 <? session_start(); ?><html>
   <head>
        <title> Bill Claim - Record Status </title>

        <script type="text/javascript">
		//stopping browser back button
	   history.pushState(null, null, 'Cab form');
       window.addEventListener('popstate', function(event) {
       history.pushState(null, null, 'Cab form');
       });
	 function status_back(){


                            document.myForm.action="onBackcollectdata.php";
                             document.myForm.submit();
			 }

	function remove(){
		           var con=confirm("Are you sure you want to delete this record?");
                             if (con==true){
					 var s=window.event.srcElement.id;
                       l=s.length;

					   var num=s.substring(3,l);
					   //var brdtm="brdtm"+num;

					   var date="date"+num;
					  //  var amt="amt"+num;
								 if (window.XMLHttpRequest) {

                                         xmlhttp = new XMLHttpRequest();
                                    } else {
                                         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                 xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                    document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
                                    }

                                  };


                              var date=encodeURIComponent(document.getElementById(date).value);
                             // var brdtm=encodeURIComponent(document.getElementById(brdtm).value);
							 // var amt=encodeURIComponent(document.getElementById("amt").value);
							 // var parameters="date="+date+"&amt="+amt+"&brdtm="+brdtm;
							  var parameters="date="+date;
 							 xmlhttp.open("POST","ajaxDelete_record.php",true);
							 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

 							 xmlhttp.send(parameters);

					   }
		         }

		function update(){
		           var con=confirm("Are you sure you want to submit the changes?");
                             if (con==true){
					 var s=window.event.srcElement.id;
                       l=s.length;

					   var num=s.substring(6,l);
					   var brdtm="brdtm"+num;

					   var date="date"+num;
					    var amt="amt"+num;
								 if (window.XMLHttpRequest) {

                                         xmlhttp = new XMLHttpRequest();
                                    } else {
                                         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                 xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                    document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
                                    }

                                  };


                              var date=encodeURIComponent(document.getElementById(date).value);
                              var brdtm=encodeURIComponent(document.getElementById(brdtm).value);
							  var amt=encodeURIComponent(document.getElementById(amt).value);
							  var parameters="date="+date+"&amt="+amt+"&brdtm="+brdtm;

 							 xmlhttp.open("POST","ajaxUpdate_record.php",true);
							 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

 							 xmlhttp.send(parameters);

					   }
		         }


	   </script>
        </head>
        <body bgcolor="Lightgrey">
         <form name="myForm" method="post">

          <?php
            $dbhandle = mysqli_connect("localhost", "root", "mysql","cabBills")
           or die("Unable to connect to MySQL");

		if(isset($_SESSION['id'])){
		    $id=$_SESSION['id'];
		    $exp = $_POST['exp'];
			$hidd = $_POST['hidd'];
            $curr_val=intval($hidd);
			$sdate = $_POST['sdate'];

			$sql1="select * from temp_collectdata";
           $result1= mysqli_query($dbhandle,$sql1);

         ?>
		   <br>
		   <br>
		   <input type="hidden" name="id" value="<?= $id ?>" >
		    <input type="hidden" name="sdate" value="<?= $sdate ?>" >
		   <input type="hidden" name="exp" value="<?= $exp ?>" >
		   <input type="hidden" name="hidd" value="<?= $curr_val ?>">

          <center>  <div style ='font:16px Tahoma;color:Red'><b>Below is the list of entries that you have added. </b></div> </center>
          <br>
			<div id="mydiv">
                 <center>

                              <table cellspacing="2" cellpadding="2" border="1">

                           <tr>

                               <th align="right" bgcolor="PeachPuff"><center>Date</center></th>

							    <th bgcolor="PeachPuff">Board Time</th>
                                <th bgcolor="PeachPuff"><center>Amount</center></th>
                                <th align="right" bgcolor="PeachPuff"><center>Rate</center></th>
							    <th align="right" bgcolor="PeachPuff"> <center> </center></th>
								<th align="right" bgcolor="PeachPuff"> <center> </center></th>

                           </tr>

        <?
					          $i=1;
                              $j=$i;
        while ($row = mysqli_fetch_array($result1,MYSQLI_NUM))
            {
		 // if($i==2)
            $date = "date".$i;
            $brdtm="brdtm".$i;
            $amt = "amt".$i;
            $rate = "rate".$i;
			$update = "update".$i;
			$del = "del".$i;


                        ?>

                         <tr>
                               <td> <center><input type="text"  style="border: 0;"  value="<? echo $row{0} ?>" id="<? echo $date ?>" size="10" readonly ></center></th>

                               <td><center><input type="text"  style="border: 0;"  value="<? echo $row{1} ?>" id="<? echo $brdtm ?>" size="10" readonly></center></th>
                               <td><center><input type="text"  style="border: 0;"  value="<? echo $row{2} ?>" id="<? echo $amt ?>" size="4" ></center></th>
                               <td><center><input type="text"  style="border: 0;"  value="<? echo $row{3} ?>" id="<? echo $rate ?>" size="3" readonly></center></th>
                               <td><center><input type="button" id='<? echo $update ?>' style="background-color: PaleGreen;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'" value="UPDATE" onClick="update()"></center></td>
		<?
           if($i%2!=0){
        ?>
                               <td rowspan="2"><center><input type="button" id='<? echo $del ?>' style="background-color: PaleGreen;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'" value="DELETE" onClick="remove()"></center></td>

		<?
		                }
        ?>
					    </tr>


                   <?

                     $i=$i+1;
                    }
					?>


					</table>
					<br>
					</div>
                   <center>    <input type="button" value="   Back   " style="background-color: SkyBlue;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='SkyBlue'"   onClick="status_back()">
				</center>
 <?
		   }
		   else{
		   ?>
	     <H1><center><font color="red">Permission Denied!!!</font></center></h1>
		 <?
		   }

		   ?>
</form>

    </body>

</html>
