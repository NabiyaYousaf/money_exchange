<?php
session_start();
include('connection.php');
include('includes/header.php');
?>
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" type="text"/>
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Password" />
                                                <label>Password</label>
                                            </div>
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                                                    </div>   
                                                </div>   
                                            </div>
                                            
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php
include('includes/footer.php'); 

if(isset($_POST['login'])){
    $name=$_POST['username'];
    $password=$_POST['password'];

    $sql=mysqli_query($conn,"select * from login where username='$name'");
    $count=mysqli_num_rows($sql);
    
    if($count == 1){
        $res=mysqli_fetch_assoc($sql);
        $db_pass=$res['password'];
        if($password == $db_pass){
            $_SESSION['user']=$_POST['username'];
            ?>
            <script>
                window.location = "<?php echo $app_url.'index.php' ?>";
           </script>
            <?php
        }else{
            echo "<script> alert('Wrong Password') </script>";
        }
    }else{
        echo "<script> alert('Please Enter Approved Email Address') <script>";
    }
}
?>