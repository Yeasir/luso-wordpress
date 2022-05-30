<?php
/**
 * Template Name: Payment Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luso
 */
session_start();
get_header();
require_once "inc/AuthorizeNet/config.php";
?>
    <!-- /.staff-area start -->
    <section class="find-agent-area inner-page-wrapper">
        <div class="container">
            <div class="row">
                <?php
                $type = "";
                $message = "";
                if ( !empty( $_POST["agree_check"] ) && $_POST["agree_check"] == 'agreed' ) {
                    require_once 'inc/AuthorizeNet/AuthorizeNetPayment.php';
                    $authorizeNetPayment = new AuthorizeNetPayment();

                    $response = $authorizeNetPayment->chargeCreditCard( $_POST );
                    if ( $response != null ) {
                        $tresponse = $response->getTransactionResponse();

                        if ( ( $tresponse != null ) && ( $tresponse->getResponseCode()=="1" ) ) {
                            $authCode = $tresponse->getAuthCode();
                            $paymentResponse = $tresponse->getMessages()[0]->getDescription();
                            $reponseType = "success";
                            $message = "This transaction has been approved. <br/> Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() .  " <br/>Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
                        } else {
                            $authCode = "";
                            $paymentResponse = $tresponse->getErrors()[0]->getErrorText();
                            $reponseType = "error";
                            $message = "Charge Credit Card ERROR :  Invalid response\n";
                        }

                        $transactionId = $tresponse->getTransId();
                        $responseCode = $tresponse->getResponseCode();
                        $paymentStatus = $authorizeNetPayment->responseText[$tresponse->getResponseCode()];

                    } else {
                        $reponseType = "error";
                        $message= "Charge Credit Card Null response returned";
                    }
                }

                if( !empty( $message ) ) {
                    if($reponseType == 'success'):
                        session_unset();
                    endif;
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
                    <div id="response-message" class="<?php echo $reponseType; ?>"><?php echo $message; ?></div>
                </div>
                <?php  }

                if( isset( $_POST['frm_submit'] ) && $_POST['frm_submit'] == '1' ) :
                    if ( ! isset( $_POST['my_payment_field'] ) || ! wp_verify_nonce( $_POST['my_payment_field'], 'my_payment_action' )
                    ) {
                        echo 'Sorry, your nonce did not verify.';
                        exit;
                    } else {
                        $first_name = sanitize_text_field($_POST['first_name']);
                        $_SESSION['first_name'] = $first_name;
                        $last_name = sanitize_text_field($_POST['last_name']);
                        $_SESSION['last_name'] = $last_name;
                        $phone_number = sanitize_text_field($_POST['phone_number']);
                        $_SESSION['phone_number'] = $phone_number;
                        $email_address = sanitize_text_field($_POST['email_address']);
                        $_SESSION['email_address'] = $email_address;
                        $street_address = sanitize_text_field($_POST['street_address']);
                        $_SESSION['street_address'] = $street_address;
                        $state = sanitize_text_field($_POST['your_state']);
                        $_SESSION['state'] = $state;
                        $city = sanitize_text_field($_POST['your_city']);
                        $_SESSION['city'] = $city;
                        $zip_code = sanitize_text_field($_POST['zip_code']);
                        $_SESSION['zip_code'] = $zip_code;
                        $policy_number = sanitize_text_field($_POST['policy_number']);
                        $_SESSION['policy_number'] = $policy_number;
                        $amount = sanitize_text_field($_POST['c_amount']);
                        $_SESSION['amount'] = $amount;
                        //$card_number = sanitize_text_field($_POST['card_number']);
                        //$_SESSION['card_number'] = $card_number;
                        $card_number = sanitize_text_field($_POST['card_number']);
                        $_SESSION['card_number'] = $card_number;
                        $month = sanitize_text_field($_POST['c_month']);
                        $_SESSION['month'] = $month;
                        $year = sanitize_text_field($_POST['c_year']);
                        $_SESSION['year'] = $year;
                        $cvv = sanitize_text_field($_POST['c_cvv']);
                        $_SESSION['cvv'] = $cvv;
                    }
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
                        <div class="content review-box">
                            <header class="position-relative mb-4">
                                <h2 class="text-primary-color">Review all details</h2>
                                <a href="#" class="print-btn" > <svg id="printer" xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"><path id="Path_160" data-name="Path 160" d="M34.994,10.33H33.873V6.006A6.013,6.013,0,0,0,27.867,0H13.133A6.013,6.013,0,0,0,7.127,6.006V10.33H6.006A6.013,6.013,0,0,0,0,16.336v9.609a6.013,6.013,0,0,0,6.006,6.006H7.127V37.4a3.608,3.608,0,0,0,3.6,3.6H30.27a3.608,3.608,0,0,0,3.6-3.6V31.951h1.121A6.013,6.013,0,0,0,41,25.945V16.336A6.013,6.013,0,0,0,34.994,10.33ZM9.529,6.006a3.608,3.608,0,0,1,3.6-3.6H27.867a3.608,3.608,0,0,1,3.6,3.6V10.33H9.529ZM31.471,37.4a1.2,1.2,0,0,1-1.2,1.2H10.73a1.2,1.2,0,0,1-1.2-1.2V25.545H31.471ZM38.6,25.945a3.608,3.608,0,0,1-3.6,3.6H33.873v-4h.721a1.2,1.2,0,0,0,0-2.4H6.406a1.2,1.2,0,0,0,0,2.4h.721v4H6.006a3.608,3.608,0,0,1-3.6-3.6V16.336a3.608,3.608,0,0,1,3.6-3.6H34.994a3.608,3.608,0,0,1,3.6,3.6Z" fill="#7e7e7e"/><path id="Path_161" data-name="Path 161" d="M208.607,353H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -324.732)" fill="#7e7e7e"/><path id="Path_162" data-name="Path 162" d="M208.607,417H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -383.607)" fill="#7e7e7e"/><path id="Path_163" data-name="Path 163" d="M70.045,193H66.2a1.2,1.2,0,0,0,0,2.4h3.844a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-59.795 -177.545)" fill="#7e7e7e"/></svg><span class="ml-3">Print</span></a>
                            </header>

                            <form action="" method="post">
                                <a href="<?php bloginfo('url');?>/make-a-payment/?action=edit" class="d-inline-block mb-5 edit-btn">( edit information )</a>
                                <div class="details">
                                    <p class="reviewDetails">
                                        <?php if( !empty( $first_name ) ) :?>
                                        <strong>First Name:</strong> <?php echo $first_name;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $last_name ) ) :?>
                                            <strong> Last Name:</strong> <?php echo $last_name;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $phone_number ) ) :?>
                                        <strong>Phone:</strong> <?php echo $phone_number;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $street_address ) ) :?>
                                        <strong>Street Address:</strong> <?php echo $street_address;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $city ) ) :?>
                                        <strong>City:</strong> <?php echo $city;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $email_address ) ) :?>
                                        <strong>Email:</strong> <?php echo $email_address;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $state ) ) :?>
                                        <strong>State:</strong> <?php echo $state;?><br>
                                        <?php endif;?>
                                        <?php if( !empty( $zip_code ) ) :?>
                                        <strong>Zip Code:</strong> <?php echo $zip_code;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $policy_number ) ) :?>
                                        <strong>Policy Number:</strong> <?php echo $policy_number;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $amount ) ) :?>
                                        <strong> Amount:</strong> $<?php echo $amount;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $month ) ) :?>
                                        <strong>Month:</strong> <?php echo $month;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $year ) ) :?>
                                        <strong>Year:</strong> <?php echo $year;?> <br>
                                        <?php endif;?>
                                        <?php if( !empty( $card_number ) ) :?>
                                        <strong>Card Number: </strong> <?php echo $card_number;?>
                                        <?php endif;?>

                                    </p>
                                    <button type="submit" class="btn mb-3 submit-btn">Submit</button>
                                    <div class="form-check">
                                        <input type='hidden' name='u_amount' value='<?php if( !empty( $amount ) ) : echo $amount; endif;?>'>
                                        <input type='hidden' name='u_first_name' value='<?php if( !empty( $first_name ) ) : echo $first_name; endif;?>'>
                                        <input type='hidden' name='u_last_name' value='<?php if( !empty( $last_name ) ) : echo $last_name; endif;?>'>
                                        <input type='hidden' name='u_phone_number' value='<?php if( !empty( $phone_number ) ) : echo $phone_number; endif;?>'>
                                        <input type='hidden' name='u_email_address' value='<?php if( !empty( $email_address ) ) : echo $email_address; endif;?>'>
                                        <input type='hidden' name='u_street_address' value='<?php if( !empty( $street_address ) ) : echo $street_address; endif;?>'>
                                        <input type='hidden' name='u_state' value='<?php if( !empty( $state ) ) : echo $state; endif;?>'>
                                        <input type='hidden' name='u_city' value='<?php if( !empty( $city ) ) : echo $city; endif;?>'>
                                        <input type='hidden' name='u_zip_code' value='<?php if( !empty( $zip_code ) ) : echo $zip_code; endif;?>'>
                                        <input type='hidden' name='u_policy_number' value='<?php if( !empty( $policy_number ) ) : echo $policy_number; endif;?>'>
                                        <input type='hidden' name='u_card_number' value='<?php if( !empty( $card_number ) ) : echo $card_number; endif;?>'>
                                        <input type='hidden' name='u_month' value='<?php if( !empty( $month ) ) : echo $month; endif;?>'>
                                        <input type='hidden' name='u_year' value='<?php if( !empty( $year ) ) : echo $year; endif;?>'>
                                        <input type='hidden' name='u_cvv' value='<?php if( !empty( $cvv ) ) : echo $cvv; endif;?>'>
                                        <input class="form-check-input" type="radio" name="agree_check" id="agree" value="agreed" required>
                                        <label class="form-check-label" for="agree">I agree to the terms and conditions</label>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif;?>
                <?php if( !isset( $_POST['frm_submit'] ) ) :?>
                    <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
                        <header class="text-center">
                            <h2 class="section-title">One-Time Payment</h2>
                        </header>
                        <div class="content mt-5 agent-find-form text-center">
                            <form method="post" action="<?php bloginfo('url');?>/make-a-payment/" id="paymentFrm">
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php if( !empty( $_SESSION['first_name'] ) ) : echo $_SESSION['first_name']; endif;?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php if( !empty( $_SESSION['last_name'] ) ) : echo $_SESSION['last_name']; endif;?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="number" class="form-control" name="phone_number" placeholder="Phone" value="<?php if( !empty( $_SESSION['phone_number'] ) ) : echo $_SESSION['phone_number']; endif;?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="email" class="form-control" name="email_address" placeholder="Email Address" value="<?php if( !empty( $_SESSION['email_address'] ) ) : echo $_SESSION['email_address']; endif;?>" required >
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="street_address" placeholder="Street Address" value="<?php if( !empty( $_SESSION['street_address'] ) ) : echo $_SESSION['street_address']; endif;?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="your_state" placeholder="State" value="<?php if( !empty( $_SESSION['state'] ) ) : echo $_SESSION['state']; endif;?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="your_city" placeholder="City" value="<?php if( !empty( $_SESSION['city'] ) ) : echo $_SESSION['city']; endif;?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" value="<?php if( !empty( $_SESSION['zip_code'] ) ) : echo $_SESSION['zip_code']; endif;?>" required>
                                    </div>
                                </div>
                                <h2 class="mb-5 text-primary-color">Policy Information</h2>

                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="number" class="form-control" name="policy_number" placeholder="Policy Number" value="<?php if( !empty( $_SESSION['policy_number'] ) ) : echo $_SESSION['policy_number']; endif;?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="number" class="form-control" name="c_amount" placeholder="Amount" value="<?php if( !empty( $_SESSION['amount'] ) ) : echo $_SESSION['amount']; endif;?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <input type="number" class="form-control" name="card_number" placeholder="Card Number" value="<?php if( !empty( $_SESSION['card_number'] ) ) : echo $_SESSION['card_number']; endif;?>" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="d-flex">
                                            <input type="text" class="form-control w-lg-50 mr-3" name="c_month" placeholder="MONTH" value="<?php if( !empty( $_SESSION['month'] ) ) : echo $_SESSION['month']; endif;?>" required>
                                            <input type="text" class="form-control w-25 mr-3" name="c_year" placeholder="YEAR" value="<?php if( !empty( $_SESSION['year'] ) ) : echo $_SESSION['year']; endif;?>" required>
                                            <input type="text" class="form-control w-25" name="c_cvv" placeholder="CVV" value="<?php if( !empty( $_SESSION['cvv'] ) ) : echo $_SESSION['cvv']; endif;?>" maxlength="3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-5">
                                    <?php wp_nonce_field( 'my_payment_action', 'my_payment_field' ); ?>
                                    <input type="hidden" name="frm_submit" value="1">
                                    <button type="submit" class="btn mb-2 w-50">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
    <!-- /.staff-area end -->
<?php
get_footer();
