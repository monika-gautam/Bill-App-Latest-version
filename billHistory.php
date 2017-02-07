
<html>
<head>
	<title> Bill Claims Management Application</title>
	<link rel="stylesheet" type="text/css" media="all" href="/jsdate/jsDatePick_ltr.min.css" />
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
	<script type="text/javascript" src="/jsdate/jsDatePick.min.1.3.js"></script>


	<script language="javascript">
	function sdate(){

		//alert("aaa");
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert("no error");
				document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
			}

		};

		var id=encodeURIComponent(document.myForm.id.value);

		var parameters="id="+id;

		xmlhttp.open("POST","ajaxShow_date.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xmlhttp.send(parameters);


	}
	function home(){


		document.myForm.action="index.html";
		document.myForm.submit();
	}
	function myresult(){
		var v =document.myForm.dateval.value;
		if(v=="none")
		alert("Select a Date");
		else{

			document.myForm.action="billClaim_history.php";
			document.myForm.submit();
		}
	}

	</script>
</head>
<body>
	<form class="pure-form pure-form-stacked" name="myForm" method="post">
		<center>
			<br>

			<h2><legend>Enter details to see historical data</legend></h2>
			<?php
			$dbhandle = mysqli_connect("localhost", "root", "mysql","cabBills")
			or die("Unable to connect to MySQL");

			$s1="select distinct id from employee";
			$r1= mysqli_query($dbhandle,$s1);

			?>
			<br>
			<br>
			<div id="mydiv">
				<table class="pure-table pure-table-bordered">

					<thead>
						<tr>
							<th>Employee ID:</th>
								<td>
									<select name="id" onchange="sdate()">
										<option selected value="none">Choose ID</option>
										<?

										while ($row11 = mysqli_fetch_array($r1,MYSQLI_NUM))
										{
											?>

											<option  value="<? echo $row11{0} ?>"> <? echo $row11{0} ?> </option>
											<?

										}

										?>
									</select>

								</tr>
</thead>
<tbody>


								<tr>
									<th>Bill Submission Date:</th>


										<td> <input type="text" name="dateval" id="dateval" readonly>

										</td>
									</tr>



</tbody>

								</table>
								<br>
								<center>
									<input type="button" class="pure-button pure-button-primary" value="Back" onClick="home()"/>
								</div>

							</form>


						</body>
						</html>
