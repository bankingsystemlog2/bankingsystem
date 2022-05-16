<?php
 $page_title = 'Audit Trail';
  require_once('includes/load.php');
	 $current_user = current_user();
 
  page_require_level(1);

  // error opening the file.


?>
<!DOCTYPE html>
  <html lang="en">
<head>
	<title>Posted Job</title>
	  <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  <!-- All Bootstrap Links -->
      <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
      <link rel="stylesheet" href="libs/css/dataTables.bootstrap5.min.css" />
      <link rel="stylesheet" href="libs/css/style.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	 <style type="text/css">
	@media print{
		
	#a{
		display: none; !important;
	}
	#button{
		display: none; !important;
	}
</style>
</head>
<body style="font-family: arial;font-size: 16px;">
<?php

$homepage = file_get_contents('log.txt');
echo '<PRE><b>' . $homepage . '</PRE>';

?>
<div>
<button id="button" class="btn btn-success" onclick="window.print()">PRINT</button>
<a id="a" href="manager.php" class="btn btn-danger">BACK</a>
</div>
</body>
</html>