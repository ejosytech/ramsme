                 
     <footer class="footer_area section_padding_130_0">
      <div class="container" >
        <div class="row">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
              <div class="footer-logo mb-3"></div>
              <p>Residents Association of Ministry of Mines and Steel MidHill Estate Management Suite.</p>
              <!-- Copywrite Text-->
              <div class="copywrite-text mb-5">
                <p class="mb-0">Made with <i class="lni-heart mr-1"></i>by<a class="ml-1" href="https://ejosytechconsult.com"> Ejosy Tech Consult Ltd</a></p>
              </div>
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
                  <li><a href="about_us.php">About Us</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                  <li><a href="#">Community</a></li>
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
                  <li><a href="#">Privacy Policy</a></li>
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


   
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>  

<script>
     $('.pagelink').on('click', function(e) {
         
          theURL = $(this).attr('href');
          alert(theURL);
           e.preventDefault();

     //var postID = $(this).data('postId');
      //  alert('I\'m about to delete the post with id: [' + postID + ']');
});
     </script>

        <script>
            $(document).ready(function(){
        $(".pagelink").click(function(e){
          theURL = $(this).attr('href');
          alert(theURL);
          console.log(theURL); // can be removed just included for testing
          e.preventDefault();
            $.ajax({url: theURL,
                    success: function(result){
                     $("#viewresponseupdate_sec_reg").html(result);
                     }});
        });
    });
     </script>
 
    
<script>
    // handle form load and refresh
   window.onload = function() { // can also use window.addEventListener('load', (event) => {
    //alert('Page loaded');
    
              var autoclickreg = document.getElementById("submitreg");
            autoclickreg.click();
              
              var autoclickupd = document.getElementById("submitupd");
              autoclickupd.click();
              
            

  };
    // handle form submit
        function submitFormData_reg(event) 
        {

            // form values
            var mobile_no = event.mobile_no.value;
            var start_date = event.start_date.value;
            var end_date = event.end_date.value;

            var data = new FormData();
            data.append('mobile_no', mobile_no);
            data.append('start_date', start_date);
            data.append('end_date', end_date);

            var http = new XMLHttpRequest();

            //var url = 'infr_pay_update_details_add.php';
             var url = 'sec_pay_update_details_add.php';
            http.open('POST', url, true);

            http.onreadystatechange = function() {
                if (http.readyState == 4 && http.status == 200) {
                    //alert("Form submitted successfully");
                      document.getElementById("viewresponseupdate_sec_reg").innerHTML = this.responseText;
                     //document.getElementById("viewresponseupdate_infr_reg").src='infr_pay_update_details_add.php';
                    //document.getElementById("frmdata").reset();
                    //console.log(http.responseText);
                }
            }
            http.send(data);
        }
        
        
        // handle form submit
        function submitFormData_upd(event) 
        {

            // form values
            var mobile_no = event.mobile_nox.value;
            var start_date = event.start_datex.value;
            var end_date = event.end_datex.value;

            var data = new FormData();
            data.append('mobile_no', mobile_no);
            data.append('start_date', start_date);
            data.append('end_date', end_date);

            var http = new XMLHttpRequest();

            var url = 'sec_pay_update_details_edit.php';
            http.open('POST', url, true);

            http.onreadystatechange = function() {
                if (http.readyState == 4 && http.status == 200) {
                    //alert("Form submitted successfully");
                    document.getElementById("viewresponseupdate_sec_upd").innerHTML = this.responseText;
                    //document.getElementById("frmdata").reset();
                    //console.log(http.responseText);
                }
            }
            http.send(data);
        }
    
    

</script>  
  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"sec_pay_update_details_add.php",  
                method:"POST",  
                data:{
                       page:page,
                       
                         }, 
                    success:function(data){  
                     $('#viewresponseupdate_sec_reg').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.add_pagination_link', function()
      {  
           var page = $(this).attr("id");  
          // alert(page);
           load_data(page);  
      });
      $(document).on('click', '.add_link', function()
      {  
          var entry = $(this).attr("id");
          alert('The Selected Payment Record will be Added as a Confirmed Payment');
          $.ajax({  
                url:"sec-add.php",  
                method:"POST",  
                data:{entry:entry},  
                success:function(data){  
                     $('#viewresponseupdate_sec_upd').html(data);  
                }  
           });    
      });
 });  
 </script>
 
 <script>  
 $(document).ready(function(){  
      load_data_edit();  
      function load_data_edit(page)  
      {  
           $.ajax({  
                url:"sec_pay_update_details_edit.php",  
                method:"POST",  
                data:{ 
                    page:page,         
                   },
                success:function(data){  
                     $('#viewresponseupdate_sec_upd').html(data);  
                }  
           });  
      }  
      $(document).on('click', '.edit_pagination_link', function()
      {  
           var page = $(this).attr("id");  
           //alert(page);
           load_data_edit(page);  
      });
     
      
 });  
 </script>
 
 
 
            
<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>


 </footer>


</body>