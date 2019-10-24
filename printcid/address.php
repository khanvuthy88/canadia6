<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Admin@root123');
define('DB_NAME', 'address');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	echo "Hello DB Fail";
}
							   if ($pro=='01'){$p="City";}
							   else {$p = "Province";}
							   if ($dis =='01'){$d="Khan";}
							   else {$d="District";}
							   
							   $sqlp =  'select * from tbl_province where PID='.$pro.'';
							   $resultp = $conn->query($sqlp);
	                           while($rowp = $resultp->fetch_assoc()) { 
		                        $pr=$rowp["TITLE"].' '.$p;
								$p=$rowp["TITLE"];
		                       }
							   
							   $sqld =  'select * from tbl_district where DID='.$dis.'';
							   $resultd = $conn->query($sqld);
	                           while($rowd = $resultd->fetch_assoc()) { 
							      $sr=$rowd["TITLE"];
							     if ($dis=='01') {   
		                           $di=$rowd["TITLE"].' '.$d.','; 
								   
								 }
								 else {
								   $di=$d.' '.$rowd["TITLE"].',';	 
								 }
		                       }
							  
							   $sqlc =  'select * from tbl_commune where CID="'.$com.'"';
							   $resultc = $conn->query($sqlc);
	                           while($rowc = $resultc->fetch_assoc()) {   
							       $c=$rowc["TITLE"];       
		                           $co=$rowc["TITLE"].' Commune,'; 
		                       }
							   $sqlv =  'select * from tbl_village where VID="'.$vil.'"';
							
							   $resultv = $conn->query($sqlv);
	                           while($rowv = $resultv->fetch_assoc()) { 
							       $v=$rowv["TITLE"];        
		                           $vi=$rowv["TITLE"].' Village,'; 
		                       }



?>