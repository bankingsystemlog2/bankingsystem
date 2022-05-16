<div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Applicants for approval</span>
       </strong>
     </div>
     <div class="col-md-6">
       
<form id="custom-search-form" class="form-search form-horizontal pull-right" method="get" action="search-applicant-approval.php">
                <div class="input-append span12">
                    <input type="text" class="search-query text-primary" placeholder="Search" name="search">
                    <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
  </div>

</div>
      </div>
     <div class="panel-body">
       <table class="table table-bordered table-striped">
        <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Applicant name</th>
            <th class="text-center" style="">Designation</th>
            <th class="text-center" style="">Department</th>
            <th class="text-center" style="">Date</th>
            <th class="text-center" style="">Action</th>
           
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['designation']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['department']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td>
           <td class="text-center">
            <a href="approve-pr.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-check"></i></a>
            <a href="reject-pr.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a>
           </td>
          
           
         
                </div>
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());   } ?>



       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>