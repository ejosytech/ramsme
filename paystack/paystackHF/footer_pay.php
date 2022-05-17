<footer class="footer_area section_padding_130_0">
      <div class="container" >
        <div class="row">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
              <div class="footer-logo mb-3"></div>
              <p>Residents Association of Ministry of Mines and Steel MidHill Estate Managment Suites.</p>
              <!-- Copywrite Text-->
              
              <!-- Footer Social Area-->
              <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">About</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="/about_us.php">About Us</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                 </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Support</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Support</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Contact</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Contact Us</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
          <p>©&nbsp; Ejosy Tech Consult Ltd 2022. All Rights Reserved.</p>
      </div>
    </footer>
       
   
      
            
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>


<script>
  const preamount = document.querySelector('#preamount');
    const postamount = document.querySelector('#postamount');
   
    preamount.addEventListener('input', function () 
        {  
            let var_val = this.value;
            
                if (Number(var_val)===0)
             {
                  fin_val = 0;
             }
            else
           if (Number(var_val)>2500)
            {            
            fin_val = Number(var_val) * 0.015 + 200; // paystack = Number(var_val) * 0.015 + 200; ejosy = 100
            }
            else 
            {
             fin_val = Number(var_val) * 0.015 + 50; // paystack = Number(var_val) * 0.015; ejosy = 100
            }
            
            let sum = Number(fin_val) + Number(var_val); 
            //let str = n.toLocaleString("en-US");
  
            postamount.value = sum; 
            
      
        });
</script>


<script>
$(document).ready(function(){
   $("#payModal").on('hidden.bs.modal', function()
  {
   
   const postamount = document.getElementById("postamount");
    const amount = document.getElementById("amount");
    
    amount.value = postamount.value;
   
    
  });
});
</script>

<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
return new bootstrap.Popover(popoverTriggerEl)
})
</script>



  </body>     