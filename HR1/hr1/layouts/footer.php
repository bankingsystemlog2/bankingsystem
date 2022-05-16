
</div>
</div>
<?php if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
      ?>
        <script type="text/javascript">
          swal({
          title: "<?php echo $_SESSION['status']; ?>",
          //text: "You clicked the button!",
          icon: "<?php echo $_SESSION['status_code'];  ?>",
          button: "done",
          });
        </script>
      <?php
      unset($_SESSION['status']);
      unset($_SESSION['status_code']);
  }
   ?>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="libs/js/script.js"></script>

    
   <!-- End of Script Links -->

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>
