<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Print Bill</title>

    <style>
        body  
        { 
            font-weight: bold;
            height:140mm;
            width: 220mm;
            padding : 15px;
        }

        .tbl-bor{
            border: 1.5px solid black;
        }

    </style>
</head>
<body>

<div style="margin-top:15mm;">
    <h3 class="text-center">INVOICE</h3>
    <div>
        <table class="table tbl-bor">
            <tr>
                <td class="text-left" style="width:53.25mm; font-size:15px;">
                    <div>
                        <img src="<?php echo base_url(); ?>assets/img/aclogo.png" style="height:100px">
                        <p style="line-height:20px;">
                            A9 Road, Nochimoddai<br>
                            Vavuniya.<br>
                            Tel : 024 222 9192
                        </p>
                    </div>
                </td>
                <td style="width:73.25mm">
                    
                </td>
                
                <td class="text-left" style="width:73.25mm; vertical-align:bottom; font-size:15px;">
                        <div>
                            <p>
                                Date: <?php echo $basic->bill_date; ?><br>
                                Invoice No: <?php echo $basic->bill_no; ?><br>
                                Customer Name: <?php echo $basic->customer_name; ?><br>
                                Mobile No: <?php echo $basic->contact_no; ?><br>
                                Vehicle No: <?php echo $basic->vehicle_no; ?><br>
                                Current Km: <?php echo $basic->ckm; ?>km<br>
                            </p>
                        </div>
                </td>
            </tr>
        </table>
    </div>

    <div style:padding:20px;>
        <table>
            <thead style="heigh:30px;" class="text-center tbl-bor">
                <th style="width:15mm;" class="tbl-bor">No</th>
                <th style="width:150mm;" class="tbl-bor">Service/Item</th>
                <th style="width:15mm;" class="tbl-bor">Qty</th>
                <th style="width:40mm;" class="tbl-bor">Unit Price</th>
                <th style="width:40mm;" class="tbl-bor">Amount</th>
            </thead>

            <?php
                $i = 1;
                $total_price = 0;
                foreach ($services as $ser) {
                    ?>
                    <tr class="tbl-bor" style="height:8mm;">
                        <td class="tbl-bor text-center"><?php echo $i; ?></td>
                        <td class="tbl-bor text-left"><?php echo $ser->service; ?></td>
                        <td class="tbl-bor text-center"></td>
                        <td class="tbl-bor text-center"></td>
                        <td class="tbl-bor text-right"><?php echo $ser_amount=$ser->amount; ?>.00</td>
                    </tr>
                    <?php

                    $i++;
                    $total_price = $total_price+$ser_amount;
                }

                foreach ($items as $itm) {
                    ?>
                    <tr style="height:8mm;">
                        <td class="tbl-bor text-center"><?php echo $i; ?></td>
                        <td class="tbl-bor text-left"><?php echo $itm->item_name; ?></td>
                        <td class="tbl-bor text-center"><?php echo $qty = $itm->qty; ?></td>
                        <td class="tbl-bor text-right"><?php echo $unit = $itm->amount; ?>.00</td>
                        <td class="tbl-bor text-right"><?php echo $itm_amount=$qty*$unit; ?>.00</td>
                    </tr>
                    <?php

                    $i++;
                    $total_price = $total_price+$itm_amount;
                }
            ?>
            <tr style="height:5mm;">
                <td class="text-center"></td>
                <td class="text-left"></td>
                <td class="text-center"></td>
                <td class="text-right">Sub Total</td>
                <td class="text-right">Rs.<?php echo $total_price; ?>.00</td>
            </tr>
            <tr style="height:5mm;">
                <td class="text-center"></td>
                <td class="text-left"></td>
                <td class="text-center"></td>
                <td class="text-right">Discount</td>
                <td class="text-right">Rs.<?php echo $discount = $basic->discount; ?>.00</td>
            </tr>
            <tr style="height:5mm;">
                <td class="text-center"></td>
                <td class="text-left"></td>
                <td class="text-center"></td>
                <td class="text-right">Total</td>
                <td class="text-right">Rs.<?php echo $total_price- $discount; ?>.00</td>
            </tr>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        window.print();
        //window.location.href = "<?php echo base_url(); ?>Orders/P";
    });
</script>
</body>
</html>