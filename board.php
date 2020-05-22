<html>
<head>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="include.con/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('gdata.php').fadeIn("slow");
}, 2000); // refresh every 10000 milliseconds
</script>
</head>
<body>
<div id="load_tweets"> </div>
 
</body>
</html>