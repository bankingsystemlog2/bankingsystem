<?php
  $page_title = 'Edit Competent';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Taking Examination</a>
</nav>
<!-- /Breadcrumb -->
<?php
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query($con,"select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:exam-take.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
  header("location: home.php");
}
?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Edit Competent</span>
      </div>
      <div class="card-body">
<?php
$login = $_SESSION['user_id'];
$query="select * from mst_question";

$rs=mysqli_query($con,"select * from mst_question where test_id=$tid",$cn) or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
  $_SESSION[qn]=0;
  mysqli_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
  $_SESSION[trueans]=0;
  
}
else
{ 
    if($submit=='Next Question' && isset($ans))
    {
        mysqli_data_seek($rs,$_SESSION[qn]);
        $row= mysqli_fetch_row($rs);  
        mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
        if($ans==$row[7])
        {
              $_SESSION[trueans]=$_SESSION[trueans]+1;
        }
        $_SESSION[qn]=$_SESSION[qn]+1;
    }
    else if($submit=='Get Result' && isset($ans))
    {
        mysqli_data_seek($rs,$_SESSION[qn]);
        $row= mysqli_fetch_row($rs);  
        mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
        if($ans==$row[7])
        {
              $_SESSION[trueans]=$_SESSION[trueans]+1;
        }
        echo "<center><h3>Result</h3></center>";
        $_SESSION[qn]=$_SESSION[qn]+1;
        echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
        echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
        $w=$_SESSION[qn]-$_SESSION[trueans];
        echo "<tr class=fans><td>Wrong Answer<td> ". $w;
        echo "</table>";
        mysqli_query($con,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
        echo "<center><br><a href='home.php' class='btn btn-primary btn-sm'>Back Home</a> </center>";
        unset($_SESSION[qn]);
        unset($_SESSION[sid]);
        unset($_SESSION[tid]);
        unset($_SESSION[trueans]);
        exit;
    }
}
$rs=mysqli_query($con,"select * from mst_question where test_id=$tid",$cn) or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=home.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=exam-take.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td><span class=style2>Question ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1> $row[3]";
echo "<tr><td class=style8><input type=radio name=ans value=2> $row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3> $row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4> $row[6]";

if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";
?>

      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
