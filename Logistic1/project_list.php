<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>
<div class="project">
<div id="proj_list_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-sm">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Project List Report
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="stats" required>
            <option selected="" disabled=""></option>
            <option value="1">Ongoing Projects</option>
            <option value="2">Finished Projects</option>
            <option value="3">Cancelled Projects</option>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_proj_list()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> View</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Close</button>
           
                     </div>
                     </div> 
            </div>
          </div>

  <div id="proj_prog_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Project Progress Report
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Project:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="pp" required>
            <option selected="" disabled=""></option>
           <?php
            $pp = mysqli_query($conn,"SELECT * FROM projects order by project ASC ");
            while($pp_row=mysqli_fetch_assoc($pp)){
            ?>
            <option value="<?php echo $pp_row['project_id'] ?>"><?php echo ucwords($pp_row['project']) ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_proj_prog()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> View</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Close</button>
           
                     </div>
                     </div> 
            </div>
          </div>

  <div id="foreman_portfolio_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Foreman Portfolio Records
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Foreman:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="reid" required>
            <option selected="" disabled=""></option>
           <?php
            $pp = mysqli_query($conn,"SELECT *,CONCAT(lastname,', ',firstname,' ',midname) as name FROM employee natural join position where position = 'foreman' ");
            while($pp_row=mysqli_fetch_assoc($pp)){
            ?>
            <option value="<?php echo $pp_row['eid'] ?>"><?php echo ucwords($pp_row['name']) ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_portfolio()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> View</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Close</button>
           
                     </div>
                     </div> 
            </div>
          </div>
  <div id="attendance_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Attendance Report
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Select Month:</label>
          <div class="col-sm-8">
            <input class="form-control" type="month" style="text-transform:capitalize" id="sm" required>
            
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_att()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> View</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Close</button>
           
                     </div>
                     </div> 
            </div>
          </div>
		  </div>
</body>

 

</html>

<?php include_once('layouts/footer.php'); ?>