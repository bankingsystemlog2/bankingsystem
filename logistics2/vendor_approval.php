<?php
  $page_title = 'Vendor Application Form';
  require_once('../includes/log2load.php');
   page_require_level(4);
   global $db;
   $id = $_GET['id'];
   $sql = $db->query("SELECT * FROM vendors WHERE id='{$id}' LIMIT 1");
          //if(
            $vendors = $db->fetch_assoc($sql);
            //return $vendors;
?>
<?php
 //update user other info
 if(isset($_POST['update-vendor'])) {
    $req_fields = array('name','address','company','email','item_description','offer','phone','type');
   // validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$vendors['id'];
             $name   = remove_junk($db->escape($_POST['name']));
             $address   = remove_junk($db->escape($_POST['address']));
             $company   = remove_junk($db->escape($_POST['company']));
             $email   = remove_junk($db->escape($_POST['email']));
             $item_description   = remove_junk($db->escape($_POST['item_description']));
             $offer   = remove_junk($db->escape($_POST['offer']));
             $phone   = remove_junk($db->escape($_POST['phone']));
             $statuss   = remove_junk($db->escape($_POST['statuss'])); 
             $sql = "UPDATE vendors SET name ='{$name}', address ='{$address}', company ='{$company}', email ='{$email}', item_description ='{$item_description}', offer ='{$offer}', phone ='{$phone}', statuss='{$statuss}' WHERE id ='{$id}'";
             $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Application updated ");
              // for Audit Log
              // $link = $_SERVER['PHP_SELF'];
              // $link_array = explode('/',$link);
              // $page = end($link_array);
              // $now =  date('Y-m-d H:i:s');

              // $sqlAudit = "INSERT INTO `audit_logs`(`module`, `action_taken`, `users_id`, `datetime_created`) values ('{$page }',' Record has been Update where vendor is {$name}','{$_SESSION['user_id']}','{$now}' )";
              // $db->query($sqlAudit);
              //sample

              // Variables nyo
              // $link = $_SERVER['PHP_SELF'];
              // $link_array = explode('/',$link);
              // $page = end($link_array);
              // $variable4 = $_POST[id for file]
              // $now = date('Y-m-d H:i:s');

              //$sqlDocumentTracking = "INSERT INTO `docu_tracking`( `Action`, `users_id`, `Location`, `Document_Subject`, `Date_Created`) VALUES ('"(action)" to {$variable1}','{$_SESSION['user_id']}','{$page}','{$variable4}','{$now}')";
              // $db->query($sqlDocumentTracking);

              



          //end AuditLog Insert
            redirect('vendor_list.php', false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('vendor_list.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('vendor_list.php',false);
    }
  }
?>

<?php include_once('../layouts/log2header.php'); ?>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Application Form</span>
      </div>
      <div class="panel-body">
          <form method="post" action="vendor_approval.php?id=<?php echo (int)$vendors['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Name</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($vendors['Name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo remove_junk(ucwords($vendors['Address'])); ?>">
            </div>
            <div class="form-group">
                  <label for="company" class="control-label">Company</label>
                  <input type="text" class="form-control" name="company" value="<?php echo remove_junk(ucwords($vendors['Company'])); ?>">
            </div>
            <div class="form-group">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($vendors['Email'])); ?>">
            </div>
            <div class="form-group">
                  <label for="item_description" class="control-label">Item Description</label>
                  <input type="text" class="form-control" name="item_description" value="<?php echo remove_junk(ucwords($vendors['item_description'])); ?>">
            </div>
            <div class="form-group">
                  <label for="offer" class="control-label">Bidding Price</label>
                  <input type="text" class="form-control" name="offer" value="<?php echo remove_junk(ucwords($vendors['Offer'])); ?>">
            </div>
            <div class="form-group">
                  <label for="phone" class="control-label">Phone Number</label>
                  <input type="tel" class="form-control" name="phone" value="<?php echo remove_junk(ucwords($vendors['Phone'])); ?>">
            </div>
            <?php if($_SESSION['user_id'] == '1'){?>
            <div class="form-group">
              <label for="statuss">Status</label>
                <select class="form-control" name="statuss">
                  <option <?php if($vendors['statuss'] === '1') echo 'selected="selected"';?>value="1">Approved</option>
                  <option <?php if($vendors['statuss'] === '2') echo 'selected="selected"';?>value="2">Rejected</option>
                  <option <?php if($vendors['statuss'] === '0') echo 'selected="selected"';?>value="0">Pending</option>
                </select>
            </div>
            <?php }?>
            <div>
            <button type="submit" name="update-vendor" class="btn btn-info">Update</button></a>
            <a href="vendor copy.php" name="vendor_approval" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once('../layouts/footer.php'); ?>