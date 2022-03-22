<?php
  $page_title = 'Fleet Management';
  require_once('../includes/log2load.php');
  $users_id = current_user()['id'];
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $a_cars = find_all_cars();
 $a_vans = find_all_vans();
 $a_armors = find_all_armor();
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
          <span>fleet Management</span>
       </strong>
      </div>
     <div class="panel-body">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {font-family: Arial;}

                /* Style the tab */
                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }
            </style>
        </head>
        <body>
        <p>Click on the buttons inside the tabbed menu:</p>
        <!-- Vehicle Categories -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Car')" id="defaultOpen">Car</button>
            <button class="tablinks" onclick="openCity(event, 'Van')">Van</button>
            <button class="tablinks" onclick="openCity(event, 'ArmorVehicle')">Armor Vehicle</button>
        </div>
        <!-- Car Tab -->
        <div id="Car" class="tabcontent" >
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center" style="width: 5%;">Model</th>
                    <th class="text-center" style="width: 10%;">Seating Capacity</th>
                    <th class="text-center" style="width: 10%;">Type</th>
                    <th class="text-center" style="width: 100px;">Availability</th>
                    <th class="text-center" style="width: 100px;">Condition</th>
                  </tr>
                </thead>
                <?php foreach($a_cars as $a_car):?>
                  <tr>
                   <td class="text-center"><?php echo count_id();?></td>
                   <td class="text-center"><?php echo ($a_car['v_model'])?></td>
                   <td class="text-center"><?php echo remove_junk(ucwords($a_car['v_capacity']))?></td>
                   <td class="text-center">
                   <?php if($a_car['v_category'] === '1'): ?>
                    <?php echo "Car"; ?>
                    <?php elseif($a_car['v_category'] === '2'): ?>
                    <?php echo "Van"; ?>
                  <?php else: ?>
                    <?php echo "Armored Vehicle"; ?>
                  <?php endif;?>
                   </td>
                   <td class="text-center">
                   <?php if($a_car['v_avail'] === '1'): ?>
                    <span class="label label-success"><?php echo "Available"; ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo "Unavailable"; ?></span>
                  <?php endif;?>
                   </td>
                   <td><?php echo remove_junk(ucwords($a_car['v_condition']))?></td>
                   <td class="text-center">
                     <div class="btn-group">
                        <a href="#?id=<?php echo (int)$a_car['fleetid'];?>" id="button-popup" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal" title="View">
                          <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="edit_fleet.php?id=<?php echo (int)$a_car['fleetid'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <i class="glyphicon glyphicon-pencil"></i>
                       </a>
                        <a href="fleet_delete.php?id=<?php echo (int)$a_car['fleetid'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <i class="glyphicon glyphicon-remove"></i>
                        </a>
                        </div>
                        
                   </td>
                  </tr>
                <?php endforeach;?>
               </tbody>
             </table>
        </div>
        <!-- Car tab end-->
        <!-- Van tab-->
        <div id="Van" class="tabcontent">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center" style="width: 5%;">Model</th>
                    <th class="text-center" style="width: 10%;">Seating Capacity</th>
                    <th class="text-center" style="width: 10%;">Type</th>
                    <th class="text-center" style="width: 100px;">Availability</th>
                    <th class="text-center" style="width: 100px;">Condition</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($a_vans as $a_van):?>
                  <tr>
                   <td class="text-center"><?php echo count_id();?></td>
                   <td class="text-center"><?php echo ($a_van['v_model'])?></td>
                   <td class="text-center"><?php echo remove_junk(ucwords($a_van['v_capacity']))?></td>
                   <td class="text-center">
                   <?php if($a_van['v_category'] === '1'): ?>
                    <?php echo "Car"; ?>
                    <?php elseif($a_van['v_category'] === '2'): ?>
                    <?php echo "Van"; ?>
                  <?php else: ?>
                    <?php echo "Armored Vehicle"; ?>
                  <?php endif;?>
                   </td>
                   <td class="text-center">
                   <?php if($a_van['v_avail'] === '1'): ?>
                    <span class="label label-success"><?php echo "Available"; ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo "Unavailable"; ?></span>
                  <?php endif;?>
                   </td>
                   <td><?php echo remove_junk(ucwords($a_van['v_condition']))?></td>
                   <td class="text-center">
                     <div class="btn-group">
                        <a href="#?id=<?php echo (int)$a_van['fleetid'];?>" id="button-popup" class="btn btn-xs btn-success" data-toggle="tooltip" title="View">
                          <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="edit_fleet.php?id=<?php echo (int)$a_van['fleetid'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <i class="glyphicon glyphicon-pencil"></i>
                       </a>
                        <a href="fleet_delete.php?id=<?php echo (int)$a_van['fleetid'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <i class="glyphicon glyphicon-remove"></i>
                        </a>
                        </div>
                   </td>
                  </tr>
                 <?php endforeach;?>
           </tbody>
         </table>
        </div>
        <!-- ArmorVehicle tab-->
        <div id="ArmorVehicle" class="tabcontent">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>                
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center" style="width: 5%;">Model</th>
                    <th class="text-center" style="width: 10%;">Seating Capacity</th>
                    <th class="text-center" style="width: 10%;">Type</th>
                    <th class="text-center" style="width: 100px;">Availability</th>
                    <th class="text-center" style="width: 100px;">Condition</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($a_armors as $a_armor):?>
                  <tr>
                   <td class="text-center"><?php echo count_id();?></td>
                   <td class="text-center"><?php echo ($a_armor['v_model'])?></td>
                   <td class="text-center"><?php echo remove_junk(ucwords($a_armor['v_capacity']))?></td>
                   <td class="text-center">
                   <?php if($a_armor['v_category'] === '1'): ?>
                    <?php echo "Car"; ?>
                    <?php elseif($a_armor['v_category'] === '2'): ?>
                    <?php echo "Van"; ?>
                  <?php else: ?>
                    <?php echo "Armored Vehicle"; ?>
                  <?php endif;?>
                   </td>
                   <td class="text-center">
                   <?php if($a_armor['v_avail'] === '1'): ?>
                    <span class="label label-success"><?php echo "Available"; ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo "Unavailable"; ?></span>
                  <?php endif;?>
                   </td>
                   <td><?php echo remove_junk(ucwords($a_armor['v_condition']))?></td>
                   <td class="text-center">
                     <div class="btn-group">
                        <a href="#?id=<?php echo (int)$a_armor['fleetid'];?>" id="button-popup" class="btn btn-xs btn-success" data-toggle="tooltip" title="View">
                          <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="edit_fleet.php?id=<?php echo (int)$a_armor['fleetid'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <i class="glyphicon glyphicon-pencil"></i>
                       </a>
                        <a href="fleet_delete.php?id=<?php echo (int)$a_armor['fleetid'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <i class="glyphicon glyphicon-remove"></i>
                        </a>
                        </div>
                   </td>
                  </tr>
                 <?php endforeach;?>
           </tbody>
         </table>
        </div>
        <!-- ArmorVehicle tab end-->
        <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
          
        }
        
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script>
            <!-- Modal-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="fleet" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
             <!--  Modal End-->
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('../layouts/footer.php'); ?>

