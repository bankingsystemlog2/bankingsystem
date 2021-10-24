<?php
  $page_title = 'Application Form';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  $groups = find_all('vendors');
  $users_id = current_user()['id'];
?>
<?php
  if(isset($_POST['applicationform'])){

   $req_fields = array('name','address','company','email','years','offer','phone');
   validate_fields($req_fields);

   if(empty($errors)){
       $name   = remove_junk($db->escape($_POST['name']));
       $address   = remove_junk($db->escape($_POST['address']));
       $company   = remove_junk($db->escape($_POST['company']));
       $email   = remove_junk($db->escape($_POST['email']));
       $years   = remove_junk($db->escape($_POST['years']));
       $offer   = remove_junk($db->escape($_POST['offer']));
       $phone   = remove_junk($db->escape($_POST['phone'])); 
        $query = "INSERT INTO vendors (";
        $query .="Name,Address,Company,Email,years,Offer,Phone,users_id";
        $query .=") VALUES (";
        $query .="'{$name}', '{$address}', '{$company}', '{$email}', '{$years}', '{$offer}', '{$phone}', '{$users_id}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Application form sent! ");
          redirect('applicationform.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry Application form failed to send!');
          redirect('applicationform.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('applicationform.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add Application</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="applicationform.php" autocomplete="off">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="address">
            </div>
            <div class="form-group">
                <label for="company">Company Name</label>
                <input type="text" class="form-control" name ="company"  placeholder="company">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name ="email"  placeholder="email">
            </div>
            <div class="form-group">
                <label for="years">Number of year in business</label>
                <input type="text" class="form-control" name ="years"  placeholder="years">
            </div>
            <div class="form-group">
                <label for="offer">Offer</label>
                <input type="text" class="form-control" name ="offer"  placeholder="offer">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name ="phone"  placeholder="phone">
            </div>
            <!-- <div class="form-group">
              <label for="level">User Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div> -->
            <div class="form-group clearfix">
              <button type="submit" name="applicationform" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
