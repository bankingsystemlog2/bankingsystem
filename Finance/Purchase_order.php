<?php
  $page_title = 'List of Loans Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php
$id=$_GET['id'];
$Table="collection";
 $row = Collection_Savings();
?>

<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="libs/css/Purchaseorder_style.css">

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="AccountsPayables.php" class="breadcrumbs__item">Accounts Payables</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Purchase Order</a>
</nav>
<!-- /Breadcrumb -->


    <div class="my-5 page1" size="A4">
        <div class="p-5">
            <section class="top-content12 bb1 d-flex justify-content-between">
                <div class="logo1">
                    <img src="logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left1">
                    <div class="graphic-path">
                        <p>Purchase Order</p>
                    </div>
                    <div class="position-relative">
                        <p>Purchase order No. <span><?php echo $id; ?></span></p>
                    </div>
                </div>
            </section>

            <section class="store-user1 mt-5">
                <div class="col-10">
                    <div class="row bb1 pb-3">
                        <div class="col-7">
                            <p>Company Name</p>
                            <h2>AABank™</h2>
                            <p class="address"> Quirino Highway, Novaliches, <br> Millionaires MA 2351, <br>Quezon City </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                        <div class="col-5">
                            <p>Supplier</p>
                            <h2>Sabur Ali</h2>
                            <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351, <br>Vestavia Hills AL </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                    </div>
                    <div class="row extra-info1 pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Cash</span></p>
                            <p>Order Number: <span>#868</span></p>
                        </div>
                        <div class="col-5">
                            <p>Deliver Date: <span>10-04.2021</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover b-po-table">
                    <thead class="header-po">
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="ss-po">
                            <td>
                                <div class="media-po">
                                    <img class="mr-3 img-fluid" src="mobile.jpg" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title">Media heading</p>
                                        Cras sit amet nibh libero, in gravida nulla.
                                    </div>
                                </div>
                            </td>
                            <td>₱200</td>
                            <td>1</td>
                            <td>₱200</td>
                        </tr>
                        <tr class="ss-po">
                            <td>
                                <div class="media-po">
                                    <img class="mr-3 img-fluid" src="mobile-2.jpg" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title">Media heading</p>
                                        Cras sit amet nibh libero, in gravida nulla.
                                    </div>
                                </div>
                            </td>
                            <td>₱300</td>
                            <td>2</td>
                            <td>₱600</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="balance-info1">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In delectus, adipisci vero est dolore praesentium.</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>₱800</td>
                            </tr>
                            <tr>
                                <td>Tax:</td>
                                <td>₱15</td>
                            </tr>
                            <tr>
                                <td>Deliver:</td>
                                <td>₱10</td>
                            </tr>
                            <tfoot class="ss-po-footer">
                                <tr>
                                    <td>Total:</td>
                                    <td>₱825</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Director Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="cart.jpg" class="img-fluid cart-bg1" alt="">
              <hr>
            <footer class="footer-po_1">
                <p class="m-0 text-center">
                    Download This Purchase Order Online At - <a href="#!"> AABankTransAsia.com/#868 </a>
                </p>
                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>0123456789</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>AABankTransAsia@mail.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/James.7264</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-youtube"></i>
                        <span>/Ian11r</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-github"></i>
                        <span>/core.com</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>



    <?php include_once('layouts/footer.php'); ?>
