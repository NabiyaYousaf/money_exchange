<?php
include('connection.php');
if(!isset($_SESSION['user'])){
    ?>
<script>
window.location = "<?php echo $app_url_two .'login.php' ?>";
</script>
<?php
     }
if(isset($_POST['delete_btn_set']))
{
    $d_id=$_POST['deleteid'];
    $sql="delete from transaction where id='$d_id'";
    mysqli_query($conn,$sql);
}
?>