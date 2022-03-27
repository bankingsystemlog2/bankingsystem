<?php
  $page_title = 'Fleet Management';
  require_once('../includes/log2load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Vehicle Reservation</span>
       </strong>
      </div>
      <div class="row">
      <div class="col-md-2">
        <input type="date" name="from_date" id="from_date" class="form-control dateFilter" placeholder="From Date" />
      </div>
      <div class="col-md-2">
        <input type="text" name="to_date" id="to_date" class="form-control dateFilter" placeholder="To Date" />
      </div>
      <div class="col-md-2">
        <input type="button" name="search" id="btn_search" value="Search" class="btn btn-primary" />
      </div>
    </div>
      <div class= "container">        
      <table class="table table-bordered table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" style="width: 15%;">Date Receive</th>
            <th>Request By</th>
            <th class="text-center" style="width: 15%;">Document Date</th>
            <th>Document Subject</th>
            <th>Document Sender</th>
            <th class="text-center" style="width: 15%;">Application Date</th>
            <th>Application Remarks</th>
            <th class="text-center" style="width: 15%;">Reference Number</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $a_vendor): ?>
            <tr>
            <td><?php echo str_replace('.php', '', (ucwords($a_vendor['module'])))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['action_taken']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['datetime_created']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['module']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['action_taken']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['name']))?></td>
            <td><?php echo remove_junk(ucwords($a_vendor['datetime_created']))?></td>
          <?php endforeach;?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
  
</div>
<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
  <?php include_once('../layouts/footer.php'); ?>