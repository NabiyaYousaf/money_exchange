<?php
include('connection.php');
include('header.php');
$sql=mysqli_query($conn,"select * from profile");
$res=mysqli_fetch_assoc($sql);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div id="layoutSidenav">
    <?php include('sidebar.php'); ?>

    <div id="layoutSidenav_content">

        <div class="container">
            <div class="row">
                <h1 class="my-2 text-primary">Company Profile</h1>

                <div class="card mx-2">
                    <div class="card-body">
                        <form method="POST">

                            <div class="mb-3">
                                <label for="aname" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="<?php echo $res['company_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <textarea name="address" class="form-control" cols="30" rows="10">
                                    <?php echo $res['address']; ?>
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email"
                                value="<?php echo $res['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone No</label>
                                <input type="text" class="form-control" name="phone"
                                     value="<?php echo $res['phone']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="opass" class="form-label">Old Password</label>
                                <input type="text" class="form-control" name="opass"
                                    readonly value="<?php echo $res['new_pass']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="npass" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="npass" >
                            </div>


                            <button type="submit" class="btn btn-primary" name="submit">Change</button>
                        </form>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <?php include('footer.php'); ?>
</div>
</div>

<?php
include('links.php');
if(isset($_POST['submit'])){
    $company_name=$_POST['name'];
    $addres=$_POST['address'];
    $email=$_POST['email'];
    $new_pass=$_POST['npass'];
    $phone=$_POST['phone'];

    $select=mysqli_query($conn,"UPDATE `profile` SET `company_name`='$company_name',`address`='$addres',`phone`='$phone',`new_pass`='$new_pass',`email`='$email' ");
    if($select){
        echo "<script>alert('Update')</script>";
    }else{
        echo "<script>alert('Not Update')</script>";
    }
}
?>