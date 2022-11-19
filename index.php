<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user'])){
    ?>
<script>
window.location = "<?php echo $app_url_two .'login.php' ?>";
</script>
<?php
     }
include('header.php');
?>
  <div id="layoutSidenav">
    <?php include('sidebar.php'); ?>
    
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Today's Transaction</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php

                                                $today = date('Y-m-d');
                                                $sql="SELECT * FROM `transaction` where tdate='$today'";
                                                $run=mysqli_query($conn,$sql);
                                                $transactions=0;
                                                while($res=mysqli_fetch_assoc($run)){
                                                    $transactions=$transactions+1;
                                                }

                                        ?>
                                      <h3><?php echo $transactions;  ?></h3>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Amount Received</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php

                                                $today = date('Y-m-d');
                                                $sql="SELECT * FROM `transaction` where tdate='$today'";
                                                $run=mysqli_query($conn,$sql);
                                                $amount=0;
                                                while($res=mysqli_fetch_assoc($run)){
                                                    $amount=$amount+$res['receive_from_customer'];
                                                }

                                        ?>
                                      <h3>GBP:<?php echo $amount;  ?></h3>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('footer.php'); ?>
            </div>
  </div>
<?php
include('links.php');
?>