<?php 
//include("data.php");
  $today = Date("d-m-Y");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account Information</title>
<link href="https://fonts.googleapis.com/css?family=Khmer&display=swap" rel="stylesheet">
<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
<link rel="stylesheet" href="css/main.css">
</head>

<body>
<div class="page">
   <div class="header">
     <div class="logo">
        <div style=" width:50%; float:right; font-size:14px;">
               <img style=" float:right; height:80px; margin-right:5px;" src="img/logo-right.png"/>
               <table  style="width:100%; margin-right:0; float:right;">
                    <tr>
                       <td width="30%"></td>
                       <td width=-"70%"><label>កាលបរិច្ឆេទស្នើសុំ</label> / Application Date :
                            <input type="text" class="inputs" style="font-size:16px; width:100px; font-weight:600; float:right; margin-top:3px;" 
                                    value="<?php echo $today; ?>"/>
                       </td>
                    </tr>
               </table>
       </div>
       <div style=" width:50%; float:left;">
               <img style=" height:90px; margin-left:5px;" src="img/logo.png"/>
       </div>
    </div><!---logo--->
   </div><!---header
   <div class="container">-->
       <table class="table" style="width:100%;">
            <tr>
              <td width="15%"><label>​ស្នើសុំ </label>/ Applying For : </td>
              <td width="30%"><label><input type="checkbox" /> បើកគណនីបុគ្គល</label> / Single Personal Account</td>
              <td width="30%"><label><input type="checkbox" /> គណនីសហសមាជិក</label> / Join Member Account</td>  
            </tr>
        </table>
            <?php include("page/1m.php");?>
         </div> <!---/page------->
       
        <!--------detail1-----------> 
        <!------ end first page----------->
        <div class="pagebreak"></div>
        
        <div class="page">  
             <div class="space"></div>     
             <?php include("page/2.php");?>  
        </div>       
        <!--------detail1-----------> 
        <!------ end second page-----------> 
        <div class="pagebreak"></div>
        <div class="page">    
             <div class="space"></div>     
             <?php include("page/3.php");?> 
        </div>
 
</body>
</html>


