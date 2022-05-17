<?php
  ob_start();
?>


<!DOCTYPE html>
<html>

<?php
include 'mainHF/header_home.php';
session_start();
 ?>
    
   
    <header class="text-center text-white masthead" style="background:url('../images/ramsme.png')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto position-relative">
                    <h1 class="mb-5">Resident Association of Ministry of Mine and Steel Midhill (Corporative) Estate Management Portal</h1>
                    <a class="btn btn-primary action-button" role="button" href="/client/register.php" target="_self"><span class="badge rounded-pill bg-warning"><h3>Sign Up</h3></span></a>
                    
                </div>
               
            </div>
        </div>
    </header>
    <section class="text-center bg-light features-icons">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-screen-desktop m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <a href="about_us.php" target="_self"><span class="badge rounded-pill bg-success"><h3>About Us</h3></span></a>
                        <p class="lead mb-0">Learn about us: Objective, Constitution and how to join us</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-layers m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <a   href="/client/activity/register_payment.php" target="_self"><span class="badge rounded-pill bg-success"><h3>Register Payments</h3></span></a>
                        <p class="lead mb-0">Payments for service charge, security levy and related services made via the Association are registrable using the above link.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-check m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <a   href="/client/activity/register_complain.php" target="_self"><span class="badge rounded-pill bg-success"><h3>Register Complains</h3></span></a>
                        <p class="lead mb-0">Members are enjoined to use the above link to register their complains.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

 <?php
include 'mainHF/footer_home.php'; 
 ?>

</html>

<?php
  ob_end_flush();
?>