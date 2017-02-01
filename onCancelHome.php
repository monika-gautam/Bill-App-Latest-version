 <html>
   <html>
<head>
<title>Bill Claims Management Application</title>
<link rel="stylesheet" type="text/css" media="all" href="/jsdate/jsDatePick_ltr.min.css" />
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
        <body bgcolor="PowderBeige" style="background-image: url(menu/images/Ola5.jpg), url(menu/images/pattern.png);">
         <form name="myForm" method="post">
		 
   <?php  
        $dbhandle = mysqli_connect("localhost", "root", "123456","cabBills")
           or die("Unable to connect to MySQL");
         $sdate = $_POST['sdate'];
         $id = $_POST['id'];		 
        $del1="delete from Employee where id='".$id."' and pmtdt='".$sdate."'";
        mysqli_query($dbhandle,$del1);
		$del2="delete from temp_collectdata";
        mysqli_query($dbhandle,$del2);
      
    ?>  
		  
		 <center> 
            
              <h1><font color="Red"> Bill Claims Management Application </font></h1>
		   <br>
          <br>		   
              <table cellspacing="2" cellpadding="2">
              
               <tr> <td bgcolor="Beige"> <b><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expenses Nature : </b></td> 
                   <td>
                   <select name="exp"  style="background-color: PowderBlue;font-weight: bold;border: 0;" size="1">
                   <option selected value="Weekly">Weekly
                   <option value="15 days"> 15 days
                   <option value="Monthly">Monthly
                  
           
                   </select> 
                 </td>
               </tr>
            <tr>
         <th align="left">   
          <font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee ID : </font></th>
              <td><input type="text"  name="id" size="20" value="XI" style="background-color: powderblue;border: 1;" autofocus></td>  
         </tr>
             <TR> 
                                                                    <Th bgcolor="Beige" align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Name :</th>
                                                                     <TD>
                                                                       <INPUT type="text" name="name" style="background-color: PowderBlue;font-weight: bold;border: 0;" size="25"  required autofocus>
                                                                         </TD>
                                                                          </TR>
                  
  <TR> 
                                                                    <Th bgcolor="Beige" align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank A/C No. :</th>
                                                                     <TD>
                                                                       <INPUT type="text" style="background-color: PowderBlue;font-weight: bold;border: 0;" name="acc" size="25" required>
                                                                         </TD>
                                                                          </TR>
              <tr>
                   <th bgcolor="Beige" align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager :</th>
                  <td colspan=3><input type="text" style="background-color: PowderBlue;font-weight: bold;border: 0;" name="mname" size="25" required>
                  </td>
               </tr>
            
                              
                            <tr>
                     <th  bgcolor="Beige" align="left"><font color="DarkSlateGray" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bill Submission Date :</th>
                     
                     
                       <td> <input type="text" style="background-color: PowderBlue;font-weight: bold;border: 0;" name="dateval" id="dateval" size="25"  size="30" onClick="f()">
                     
                        </td>
                     </tr>
                         
			
                                                                                                   
                                             
                                                                
                                                                           </table>
		<br><br>
        
            <input type="button" value="   Next   " style="background-color: PaleGreen;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'"   onClick="validate()" >&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="   Cancel   " style="background-color: PaleGreen;font-weight: bold;font-size: 13pt;" onMouseOver="this.style.backgroundColor='Red'" onMouseOut="this.style.backgroundColor='PaleGreen'"   />                            
          																   
																		   
                                
                                                                             
                                                                            </form>
                                                                    

                                                                          </body>
                                                                        </html>