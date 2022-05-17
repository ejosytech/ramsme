<?php
  ob_start();
?>

<?php

// Processing form data when form is submitted
if(isset($_POST["mobile_no"]) && !empty($_POST["mobile_no"]))


{     
     // Validate Email
       $mobile_no = trim($_POST["mobile_no"]);
    
      // Validate Email
    $input_name_value = trim($_POST["name_value"]);
    if(empty($input_name_value)){
        $name_value_err = "Name not provided";     
        } else{
        $name_value = $input_name_value;
    }
    
      // Validate Pay Date
    $input_pay_date = trim($_POST["pay_date"]);
    if(empty($input_pay_date)){
        $pay_date_err = "Pay Date  not provided";     
        } else{
        $pay_date = $input_pay_date;
    }
        
    // Validate Email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Email not provided";     
        } else{
        $email = $input_email;
    }

    // Validate Amount
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Amount not provided";     
        } else{
        $amount = $input_amount * 100;
    }
    
    // Validate Remark
    $input_remark = trim($_POST["remark"]);
    if(empty($input_remark)){
        $remark_err = "Please enter your Remark.";
    } elseif(!filter_var($input_remark, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $remark_err = "Please enter a valid Remark.";
    } else{
        $remark = $input_remark;
    }
    
    // Validate service
    $input_service = trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter the amount paid.";
    }  else{
        $service = $input_service;
    }
    
  }
  

  //echo $mobile_no;
  //echo $email;
 //   echo $amount;
 // exit();
  
  //
  $pay_channel = "paystack";
    
    // Include config file
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/config.php');
        
        $sql = "INSERT INTO payments (mobile_no, name_value, pay_date, amount, pay_channel, service,remark) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_mobile_no, $param_name_value, $param_date, $param_amount,$param_pay_channel,$param_service,$param_remark );
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            $param_name_value = $name_value;
            $param_date = $pay_date;
            $param_amount = $amount / 100;
            $param_pay_channel = $pay_channel;
            $param_service = $service;
            $param_remark = $remark;
            //
      
            // Attempt to execute the prepared statement
            if(!mysqli_stmt_execute($stmt))
            {
                         
              header("Location: error.php"); 
                          
            } 
                  // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
    
        }
            
  

// url to go to after payment
$callback_url = 'https://ramsme.com/paystack/callback.php';  

// Setup request to send json via POST
$posted_data = array(
         'amount'=>$amount,
          'email'=>$email
          //'subaccount'=> 'ACCT_bpp37y435f4bf9y',
          //'transaction_charge' => '200000',
         // 'bearer' => 'subaccount'
        );

$payload = json_encode( $posted_data);

// Attach encoded JSON string to the POST fields
//curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$curl = curl_init();

curl_setopt_array($curl, [CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_bfe3932f08913c5bc1c4000e1cf2b503383c3bc0", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}
 else {
     // comment out this line if you want to redirect the user to the payment page
                //print_r($tranx);
    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
                header('Location: ' . $tranx['data']['authorization_url']);
                
 }



            
        
