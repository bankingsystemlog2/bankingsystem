<?php
  $page_title = 'Edit Submittion';
  require_once('../includes/log2load.php');
   page_require_level(4);
   $vendors = find_vendor_by_id('vendors',current_user('id'));
?>
<?php
 //update user other info
 if(isset($_POST['update-vendor'])) {
    $req_fields = array('name','address','company','email','years','offer','phone');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$vendors['id'];
             $name   = remove_junk($db->escape($_POST['name']));
             $address   = remove_junk($db->escape($_POST['address']));
             $company   = remove_junk($db->escape($_POST['company']));
             $email   = remove_junk($db->escape($_POST['email']));
             $years   = remove_junk($db->escape($_POST['years']));
             $offer   = remove_junk($db->escape($_POST['offer']));
             $phone   = remove_junk($db->escape($_POST['phone'])); 
             $category   = remove_junk($db->escape($_POST['category']));
             $sql = "UPDATE vendors SET name ='{$name}', address ='{$address}', company ='{$company}', email ='{$email}', years ='{$years}', offer ='{$offer}', phone ='{$phone}', category ='{$category}'  WHERE id ='{$id}'";
             $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Application updated ");
            redirect('applicationform.php', false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('applicationform.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('applicationform.php',false);
    }
  }
?>

<?php include_once('../layouts/log2header.php'); ?>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Edit My Application Form</span>
      </div>
      <div class="panel-body">
          <form method="post" action="applicant_edit.php?id=<?php echo (int)$vendors['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Name</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($vendors['Name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo remove_junk(ucwords($vendors['Address'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Company</label>
                  <input type="text" class="form-control" name="company" value="<?php echo remove_junk(ucwords($vendors['Company'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($vendors['Email'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Number of year in business</label>
                  <input type="text" class="form-control" name="years" value="<?php echo remove_junk(ucwords($vendors['years'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Offer</label>
                  <input type="text" class="form-control" name="offer" value="<?php echo remove_junk(ucwords($vendors['Offer'])); ?>">
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo remove_junk(ucwords($vendors['Phone'])); ?>">
            </div>
            <div class="form-group">
                  <label for="category" class="control-label">Type of Application</label>
            <select class="form-control" name="category">
                  <option <?php if($vendors['category'] === '1') echo 'selected="selected"';?>value="1">Contractor</option>
                  <option <?php if($vendors['category'] === '0') echo 'selected="selected"';?>value="0">Supplier</option>
                </select>
           </td>
            <div class="form-group clearfix">
                    <button type="submit" name="update-vendor" class="btn btn-info">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include_once('../layouts/footer.php'); ?>
