<?ob_start();
session_start();
 
 
/*
   session_unregister("sess_userlog_PAYMENT");
   session_unregister("sess_id_PAYMENT");
   session_unregister("sess_name_PAYMENT");
   session_unregister("sess_con_PAYMENT");
   session_unregister("sess_level_PAYMENT");
   session_destroy();*/
unset($_SESSION["sess_id_datacenter"]);
unset($_SESSION["sess_userlog_datacenter"]);
 unset($_SESSION["sess_code"]);
 unset($_SESSION["sess_depart"]);
 

header("location:index.php");

 
echo "<div align='center'><img src='images/18.gif'></div>";
 
?>