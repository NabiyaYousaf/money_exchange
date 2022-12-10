<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user'])){
    ?>
<script>
window.location = "<?php echo $app_url .'login.php' ?>";
</script>
<?php
     }
include('header.php');
$update_id=$_GET['id'];
$sql="select * from transaction where id='$update_id'";
$run=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($run);
$transaction_id=$res['transaction_id'];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
.hide {
    display: none;
}
</style>

<div id="layoutSidenav" class="d-print-none">
    <?php include('sidebar.php'); ?>

    <div id="layoutSidenav_content">

        <div class="container">
            <div class="row">
                <h1 class="my-2 text-primary d-print-none">Edit Transaction Information</h1>

                <div class="card mx-4">
                    <div class="card-body d-print-none">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Name <span class="text-danger">**required</span> </label>
                                    <input type="text" class="form-control" name="sname" id="sname" required value='<?php echo $res['sender_name']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Address <span class="text-danger">**required</span></label>
                                    <textarea name="saddress" id="saddress" class="form-control" required><?php echo $res['sender_address']; ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Phone No <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="phone" id="sphone" required value='<?php echo $res['sender_phone']; ?>'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Date Of Birth <span class="text-danger">**required</span></label>
                                    <input type="date" class="form-control" name="dob" id="dob" value='<?php echo $res['sender_dob']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender ID NO</label>
                                    <input type="number" class="form-control" name="sid_no" id="sid_no" value='<?php echo $res['sender_id_no']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Transaction Reason <span class="text-danger">**required</span></label>
                                    <select class="form-select" id="transaction_reason" required >
                                        <option value='<?php echo $res['transaction_reason']; ?>'><?php echo $res['transaction_reason']; ?></option>
                                        <option value="Family Support">Family Support</option>
                                        <option value="Friend">Friend</option>
                                        <option value="Personal Need & Expense">Personal Need & Expense</option>
                                        <option value="Gift">Gift</option>
                                        <option value="Loan">Loan</option>
                                        <option value="Barrow">Barrow</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Source Of Fund <span class="text-danger">**required</span></label>
                                    <select class="form-select" id="source" required>
                                    <option value='<?php echo $res['source_of_fund']; ?>'><?php echo $res['source_of_fund']; ?></option>
                                        <option value="Saving">Saving</option>
                                        <option value="Salary">Salary</option>
                                        <option value="Sale Property">Sale Property</option>
                                        <option value="Loan">Loan</option>
                                        <option value="Barrow">Barrow</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Occupation <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="occupation" id="occupation" required value='<?php echo $res['occupation']; ?>'>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Receiver Name <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="receiver_name" id="receiver_name"
                                        required value='<?php echo $res['receiver_name']; ?>'>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Contact No <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="contact" id="contact" required value='<?php echo $res['contact']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Payment Method<span class="text-danger">**required</span></label>
                                    <select class="form-select" id="payment_method" name="spayment_method" required>
                                        <option value='<?php echo $res['payment_method']; ?>'><?php echo $res['payment_method']; ?></option>
                                        <option value="Bank">Bank</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="row" id="bank_detail">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bank Name</label>
                                    <input type="text" class="form-control" name="sbank_name" id="bank_name" value='<?php echo $res['bank_name']; ?>'>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bank IBAN No</label>
                                    <input type="text" class="form-control" name="siban" id="iban" value='<?php echo $res['bank_iban_no']; ?>'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Enter Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" required value='<?php echo $res['amount']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Currency<span class="text-danger"> **required</span></label>
                                    <select class="form-select" id="currency" required>
                                        <option value='<?php echo $res['currency']; ?>'><?php echo $res['currency']; ?></option>
                                        <option value="PKR">PKR</option>
                                        <option value="GBP">POUND</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Exchange Rate<span class="text-danger"> **required</span></label>
                                    <input type="text" class="form-control" name="exchange" id="exchange" required value='<?php echo $res['exchange_rate']; ?>'>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Total Amount Received</label>
                                    <input type="text" class="form-control" name="amount_received" id="amount_received" value='<?php echo $res['amount_received']; ?>'>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Add Charges</label>
                                    <input type="text" class="form-control" name="charges" id="charges" value='<?php echo $res['charges']; ?>' required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Total Receivable from Customer</label>
                                    <input type="text" class="form-control" name="recv_from_customer"
                                        id="recv_from_customer" value='<?php echo $res['receive_from_customer']; ?>'>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" id="next">Next</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- Modal-->
                    <!-- Edit Modal Start -->
                    <div class="modal fade d-print-none" id="editModal" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Transaction Detail: </h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button><br>

                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sender Name</label>
                                                <input type="text" class="form-control name" name="sname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sender Address</label>
                                                <textarea name="saddress" class="form-control address" required></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sender Phone No</label>
                                                <input type="text" class="form-control phone" name="phone" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Date Of Birth</label>
                                                <input type="date" class="form-control sdob" name="sdob" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sender ID NO</label>
                                                <input type="number" class="form-control id_no" name="id_no">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Transaction Reason</label>
                                                <select class="form-select stransaction_reason"
                                                    name="stransaction_reason" required>
                                                    <option selected>Select Reason</option>
                                                    <option value="Family Support">Family Support</option>
                                                    <option value="Friend">Friend</option>
                                                    <option value="Personal Need & Expense">Personal Need & Expense
                                                    </option>
                                                    <option value="Gift">Gift</option>
                                                    <option value="Loan">Loan</option>
                                                    <option value="Barrow">Barrow</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>



                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Source Of Fund</label>
                                                <select class="form-select ssource" name="ssource" required>
                                                    <option selected>Select Source</option>
                                                    <option value="Saving">Saving</option>
                                                    <option value="Salary">Salary</option>
                                                    <option value="Sale Property">Sale Property</option>
                                                    <option value="Loan">Loan</option>
                                                    <option value="Barrow">Barrow</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Occupation</label>
                                                <input type="text" class="form-control ooccupation" name="ooccupation" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Receiver Name</label>
                                                <input type="text" class="form-control sreceiver_name"
                                                    name="sreceiver_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Contact No</label>
                                                <input type="text" class="form-control scontact" name="scontact" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Payment Method</label>
                                                <select class="form-select spayment_method" name="spayment_method" required>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div><br><br>
                                        <div class="row hide" id="bank_detail">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Bank Name</label>
                                                <input type="text" class="form-control sbank_name" name="sbank_name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Bank IBAN No</label>
                                                <input type="text" class="form-control siban" name="siban">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Enter Amount</label>
                                                <input type="text" class="form-control samount" name="samount" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Currency</label>
                                                <select class="form-select scurrency" name="scurrency">
                                                    <option value="PKR">PKR</option>
                                                    <option value="GBP">POUND</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Exchange Rate</label>
                                                <input type="text" class="form-control sexchange" name="sexchange" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Total Amount Received</label>
                                                <input type="text" class="form-control samount_received"
                                                    name="samount_received">
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Add Charges</label>
                                                <input type="text" class="form-control scharges" name="scharges" required>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="form-label fw-bold">Total Receivable from Customer</label>
                                                <input type="text" class="form-control recv_from_customer"
                                                    name="recv_from_customer">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <!-- <div class="col-md-3">
                                                <button class="btn btn-primary" id="print"
                                                    onclick="window.print()">Print</button>

                                            </div> -->

                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success" id="save" name="save">Save
                                                    Transaction</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                    aria-label="Close">Close</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- Modal-->
                    </div>




                </div>

            </div>
        </div>

        <script>
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                if (this.value == 'Cash') {
                    $("#bank_detail").hide();
                } else {
                    $("#bank_detail").show();
                }
            });

            //total
            $('#amount_received').on('focus', function() {
                let currency_check = $('#currency').val();
                let rate_exchange = parseFloat($('#exchange').val());
                let amount = parseFloat($('#amount').val());
                let total = 0;

                if (currency_check == 'PKR') {
                    total = parseFloat(amount);
                    gtotal = parseFloat(amount / rate_exchange);
                } else {
                    total = parseFloat(amount * rate_exchange);
                    gtotal = parseFloat(amount);
                }
                $('#amount_received').val(total);
                $('#recv_from_customer').val(gtotal);


            });

            $('#charges').on('change', function() {
                let currency_check = $('#currency').val();
                let rate_exchange = parseFloat($('#exchange').val());
                let amount = parseFloat($('#amount').val());
                let total = 0;

                if (currency_check == 'PKR') {
                    total = parseFloat(amount / rate_exchange);
                } else {
                    total = parseFloat(amount);
                }
                let charge = parseFloat($('#charges').val());
                let grandtotal = 0;

                grandtotal = parseFloat(total + charge);
                $('#recv_from_customer').val(grandtotal);
            });


            //form

            $("#next").on("click", function(e) {
                e.preventDefault();
                let name = $('#sname').val();
                let address = $('#saddress').val();
                let sender_phone = $('#sphone').val();
                let sender_dob = $('#dob').val();
                let sender_IDNO = $('#sid_no').val();
                let sender_transaction_reason = $('#transaction_reason').val();
                let sender_source_fund = $('#source').val();
                let sender_occupation = $('#occupation').val();
                let receiver_name = $('#receiver_name').val();
                let contact = $('#contact').val();
                let payment_method = $('#payment_method').val();
                let bank_name = $('#bank_name').val();
                let bank_IBAN_NO = $('#iban').val();
                let amount = $('#amount').val();
                let currency = $('#currency').val();
                let amount_received = $('#amount_received').val();
                let charges = $('#charges').val();
                let exchange_rate = $('#exchange').val();
                let total_receive = $('#recv_from_customer').val();
                $('#editModal').modal('show');
                $('.tbl').removeClass('hide');


                $('.name').val(name);
                $('.address').val(address);
                $('.phone').val(sender_phone);
                $('.sdob').val(sender_dob);
                $('.id_no').val(sender_IDNO);
                $('.stransaction_reason').val(sender_transaction_reason);
                $('.ssource').val(sender_source_fund);
                $('.ooccupation').val(sender_occupation);
                $('.scontact').val(contact);
                $('.spayment_method').val(payment_method);
                $('.sbank_name').val(bank_name);
                $('.siban').val(bank_IBAN_NO);
                $('.samount').val(amount);
                $('.scurrency').val(currency);
                $('.samount_received').val(amount_received);
                $('.scharges').val(charges);
                $('.sreceiver_name').val(receiver_name);
                $('.sexchange').val(exchange_rate);
                $('.recv_from_customer').val(total_receive);



            });

        });
        </script>

        <?php include('footer.php'); ?>
    </div>
</div>














<?php
include('links.php');

if(isset($_POST['save']))
{
    
       $sender_name=$_POST['sname'];
       $sender_address=$_POST['saddress'];
       $sender_phone=$_POST['phone'];
       $sender_dob=$_POST['sdob'];
       $sender_id_no=$_POST['id_no'];
       $sender_transaction_reason=$_POST['stransaction_reason'];
       $sender_source_fund=$_POST['ssource'];
       $sender_occupation=$_POST['ooccupation'];
       $receiver_contact=$_POST['scontact'];
       $payment_method=$_POST['spayment_method'];
    //    echo $payment_method;
       if($payment_method == 'Cash'){
        $bank_name= '';
        $bank_IBAN='';
       }else{
       $bank_name=$_POST['sbank_name'];
       $bank_IBAN=$_POST['siban'];
       }
       $amount=$_POST['samount'];
       $currency=$_POST['scurrency'];
       $receiver_name=$_POST['sreceiver_name'];
       $charges=$_POST['scharges'];
       $exchange_rate=$_POST['sexchange'];

       if($currency == 'GBP'){
        $amount_received=$amount * $exchange_rate;
       }else{
        $amount_rec=$amount / $exchange_rate;
        $amount_received=round($amount_rec,2);
       }
       if($currency == 'GBP'){
        $receive_amount_from_customer=$amount +$charges;
       }else{
        $receive_amount_from_customer=$amount_received + $charges;
       }
      

       $sql_update="UPDATE `transaction` SET `sender_name`='$sender_name',`sender_address`='$sender_address',`sender_phone`='$sender_phone',`sender_dob`='$sender_dob',`sender_id_no`='$sender_id_no',`transaction_reason`='$sender_transaction_reason',`source_of_fund`='$sender_source_fund',`occupation`='$sender_occupation',`receiver_name`='$receiver_name',`contact`='[$receiver_contact',`payment_method`='$payment_method',`bank_name`='$bank_name',`bank_iban_no`='$bank_IBAN',`amount`='$amount',`exchange_rate`='$exchange_rate',`currency`='$currency',`amount_received`='$amount_received',`charges`='$charges',`receive_from_customer`='$receive_amount_from_customer',`date`=NOW(),`transaction_id`='$transaction_id',`tdate`=NOW() WHERE id='$update_id'";

       $run=mysqli_query($conn,$sql_update);
       if($run){
            ?>
            <<script>
                window.location = "<?php echo $app_url.'transaction.php' ?>";
           </script>
            <?php
       }else{
        echo "<script>alert(' No Update')</script>";
       }

}
?>
