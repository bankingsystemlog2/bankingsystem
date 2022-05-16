<?php
require_once('includes/load.php');

if(isset($_POST['sub'])){
$x;
foreach ($_POST['emp'] as $em) {
	$x + 1;
}


}

?>

<!DOCTYPE html>

<head></head>
<body>
	
	<form action="try.php" method="POST">
		 <select name="emp[]" multiple >
              <?php 
              $sql = "SELECT * FROM employees ";
              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              do{ ?>
  <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>

             <?php }
              while($emp = $res->fetch_assoc());

              ?>
            </select>
            <button type="submit" name="sub">try</button>
	</form>
</body>


</html>