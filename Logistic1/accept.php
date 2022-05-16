<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>
<style>
#wrapper{
	background-color: white;
	text-align: center;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#btns{
	background-color: #969696;
	border: none;
	color: white;
	padding: 8px 10px;
	font-size: 15px;
	cursor: pointer;
}
#btnss{
	text-decoration: none;
	color: white;
}
.tops{
	padding-top: 50px;
}
p{
	font-size: 50px;
}
</style>
<div id="wrapper">
<?php
    include('includes/config2.php');
    $id = $_GET['id'];
    $query = "select * from `ongoing_project_list` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $prop_proj = $row['prop_proj'];
            $proj_name = $row['proj_name'];
            $loc = $row['loc'];
            $cost = $row['cost'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $proj_man = $row['proj_man'];
            $query = "INSERT INTO `ended_project_list` (`id`, `prop_proj`, `proj_name`, `loc`, `cost`, `start_date`, `end_date`, `proj_man`) VALUES (NULL, '$prop_proj', '$proj_name', '$loc', '$cost', '$start_date', '$end_date', '$proj_man');";
        }
        $query .= "DELETE FROM `ongoing_project_list` WHERE `ongoing_project_list`.`id` = '$id';";
        if(performQuery($query)){
			echo "<div class='tops'>";
            echo "<p>Project has been Ended.</p>";
			echo "</div>";
        }else{
			echo "<div class='tops'>";
            echo "<p>Unknown error occured. Please try again.</p>";
			echo "</div>";
        }
    }else{
		echo "<div class='tops'>";
        echo "<p>Error occured.</p>";
        echo "</div>";
    }
    
?>
<br/><br/>
<hr>
<button class="btn btn-secondary" id="btns"><a href="pm.php" id="btnss">Back</a></button>
</div>
<?php include_once('layouts/footer.php'); ?>