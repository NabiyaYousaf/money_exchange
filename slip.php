<?php
include('connection.php');
$print_id=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
    table,
    td {
        border: 1px solid black;
        ;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="margin:2rem 0;">Customer Copy</h2>
        <div class="row">
            <div class="col-md-10">



                <table style="width:70rem">

                    <tr>
                        <td>
                            <div class="row d-flex">
                                <div class="col-md-6"><b>Malik Money Transfer</b>
                                    <br>
                                    177 Plashet Rd,<br>
                                    London E13 oQZ
                                </div>
                                <div class="col-md-6"><b>Telephone</b><br>
                                    020 8127 1220
                                </div>
                                <div>
                        </td>
                        <?php
                            $sql="select * from transaction where id='$print_id'";
                            $run=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($run);
                            if($count > 0){
                                while($res=mysqli_fetch_assoc($run)){
                                    ?>


                        <td>
                            <div class="d-flex">
                                <div style="width:10rem;">ORDER NO</div>
                                <div><b>PK<?php echo $res['transaction_id'] ?></b></div>
                            </div>
                            <div class="d-flex">
                                <div style="width:10rem;">Date & Time</div>
                                <div><b><?php echo $res['date']; ?></b></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row d-flex">
                                <div class="col-md-6"><b>Sender Name</b><br><?php echo $res['sender_name']; ?></div>
                                <div class="col-md-6"><b>Telephone</b><br><?php echo $res['sender_phone'] ?></div>
                                <div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <div style="width:10rem;">Transaction Reason</div>
                                <div><b><?php echo $res['transaction_reason'] ?></b></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row d-flex">
                                <div class="col-md-12"><b>Occupation</b><br><?php echo $res['occupation'] ?></div>
                                <div>
                        </td>
                        <td>
                            <div>Amount To be Delivered</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b><?php
                            echo $res['currency'];
                        ?></b></div>
                                <div style="width:10rem;"><?php echo $res['amount_received']; ?></div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <div>Exchange Rate</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b>PKR/GBP</b></div>
                                <div style="width:10rem;"><?php echo $res['exchange_rate']; ?></div>
                            </div>
                        </td>
                    </tr>
                    <td>
                        <div class="row d-flex">
                            <div class="col-md-6"><b>Receiver Name</b><br>
                                <?php echo $res['receiver_name'] ?>
                            </div>
                            <div class="col-md-6"><b>Telephone</b><br>
                                <?php echo $res['contact'] ?>
                            </div>
                            <div>
                    </td>
                    <td>
                        Amount To Be Transimitted
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b><?php
                            echo $res['currency'];
                        ?></b></div>
                            <div style="width:10rem;"><?php echo $res['amount_received']; ?></div>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td><b>Address</b><br>
                            <?php echo $res['sender_address'] ?>
                        </td>
                        <td>
                            <div>Total Cash</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b>GBP</b></div>
                                <div style="width:10rem;"><?php echo $res['receive_from_customer']; ?></div>
                            </div>
            </div>
            </td>
            </tr>
            <?php
                                }
                            }
                        ?>

            </table><br>
            <p><b>By signing this receipt,I acknowledge that i have read, understood and accepted these terms and conditions<br>
                    Please Check the box if you want to receive Information of the product and servces of Euronet
                    Payment Services Ltd, and to authorize us the processing of your personal data to participate in
                    every raffle promotes by the company.</b></p>

            <div class="d-flex mt-5">
                <div class="col-md-6">
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

    --------------------------------------------------------------------------------------------------------------------------------------------

    <br><br>


    <h2 style="margin:2rem 0;">Agent Copy</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-10">



                <table style="width:70rem">

                    <tr>
                    <td>
                            <div class="row d-flex">
                                <div class="col-md-6"><b>Malik Money Transfer</b>
                                    <br>
                                    177 Plashet Rd,<br>
                                    London E13 oQZ
                                </div>
                                <div class="col-md-6"><b>Telephone</b><br>
                                    020 8127 1220
                                </div>
                                <div>
                        </td>
                        <?php
                            $sql="select * from transaction where id='$print_id'";
                            $run=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($run);
                            if($count > 0){
                                while($res=mysqli_fetch_assoc($run)){
                                    ?>


                        <td>
                            <div class="d-flex">
                                <div style="width:10rem;">ORDER NO </div>
                                <div><b>PK<?php echo $res['transaction_id'] ?></b></div>
                            </div>
                            <div class="d-flex">
                                <div style="width:10rem;">Date & Time</div>
                                <div><b><?php echo $res['date']; ?></b></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row d-flex">
                                <div class="col-md-6"><b>Sender Name</b><br><?php echo $res['sender_name']; ?></div>
                                <div class="col-md-6"><b>Telephone</b><br><?php echo $res['sender_phone'] ?></div>
                                <div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <div style="width:10rem;">Transaction Reason</div>
                                <div><b><?php echo $res['transaction_reason'] ?></b></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row d-flex">
                                <div class="col-md-12"><b>Occupation</b><br><?php echo $res['occupation'] ?></div>
                                <div>
                        </td>
                        <td>
                            <div>Amount To be Delivered</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b><?php
                            echo $res['currency'];
                        ?></b></div>
                                <div style="width:10rem;"><?php echo $res['amount_received']; ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <div>Exchange Rate</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b>PKR/GBP</b></div>
                                <div style="width:10rem;"><?php echo $res['exchange_rate']; ?></div>
                            </div>
                        </td>
                    </tr>
                    <td>
                        <div class="row d-flex">
                            <div class="col-md-6"><b>Receiver Name</b><br>
                                <?php echo $res['receiver_name'] ?>
                            </div>
                            <div class="col-md-6"><b>Telephone</b><br>
                                <?php echo $res['contact'] ?>
                            </div>
                            <div>
                    </td>
                    <td>
                        Amount To Be Transimitted
                        <div class="d-flex ml-5">
                            <div style="width:5rem;"><b><?php
                            echo $res['currency'];
                        ?></b></div>
                            <div style="width:10rem;"><?php echo $res['amount_received']; ?></div>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td><b>Address</b><br>
                            <?php echo $res['sender_address'] ?>
                        </td>
                        <td>
                            <div>Total Cash</div>
                            <div class="d-flex ml-5">
                                <div style="width:5rem;"><b>
                                    GBP
                                </b></div>
                                <div style="width:10rem;"><?php echo $res['receive_from_customer']; ?></div>
                            </div>
            </div>
            </td>
            </tr>
            <?php
                                }
                            }
                        ?>

            </table><br>
            <p><b>By signing this receipt,I acknowledge that i have read, understood and accepted these terms and
                    conditions<br>
                    Please Check the box if you want to receive Information of the product and servces of Euronet
                    Payment Services Ltd, and to authorize us the processing of your personal data to participate in
                    every raffle promotes by the company.</b></p>

            <div class="d-flex mt-5">
                <div class="col-md-6">
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
    <script>
    window.print();
    </script>
</body>

</html>