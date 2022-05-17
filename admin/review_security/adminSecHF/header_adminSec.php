       
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="/images/ramsme_favicon.ico" type="image/x-icon"/> 
    
    <title>RAMSME | Home | Admin </title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/White-Footer.css">
  
    <style>
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style> 
    


    
       
</head>
<body id="page-top">
    
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
        <div class="container"><img src="/images/ramsme_logo.png" alt="ramsme logo"/><a class="navbar-brand" href="/images/ramsme_logo_60.png">RAMSME</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/about_us.php" target="_self">About Us</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Payments</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/client/activity/register_payment.php" target="_self">Register</a>
                            <a class="dropdown-item" href="/client/activity/personal_status_rpt.php">Status</a>
                            <a class="dropdown-item" href="/client/activity/personal_status_prnt.php">Print Receipt</a>
                            <a class="dropdown-item" href="/paystack/payment.php" title="Security / Infrastructure" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="You can pay Security/Infrastructure levy via this Platform. Other Charges Applies, Please. The advantage is that your payment information are fed directly into the Database">Pay Levy</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Complains</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/client/activity/register_complain.php" target="_self">Send</a>
                            <a class="dropdown-item" href="/admin/review_complains/complain_view.php">View</a>
                           <!--  <a class="dropdown-item " href="/admin/review_complains/complain_response.php">Reply</a> -->
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Update</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/admin_home.php" target="_self">Personnel Records</a>
                            <a class="dropdown-item" href="/admin/admin_register_payment.php" target="_self">Insert Payments</a>
                            <a class="dropdown-item" href="/admin/review_security/sec_pay_update.php" target="_self">Security Payments</a>
                             <a class="dropdown-item" href="/admin/review_infrastructure/infr_pay_update.php" target="_self">Infrastructure Payments</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">View Status</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/contributn_summary/sec_estate_status_rpt.php" target="_self">Security Payments</a>
                             <a class="dropdown-item" href="/admin/contributn_summary/infr_estate_status_rpt.php" target="_self">Infrastructure Payments</a>
                             <a class="dropdown-item" href="/admin/contributn_summary/access_client_status.php" target="_self">Check Residents Status</a>
                        </div>
                    </li>
                     
                    
                    
                </ul><span class="navbar-text actions"> <a class="login" href="/client/logout.php" target="_self">Log Out</a><a class="btn btn-light action-button" role="button" href="../index.php" target="_self">Home</a></span>
            </div>
        </div>
    </nav>
    
          

