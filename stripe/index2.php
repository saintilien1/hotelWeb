<?php  
use \PhpPot\Service\StripePayment; 
require_once "config.php";
require_once"../data/Connection.php";
if(session_status()===PHP_SESSION_NONE) session_start();
$start = $_SESSION["start"];
$end   = $_SESSION["end"];
$id    = $_SESSION["id"]; 
if (!empty($_POST["token"])) {
    require_once 'StripePayment.php';
    $stripePayment = new StripePayment(); 
    $stripeResponse = $stripePayment->chargeAmountFromCard($_POST); 
    require_once "DBController.php";
    $dbController = new DBController(); 
    $amount = $stripeResponse["amount"] /100; 
    $param_type = 'ssssss';
    $param_value_array = array(
    $start, 
    $end,
    $stripeResponse["status"],
    json_encode($stripeResponse),
    $_POST['email'],
    $clientName = $_POST["name"] 
    );
     
    $query ="UPDATE rooms SET status='false',Start_d=?, End_d=?, payment_status=? ,payment_response=?, email=?, client=?, pay_at=now() WHERE id='$id'";
    $id = $dbController->update($query, $param_type, $param_value_array);
    if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
        $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
    }
}
?> 
    <?php if(!empty($successMessage)) { ?>
    <div id="success-message"><?php echo "You will never forget the moment you spend with us."; ?></div>
    <?php } ?>
    <div id="error-message"></div>        
     <form class="booking-form" action="" id="frmStripePayment" method="post"  >
		 <div class="row">  
              <div class="col-lg-12 d-flex flex-column"> 
                  <label for="name">Card Holder Name</label> <span id="card-holder-name-info" class="info"></span> 
                   <input onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your full name'" class="form-control mt-20" type="text" id="name" name="name" placeholder="Your full name" class="demoInputBox">
              </div>   
			  <div class="col-lg-12 d-flex flex-column">
				  <label for="email">Email</label> <span id="email-info" class="info"></span> 
                  <input type="text" onfocus="this.placeholder = ''"  class="form-control mt-20" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Enter email address" onblur="this.placeholder = 'Enter your email address'"  id="email" name="email" class="demoInputBox">
              </div>
										 
             <div class="col-lg-12 d-flex flex-column">
				 <label for="card-number">Card Number</label> <span id="card-number-info" class="info"></span>  
                  <input type="text" id="card-number" placeholder="card number" onfocus="this.placeholder = ''" class="form-control mt-20" inputmode="numeric" id="card-number" name="card-number" onblur="this.placeholder = 'Card number'" 
                                        class="demoInputBox">                                            
			 </div> 
			 <div class="col-lg-12 d-flex flex-column">
                 <label for="userEmail-info">Amount of money</label>
                 <span id="card-holder-amount-info" class="info"></span> 
                   <input onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $_SESSION["price"] ?> USD'" class="form-control mt-20" type="text" id="amount" name="amount" value="<?php echo $_SESSION["price"] ?>" placeholder="<?php echo $_SESSION["price"] ?> USD" readonly class="demoInputBox"> 
			 </div> 
             <div class="col-lg-12 d-flex flex-column">  
              <label>Select expiry month </label> <span id="userEmail-info" class="info"></span> 
               <select name="month" id="month" class="custom-select" class="demoSelectBox"> 
                   <option value="01">01</option>
                   <option value="02">02</option>
                   <option value="03">03</option>
                   <option value="04">04</option>
                   <option value="05">05</option>
                   <option value="06">06</option>
                   <option value="07">07</option>
                   <option value="08">08</option>
                   <option value="09">09</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
              </select> 
            </div> 
            <div class="col-lg-12 d-flex flex-column"> 
            <label>Select expiry Year</label> <span id="userEmail-info" class="info"></span>                
               <select name="year" id="year" class="custom-select" class="demoSelectBox">  
              <option value="20">2020</option>
              <option value="21">2021</option>
              <option value="22">2022</option>
              <option value="23">2023</option>
              <option value="24">2024</option>
              <option value="25">2025</option>
              <option value="26">2026</option>
              <option value="27">2027</option>
              <option value="28">2028</option>
              <option value="29">2029</option>
              <option value="30">2030</option>
              <option value="31">2031</option>
              <option value="32">2032</option>
            </select>
           </div> 
          <div class="col-lg-12 d-flex flex-column"> 
             <label for="cvc">CVC</label> <span id="cvv-info" class="info"></span>
              <input type="text" placeholder="Card Verification Code" name="cvc" onblur="this.placeholder = 'Card Verification Code'"   class="form-control mt-20" id="cvc" class="demoInputBox cvv-input">
			 </div> 
			 <div class="col-lg-12 d-flex  justify-content-end send-btn" >
			 <div><br>
               <input type="submit"  class="submit-btn btn btn-primary mt-20 text-uppercase"  name="pay_now" value="book now"  id="submit-btn" class="btnAction"
                        onClick="stripePay(event);"> 
              </div>
			  </div>
              <div class="alert-msg"></div>
			 </div> 
            <input type='hidden' name='currency_code' value='USD'> 
            <input type='hidden' name='item_name' value='Test Product'>
            <input type='hidden' name='item_number' value='PHPPOTEG#1'>
            </form> 
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="vendor/jquery/jquery.js" type="text/javascript"></script>
    <script>
function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide(); 

    if (name.trim() == "") {
        valid = false;
    }
    if (email.trim() == "") {
    	   valid = false;
    }
    if (cardNumber.trim() == "") {
    	   valid = false;
    }

    if (month.trim() == "") {
    	    valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler); 
        //submit from callback
        return false;
    }
}
</script>
 