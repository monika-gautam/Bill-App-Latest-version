
<html>
<head>
<title> Bill Claims Management Application</title>
<link rel="stylesheet" type="text/css" media="all" href="/jsdate/jsDatePick_ltr.min.css" />
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
				            
							
                            document.myForm.action="cabBills.html"; 
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
        <body bgcolor="Cyan">
         <form name="myForm" method="post">
          <center> 
            <br>
			<br>
			
               <center><h2><font color="Blue"> Enter details to see history </font></h2></center>
			   <?php  
		      $dbhandle = mysqli_connect("localhost", "root", "123456","cabBills")
           or die("Unable to connect to MySQL");
		 
		   $s1="select distinct id from employee";
		   $r1= mysqli_query($dbhandle,$s1); 
								 
           ?>					
		   <br>
          <br>
       <div id="mydiv">		  
              <table cellspacing="2" cellpadding="2">
              
               
             <tr>
         <th align="left">   
          <font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee ID : </font></th>
              <td>
                   <select name="id"  style="background-color: PowderBlue;font-weight: bold;border: 0;" size="1" onchange="sdate()">
                    <option selected value="none"> Choose ID </option>
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
          
            
                              
                            <tr>
                     <th  align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bill Submission Date :</th>
                     
                     
                       <td> <input type="text" style="background-color: PowderBlue;font-weight: bold;border: 0;" name="dateval" id="dateval" size="25"  size="15" readonly>
                     
                        </td>
                     </tr>
                         
			
                                                                                                   
                                             
                                                                
                                                                           </table>
			<center>
            <input type="button" value="   Back   " style="background-color: PaleGreen;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'"   onClick="home()"/> </center>															   
				</div>														   
		                      
                                                                            </form>
                                                                    

                                                                          </body>
                                                                        </html>