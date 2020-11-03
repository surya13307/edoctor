<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
&nbsp; &nbsp;
<div class="app-main__outer">
    <a id="back-btn" href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>


    <head>

        <meta charset="utf-8">

        <title>INVOICE</title>



        <style>

            .invoice-box {

                max-width: 800px;

                margin: auto;

                padding: 30px;

                border: 1px solid #eee;

                box-shadow: 0 0 10px rgba(0, 0, 0, .15);

                font-size: 16px;

                line-height: 24px;

                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

                color: #555;

            }



            .invoice-box table {

                width: 100%;

                line-height: inherit;

                text-align: left;

            }



            .invoice-box table td {

                padding: 5px;

                vertical-align: top;

            }



            .invoice-box table tr td:nth-child(2) {

                text-align: right;

            }



            .invoice-box table tr.top table td {

                padding-bottom: 20px;

            }



            .invoice-box table tr.top table td.title {

                font-size: 45px;

                line-height: 45px;

                color: #333;

            }



            .invoice-box table tr.information table td {

                padding-bottom: 40px;

            }



            .invoice-box table tr.heading td {

                background: #eee;

                border-bottom: 1px solid #ddd;

                font-weight: bold;

            }



            .invoice-box table tr.details td {

                padding-bottom: 20px;

            }



            .invoice-box table tr.item td{

                border-bottom: 1px solid #eee;

            }



            .invoice-box table tr.item.last td {

                border-bottom: none;

            }



            .invoice-box table tr.total td:nth-child(2) {

                border-top: 2px solid #eee;

                font-weight: bold;

            }



            @media only screen and (max-width: 600px) {

                .invoice-box table tr.top table td {

                    width: 100%;

                    display: block;

                    text-align: center;

                }



                .invoice-box table tr.information table td {

                    width: 100%;

                    display: block;

                    text-align: center;

                }

            }



            /** RTL **/

            .rtl {

                direction: rtl;

                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

            }



            .rtl table {

                text-align: right;

            }



            .rtl table tr td:nth-child(2) {

                text-align: left;

            }

        </style>

    </head>



    <body>

        <div class="invoice-box">
            <div id="btn-div">

                <button type="button" id="print" class="btn btn-primary" >Print</button>
                <a href="<?php echo site_url('myrequests/patientPrescription') ?>?id=<?php echo $request_details['id'] ?>"  class="btn btn-primary" >Go to Prescription</a>
            </div>


            <table cellpadding="0" cellspacing="0">

                <tr class="top">

                    <td colspan="2">

                        <table>

                            <tr>

                                <td class="title">

                                    <img src="<?php echo base_url() ?>assets/images/logo-edoctor.png" style="width:100%; max-width:300px;">

                                </td>



                                <td>

                                    Invoice #: <?php echo $request_details['id'] ?><br>

                                    Created: <?php echo $request_details['requested_date'] ?><br>


                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>



                <tr class="information">

                    <td colspan="2">

                        <table>

                            <tr>

                                <td>

                                    Patient Name : <?php echo $patient_details['name'] ?><br>

                                    Age : <?php echo $patient_details['age'] ?> <br>

                                    Mobile : <?php echo $patient_details['mobile'] ?>

                                </td>



                                <td>

                                    Consulted Doctor :  <?php echo $doctor_details['name'] ?><br>
                                    Address : <?php echo $doctor_details['address'] ?><br>
                                    Mobile : <?php echo $doctor_details['mobile'] ?><br>
                                    Email : <?php echo $doctor_details['email'] ?>



                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>



                <tr class="heading">

                    <td>

                        Payment Reference

                    </td>



                    <td>



                    </td>

                </tr>



                <tr class="details">

                    <td>

                        Transaction Id

                    </td>



                    <td>

                        54G6DF4BG65DF4844FDG6DF4

                    </td>

                </tr>



                <tr class="heading">

                    <td>

                        Services

                    </td>



                    <td>

                        Amount Breakdown

                    </td>

                </tr>



                <tr class="item">

                    <td>

                        Consultation fee

                    </td>

                    <?php
                    if ($request_details['person'] == 'MYSELF') {
                        ?>

                        <td>
                            AED 350

                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
                            AED 550

                        </td>
                        <?php
                    }
                    ?>
                </tr>



                <tr class="item">

                    <td>

                        Other Services

                    </td>


                    <?php
                    if ($request_details['person'] == 'MYSELF') {
                        ?>

                        <td>
                            AED 40

                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
                            AED 40

                        </td>
                        <?php
                    }
                    ?>

                </tr>



                <tr class="item last">

                    <td>

                        Online Service Charge

                    </td>



                    <td>

                        AED 10

                    </td>

                </tr>



                <tr class="total">

                    <td></td>



                    <?php
                    if ($request_details['person'] == 'MYSELF') {
                        ?>

                        <td>
                            TOTAL :  AED 400

                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
                            TOTAL :  AED 600

                        </td>
                        <?php
                    }
                    ?>

                </tr>

            </table>

        </div>

    </body>



</div>
<script>
    $('#print').click(function () {

        $('#back-btn').hide();
        $('#btn-div').hide();
        window.print();
        $('#back-btn').show();
        $('#btn-div').show();
    });
</script>
<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>