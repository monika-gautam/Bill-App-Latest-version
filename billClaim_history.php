<html>
   <head>
        <title> Bill Claim - Record Status </title>
		
        <script type="text/javascript">
		//stopping browser back button
	   history.pushState(null, null, 'Cab form');
       window.addEventListener('popstate', function(event) {
       history.pushState(null, null, 'Cab form');
       });
	 function status_back(){ 
				            
							
                            document.myForm.action="cabBills.html"; 
                             document.myForm.submit();    
			 }
			 
	
		
	   </script>
        </head>
        <body bgcolor="Lightgrey">
         <form name="myForm" method="post">
		  
          <?php  
            $dbhandle = mysqli_connect("localhost", "root", "123456","cabBills")
           or die("Unable to connect to MySQL");
		 
		
		    $dateval = $_POST['dateval']; 
			$id = $_POST['id']; 
           
            
			$sql1="select * from collectdata where id='".$id."' and submission_date='".$dateval."'";
           $result1= mysqli_query($dbhandle,$sql1);
		   
         ?> 
		   <br>
		   <br>
		   
		  
          <center>  <div style ='font:16px Tahoma;color:Red'><b>Below are the details for the claimed expense for Date  :- "<?= $dateval ?>" </b></div> </center>
          <br> 	                  
		<center>	<div id="mydiv">
			<div style ='font:17px Tahoma;color:#Blue'> Employee Id <input type="text" style="background-color: Beige;font-weight: bold;border: 0;"  id="receivedby"  onMouseOver="this.style.backgroundColor='Salmon'" onMouseOut="this.style.backgroundColor='Beige'" value="<? echo $id ?>" readonly></div>
						<br>
 	              <div style ='font:17px Tahoma;color:#Blue'>  Submission Date(yyyy/mm/dd) -: <input type="text" style="background-color: Beige;font-weight: bold;border: 0;"  name="dateval" id="dateval"  onMouseOver="this.style.backgroundColor='Salmon'" onMouseOut="this.style.backgroundColor='Beige'" value="<? echo $dateval ?>" readonly></div></center>
				  <br>
				  
                 <center> 
            
                              <table cellspacing="2" cellpadding="2" border="1">
							
                           <tr>  
                               
                               <th align="right" bgcolor="PeachPuff"><center>Date</center></th>
                              
							    <th bgcolor="PeachPuff">Board Time</th>
                                <th bgcolor="PeachPuff"><center>Amount</center></th> 
                                <th align="right" bgcolor="PeachPuff"><center>Rate</center></th>
							    						 
                               
                           </tr>
						   
        <?
					         $total=0.00;							  
        while ($row = mysqli_fetch_array($result1,MYSQLI_NUM)) 
            { 
		        $aed=  number_format(($row{4}*$row{5}), 2,'.', '');
	            $total=number_format(($total+$aed), 2,'.', '');
								    
								
                        ?>
						<tr>  
                               
                               <th align="right" bgcolor="PeachPuff"><center><? echo $row{2} ?></center></th>
                              
							    <th bgcolor="PeachPuff"><? echo $row{3} ?></th>
                                <th bgcolor="PeachPuff"><center><? echo $row{4} ?></center></th> 
                                <th align="right" bgcolor="PeachPuff"><center><? echo $row{5} ?></center></th>
							    
					    </tr>
					
		<?
			}
        ?>			
                  
                     
					</table> 
					<br>
					<div style ='font:17px Tahoma;color:#Blue'> TOTAL : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $total ?></div>
					
					<br>
					</div>
                   <center>    <input type="button" value="   Back   " style="background-color: SkyBlue;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='SkyBlue'"   onClick="status_back()">
				</center>	
 
</form>		   
				
    </body>

</html> 
         
                            
							
							