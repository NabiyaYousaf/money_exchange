<?php
session_start();
include('connection.php');
if(!isset($_SESSION['email'])){
   
    ?>
<script>
window.location = "<?php echo $app_url_two .'login.php' ?>";
</script>
<?php
     }
include('header.php');
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
                <h1 class="my-2 text-primary d-print-none">Add Transaction Information</h1>

                <div class="card mx-4">
                    <div class="card-body d-print-none">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Name <span class="text-danger">**required</span> </label>
                                    <input type="text" class="form-control" name="sname" id="sname" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Address <span class="text-danger">**required</span></label>
                                    <textarea name="saddress" id="saddress" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender Phone No <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="phone" id="sphone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Date Of Birth <span class="text-danger">**required</span></label>
                                    <input type="date" class="form-control" name="dob" id="dob">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sender ID NO</label>
                                    <input type="number" class="form-control" name="sid_no" id="sid_no">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Transaction Reason <span class="text-danger">**required</span></label>
                                    <select class="form-select" id="transaction_reason" required>
                                        <option selected>Select Reason</option>
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
                                        <option selected>Select Source</option>
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
                                    <input type="text" class="form-control" name="occupation" id="occupation" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Receiver Name <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="receiver_name" id="receiver_name"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Contact No <span class="text-danger">**required</span></label>
                                    <input type="text" class="form-control" name="contact" id="contact" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Payment Method<span class="text-danger">**required</span></label>
                                    <select class="form-select" id="payment_method" name="spayment_method" required>
                                        <option value="Bank">Bank</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="row" id="bank_detail">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bank Name</label>
                                    <input type="text" class="form-control" name="sbank_name" id="bank_name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bank IBAN No</label>
                                    <input type="text" class="form-control" name="siban" id="iban">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Enter Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Currency<span class="text-danger"> **required</span></label>
                                    <select class="form-select" id="currency" required>
                                        <option value="PKR">PKR</option>
                                        <option value="GBP">POUND</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Exchange Rate<span class="text-danger"> **required</span></label>
                                    <input type="text" class="form-control" name="exchange" id="exchange" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Total Amount Received</label>
                                    <input type="text" class="form-control" name="amount_received" id="amount_received">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Add Charges</label>
                                    <input type="text" class="form-control" name="charges" id="charges" value=0 required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Total Receivable from Customer</label>
                                    <input type="text" class="form-control" name="recv_from_customer"
                                        id="recv_from_customer">
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
            $('#exchange').on('change', function() {
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
    $select="select * from transaction";
    $run=mysqli_query($conn,$select);
    while($res=mysqli_fetch_assoc($run)){
    $transaction=$res['transaction_id'];
    $tbl_id=$res['id'];
    }
       $transaction_id=$transaction+1;
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
      

       

       $sql="INSERT INTO `transaction`( `sender_name`, `sender_address`, `sender_phone`, `sender_dob`, `sender_id_no`, `transaction_reason`, `source_of_fund`, `occupation`, `receiver_name`, `contact`, `payment_method`, `bank_name`, `bank_iban_no`, `amount`,`exchange_rate`,`currency`, `amount_received`, `charges`, `receive_from_customer`, `date`, `transaction_id`,`tdate`) VALUES ('$sender_name','$sender_address','$sender_phone','$sender_dob','$sender_id_no','$sender_transaction_reason','$sender_source_fund','$sender_occupation','$receiver_name','$receiver_contact','$payment_method','$bank_name','$bank_IBAN','$amount','$exchange_rate','$currency','$amount_received','$charges','$receive_amount_from_customer',NOW(),'$transaction_id',NOW())";
       $run=mysqli_query($conn,$sql);
       if($run){
            ?>
            <script>
                window.print();
                </script>
            <?php
       }else{
        echo "<script>alert(' No send')</script>";
       }

}
?>
<!-- Print Table -->

<div class="container">
    <h2 style="margin:1rem 0;">Agent Copy</h2>
    <div class="row">
        <div class="col-md-10">



            <table style="width:70rem;border:1px solid black;">

                <tr>
                    <td style="border:1px solid black; ">

                        <div class="d-flex">
                            <div style="width:15rem;"><b>Malik Money Transfer</b></div>
                            <div><b>Telephone</b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:15rem;">
                                177 Plashet Rd,<br>
                                London E13 oQZ</div>
                            <div> 020 8127 1220</div>
                        </div>
                    </td>

                    <td style="border:1px solid black;">
                        <div class="d-flex" style="paddin-bottom:1rem;">
                            <?php
                                $select_id="select * from transaction";
                                $run=mysqli_query($conn,$select_id);
                                while($res=mysqli_fetch_assoc($run)){
                                $transaction_id=$res['transaction_id'];
                                $s_address=$res['sender_address'];
                                $s_name=$res['sender_name'];
                                $s_phone=$res['sender_phone'];
                                $s_trsansaction_reason=$res['transaction_reason'];
                                $s_source_of_fund=$res['source_of_fund'];
                                $s_occupation=$res['occupation'];
                                $recv_name=$res['receiver_name'];
                                $curr=$res['currency'];
                                $amount_d=$res['amount'];
                                $rate=$res['exchange_rate'];
                                $rcv_contact=$res['contact'];
                                $rcv_from_customer=$res['receive_from_customer'];
                                }
                        ?>
                            <div style="width:10rem;">ORDER NO </div>
                            <div><b>PK <?php echo $transaction_id; ?> </b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:10rem;">Date & Time</div>
                            <div><b>
                                    <script>
                                    var today = new Date();
                                    var date = today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today
                                        .getDate();
                                    document.write(date);
                                    </script>
                                </b></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div style="width:10rem;"><b>Sender Name</b></div>
                            <div><b>Telephone</b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:10rem;"><?php echo $s_name; ?></div>
                            <div> <?php echo $s_phone; ?></div>
                        </div>
                    </td>
                    <td style="border:1px solid black;">
                        <div class="d-flex">
                            <div style="width:10rem;">Transaction Reason</div>
                            <div><b><?php echo $s_trsansaction_reason; ?></b></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black;">
                        <div class="row d-flex">
                            <div class="col-md-12"><b>Occupation</b><br>
                                <?php echo $s_occupation; ?>
                            </div>
                            <div>
                    </td>
                    <td style="border:1px solid black;">
                        <div>Amount To be Delivered</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b><?php echo $curr; ?></b></div>
                            <div style="width:10rem;">
                                <?php echo $amount_d; ?>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>
                    <!-- <td style="border:1px solid black;">
                        <b>Customer Address</b><br>
                        Lahore
                    </td> -->
                    <td></td>
                    <td style="border:1px solid black;">
                        <div>Exchange Rate</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b>PKR/GBP</b></div>
                            <div style="width:10rem;"><?php echo $rate; ?></div>
                        </div>
                    </td>
                </tr>
                <td style="border:1px solid black;">
                    <div class="d-flex">
                        <div style="width:10rem;"><b>Receiver Name</b></div>
                        <div><b>Telephone</b></div>
                    </div>
                    <div class="d-flex">
                        <div style="width:10rem;"><?php echo $recv_name; ?></div>
                        <div> <?php echo $rcv_contact; ?></div>
                    </div>
                </td>
                <td style="border:1px solid black;">
                    Amount To Be Transimitted
                    <div class="d-flex ml-5">
                        <div style="width:5rem;"><b><?php echo $curr; ?></b></div>
                        <div style="width:10rem;"><?php echo $amount_d; ?></div>
                    </div>
                </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; margin:2px;"><b>Address</b><br>
                        <?php echo $s_address; ?>
                    </td>
                    <td style="border:1px solid black;">
                        <div>Total Cash</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b>GBP</b></div>
                            <div style="width:10rem;"><?php echo $rcv_from_customer; ?></div>
                        </div>
        </div>
        </td>
        </tr>

        </table>
        <p style="margin-top:1rem;"><b>By signing this receipt,I acknowledge that i have read, understood and accepted
                these terms and
                conditions<br>
                Please Check the box if you want to receive Information of the product and servces of Euronet
                Payment Services Ltd, and to authorize us the processing of your personal data to participate in
                every raffle promotes by the company.</b></p>

        <div class="d-flex mt-5">
            <div class="col-md-6" style="width:40rem;">
                ___________________________<br>
                Client Signature
            </div>
            <div class="col-md-6">
                ___________________________<br>
                Agent Signature
            </div>
        </div>


    </div>
</div><br><br>

----------------------------------------------------------------------------------------------------------------------------<br><br><br>
<div class="container">
    <h2>Customer Copy</h2>
    <div class="row">
        <div class="col-md-10">



            <table style="width:70rem;border:1px solid black;">

                <tr>
                    <td style="border:1px solid black; ">

                        <div class="d-flex">
                            <div style="width:15rem;"><b>Malik Money Transfer</b></div>
                            <div><b>Telephone</b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:15rem;">
                                177 Plashet Rd,<br>
                                London E13 oQZ</div>
                            <div> 020 8127 1220</div>
                        </div>
                    </td>

                    <td style="border:1px solid black;">
                        <div class="d-flex" style="paddin-bottom:1rem;">
                            <?php
                                $select_id="select * from transaction";
                                $run=mysqli_query($conn,$select_id);
                                while($res=mysqli_fetch_assoc($run)){
                                $transaction_id=$res['transaction_id'];
                                $s_address=$res['sender_address'];
                                $s_name=$res['sender_name'];
                                $s_phone=$res['sender_phone'];
                                $s_trsansaction_reason=$res['transaction_reason'];
                                $s_source_of_fund=$res['source_of_fund'];
                                $s_occupation=$res['occupation'];
                                $recv_name=$res['receiver_name'];
                                $curr=$res['currency'];
                                $amount_d=$res['amount'];
                                $rate=$res['exchange_rate'];
                                $rcv_contact=$res['contact'];
                                $rcv_from_customer=$res['receive_from_customer'];
                                }
                        ?>
                            <div style="width:10rem;">ORDER NO </div>
                            <div><b>PK <?php echo $transaction_id; ?> </b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:10rem;">Date & Time</div>
                            <div><b>
                                    <script>
                                    var today = new Date();
                                    var date = today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today
                                        .getDate();
                                    document.write(date);
                                    </script>
                                </b></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div style="width:10rem;"><b>Sender Name</b></div>
                            <div><b>Telephone</b></div>
                        </div>
                        <div class="d-flex">
                            <div style="width:10rem;"><?php echo $s_name; ?></div>
                            <div> <?php echo $s_phone; ?></div>
                        </div>
                    </td>
                    <td style="border:1px solid black;">
                        <div class="d-flex">
                            <div style="width:10rem;">Transaction Reason</div>
                            <div><b><?php echo $s_trsansaction_reason; ?></b></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black;">
                        <div class="row d-flex">
                            <div class="col-md-12"><b>Occupation</b><br>
                                <?php echo $s_occupation; ?>
                            </div>
                            <div>
                    </td>
                    <td style="border:1px solid black;">
                        <div>Amount To be Delivered</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b><?php echo $curr; ?></b></div>
                            <div style="width:10rem;">
                                <?php echo $amount_d; ?>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>
                    <!-- <td style="border:1px solid black;">
                        <b>Customer Address</b><br>
                        Lahore
                    </td> -->
                    <td></td>
                    <td style="border:1px solid black;">
                        <div>Exchange Rate</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b>PKR/GBP</b></div>
                            <div style="width:10rem;"><?php echo $rate; ?></div>
                        </div>
                    </td>
                </tr>
                <td style="border:1px solid black;">
                    <div class="d-flex">
                        <div style="width:10rem;"><b>Receiver Name</b></div>
                        <div><b>Telephone</b></div>
                    </div>
                    <div class="d-flex">
                        <div style="width:10rem;"><?php echo $recv_name; ?></div>
                        <div> <?php echo $rcv_contact; ?></div>
                    </div>
                </td>
                <td style="border:1px solid black;">
                    Amount To Be Transimitted
                    <div class="d-flex ml-5">
                        <div style="width:5rem;"><b><?php echo $curr; ?></b></div>
                        <div style="width:10rem;"><?php echo $amount_d; ?></div>
                    </div>
                </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; margin:2px;"><b>Address</b><br>
                        <?php echo $s_address; ?>
                    </td>
                    <td style="border:1px solid black;">
                        <div>Total Cash</div>
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b>GBP</b></div>
                            <div style="width:10rem;"><?php echo $rcv_from_customer; ?></div>
                        </div>
        </div>
        </td>
        </tr>

        </table>
        <p style="margin-top:1rem;"><b>By signing this receipt,I acknowledge that i have read, understood and accepted
                these terms and
                conditions<br>
                Please Check the box if you want to receive Information of the product and servces of Euronet
                Payment Services Ltd, and to authorize us the processing of your personal data to participate in
                every raffle promotes by the company.</b></p>

        <div class="d-flex mt-5">
            <div class="col-md-6" style="width:40rem;">
                ___________________________<br>
                Client Signature
            </div>
            <div class="col-md-6">
                ___________________________<br>
                Agent Signature
            </div>
        </div>


    </div>
</div>
<!-- Print Table -->