<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
  <a href="<?= site_url('myrequests') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>


    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            /*background-color: #4CAF50;*/
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="/action_page.php">

                    <div class="row">


                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <span class="" style="color:navy;">VISA</span>
                                <span class="" style="color:red;">MASTER CARD</span>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" class="required" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" class="required" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" class="required" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" class="required" placeholder="2020">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" class="required" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                    </label> 
                    <button type="button" name="btn-sbmt" id="btn-sbmt" class="btn btn-success" >PAY</button>
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="container">

                <br>
                <?php
                if ($request_details['person'] == 'MYSELF') {
                    ?>
                    <p>Total <span class="price" style="color:black"><b>AED 400 </b></span></p>
                    <?php
                } else {
                    ?>
                    <p>Total <span class="price" style="color:black"><b>AED 600 </b></span></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="request-id" value="<?php echo $request_details['id'] ?>" >
<script>
    $('#btn-sbmt').click(function () {
        var requestId = $('#request-id').val();
        var flag = true;
        $('.required').each(function () {
            var dataValue = $(this).val();
            if (dataValue == '') {
                flag = false;
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '#ccc');

            }
        });
        if (flag == true) {
            var url = '<?= site_url('invoice') ?>';
            location.href = url + '?id=' + requestId;
        }
    });
</script>


<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>
