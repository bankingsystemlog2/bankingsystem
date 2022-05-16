<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php include_once('layouts/header.php'); ?>
<div class="container">
<div class='console'>
    <div class='console-inner'>
      <div class="wrapper forLogger">
      <div class="header"><h4>System Login Logs</h4></div>
      <div id="outputs" class="contentsofLogs">
        <?php
        $Login_Logs = file_get_contents('Logs/Login_Logs.txt');
        echo '<PRE><b>' . $Login_Logs . '</b>';
        ?>
      </div>
        <div class="footer">
        <div class='output-cmd'><textarea autofocus class='console-input' placeholder="Type command..."></textarea></div>
       <button class="btn btn-secondary" style="margin-left:20px; margin-bottom: 10px;" type="button" name="button" onclick="printDiv()">Print</button>
        </div>
    </div>
</div>
</div>
</div>

  <script>
        function printDiv() {
            var divContents = document.getElementById("outputs").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<html>');
            a.document.write('<body > <h1 style="font-family:sans-serif">System Login </h1><h3><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
      </script>

<?php include_once('layouts/footer.php'); ?>
