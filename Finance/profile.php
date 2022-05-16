<?php
  $page_title = 'My profile';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('home.php',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">

   <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4 cardforprofile">

        <div class="imageforprofile d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-light btnforprofile"> <img src="uploads/users/<?php echo $user_p['image'];?>" height="95" width="100" alt="Avatar"/></button>
          <span class="nameforprofile mt-3"><?php echo first_character($user_p['name']); ?></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
              <span class="idd1 iddforprofile"><?php echo first_character($user_p['Position']); ?></span>
              </div>
              <?php if( $user_p['id'] === $user['id']):?>
              <div class=" d-flex mt-2"> <a href="edit_account.php" class="btn btn-success btn1forprofile" >Edit Profile</a></div>
               <?php endif;?>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="followforprofile">Your Links</span> </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center iconsforprofile"> <span><i class="bi bi-twitter"></i></span> <span><i class="bi bi-facebook"></i></span> <span><i class="bi bi-messenger"></i></span> <span><i class="bi bi-google"></i></span> </div>
            <div class=" px-2 rounded mt-4 date dateforprofile"> <span class="joinforpofile">Last Login: <?php echo read_date($user_p['last_login'])?></span> </div>
        </div>
    </div>
</div>

</div>
<?php include_once('layouts/footer.php'); ?>
