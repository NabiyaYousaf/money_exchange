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
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<div id="layoutSidenav">
    <?php include('sidebar.php'); ?>

    <div id="layoutSidenav_content">

        <div class="container">
            <div class="row">
                <div class="col-md-12 my-2">
                    <h2 class="text-primary">View Transaction</h2>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered pt-2" id="table_design">
                        <thead>
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Receiver Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $select_query=mysqli_query($conn,"select * from transaction");
                            $run=mysqli_num_rows($select_query);
                            if($run > 0){
                                while($res=mysqli_fetch_assoc($select_query)){
                                    ?>
                            <tr>
                                <td><?php echo $res['transaction_id']; ?></td>
                                <td><?php echo $res['sender_name']; ?></td>
                                <td><?php echo $res['receiver_name']; ?></td>
                                <td><?php echo $res['receive_from_customer']; ?></td>
                                
                                <td>
                                    <a href="slip.php?id=<?php echo $res['id']; ?>"
                                        class="btn btn-sm btn-warning">Print</a>
                                        <a href="edit_transaction.php?id=<?php echo $res['id']; ?>"
                                        class="btn btn-sm btn-success">Edit</a>

                                    <input type="hidden" class="delete_id_value" value="<?php echo $res['id']; ?>">
                                    <a href="javascript:void(0)" type="button"
                                        class="delete_btn_ajax btn btn-danger btn-sm">Delete</a>

                                    
                                </td>
                            </tr>
                            <?php
                                }
                            }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       

        <?php include('footer.php'); ?>
    </div>
</div>
<!-- Javascript Code Start -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
       $(document).ready(function() {
    $('#table_design').DataTable();
})
//Delete Code
$(document).ready(function() {
    $(".delete_btn_ajax").click(function(e) {
        e.preventDefault();
        var deleteid = $(this).closest('tr').find('.delete_id_value').val();
        // alert(deleteid);
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Transaction!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data: {
                            "delete_btn_set": 1,
                            "deleteid": deleteid,
                        },
                        success: function(response) {
                            swal("Deleted!", "Your Transaction is Deleted",
                                "success", {
                                    button: "Ok!",
                                }).then((result) => {
                                location.reload();
                            });


                        }
                    });
                }
            });

    });
});

//Deactive Status
$(document).ready(function() {
    $(".deactive_btn_ajax").click(function(e) {
        e.preventDefault();
        var deactiveid = $(this).closest('tr').find('.deactive_id_value').val();
        alert(deactiveid);
        swal({
                title: "Are you sure?",
                text: "Your are Activating the status of news !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data: {
                            "blog_deactive_btn_set": 1,
                            "deactiveid": deactiveid,
                        },
                        success: function(response) {
                            swal("Activate!", "Status is Aactivated",
                                "success", {
                                    button: "Ok!",
                                }).then((result) => {
                                location.reload();
                            });


                        }
                    });
                }
            });

    });
});

//Activate Status

$(document).ready(function() {
    $(".active_btn_ajax").click(function(e) {
        e.preventDefault();
        var activeid = $(this).closest('tr').find('.deactive_id_value').val();
        alert(activeid);
        swal({
                title: "Are you sure?",
                text: "Your are Deactivating the status of news !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data: {
                            "blog_active_btn_set": 1,
                            "activeid": activeid,
                        },
                        success: function(response) {
                            swal("Deactivate!", "Status is Deactivated",
                                "success", {
                                    button: "Ok!",
                                }).then((result) => {
                                location.reload();
                            });


                        }
                    });
                }
            });

    });
});
</script>
<!-- Javascript Code End -->
<?php
include('links.php');
?>