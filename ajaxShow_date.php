<html>
   <head>
        <title> Send Mail </title>
		<script language="javascript">
        
      </script>
        </head>
        <body bgcolor="cyan">
         <form name="myForm" method="post">
         
          <?php 
            $dbhandle = mysqli_connect("localhost", "root", "123456","cabBills")
           or die("Unable to connect to MySQL");
            $id = $_POST['id'];
            $s1="select distinct id from employee";
		   $r1= mysqli_query($dbhandle,$s1); 
           
			$sql="select distinct pmtdt  from  employee where id='".$id."'";
           $result1= mysqli_query($dbhandle,$sql);
        	$num=mysqli_num_rows($result1); 	   
			
			 ?>
			 
			
		      <table cellspacing="2" cellpadding="2">
              
               
             <tr>
         <th align="left">   
          <font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee ID : </font></th>
              <td>
                   <select name="id"  style="background-color: PowderBlue;font-weight: bold;border: 0;" size="1" onchange="sdate()">
                    <option selected value="<? echo $id ?>"> <? echo $id ?> </option>
				<?
				
								  while ($row11 = mysqli_fetch_array($r1,MYSQLI_NUM)) 
                                {
					?>				
									           
                                  <option  value="<? echo $row11{0} ?>"> <? echo $row11{0} ?> </option>
					<?
								
								}
								 
					?>				 
                                  </select></td>
           
                   
         </tr>
          
            
                              
                            <tr>
                     <th align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bill Submission Date :</th>
                     
                     
                       <td>
                   <select name="dateval"  style="background-color: PowderBlue;font-weight: bold;border: 0;" size="1" >
                    <option selected value="none"> Choose Date </option>
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
                         
			
                                                                                                   
                                             
                                                                
                                                                           </table>
           <br>
            <center><input type="button" name="next" class="hvr-buzz" value="  See History  " style="background-color: PaleGreen;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'"  onClick="myresult()"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="   Back   " style="background-color: PaleGreen;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'"   onClick="home()"/> </center>
			
	  </form>
    </body>

</html> 
 