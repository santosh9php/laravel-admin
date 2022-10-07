</div> 
    <footer class="footer-container typefooter-3">
        <!-- Footer middle Container -->
        <div class="container">
            <div class="row footer-middle">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                    <div class="box-footer box-infos">
                        <div class="module">
                            <h3 class="modtitle">Contact us</h3>
                            <div class="modcontent">
                                <ul class="list-icon">
                                    <li><span class="icon pe-7s-map-marker"></span>SK Exports 1095/13 Naiwala Road, Karol Bagh, New Delhi- 110005</li>
                                    <li><span class="icon pe-7s-call"></span> <a href="#">+91-9999779791</a>, <a href="#">+91-9953472873</a></li>
                                    <li><span class="icon pe-7s-mail"></span><a href="mailto:Info@skexportsdelhi.com">Info@skexportsdelhi.com</a></li>
                                    <li><span class="icon pe-7s-alarm"></span>7 Days a week from 10-00 am to 6-00 pm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                    <div class="box-information box-footer">
                        <div class="module clearfix">
                            <h3 class="modtitle">Information</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="<?php echo e(route('static_page',['about-us'])); ?>">About Us</a></li>
                                    <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-clear">
                    <div class="box-service box-footer">
                        <div class="module clearfix">
                            <h3 class="modtitle">Segments</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                <?php
                                    $i=1;
                                    foreach($randomFooterBrands as $brand){
                                        echo '<li><a href="'.route('segment_product_search',[$brand->slug]).'">'.$brand->name.'</a></li>';
                                        $i++;
                                        if($i > 6) break;
                                    }
                                ?>   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-socials">
                        <div class="socials-w">
                            <h3>Follow us by</h3>
                            <ul class="socials">
                                <li class="facebook"><a href="https://www.facebook.com/sk.autospares1967" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                
                                <li class="instagram"><a href="https://www.instagram.com/sk.autospares1967/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li class="linkedin"><a href="https://www.linkedin.com/company/sk-autospares/" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="module newsletter-footer1">
                            <div class="newsletter">
                                <h3 class="modtitle">Sign Up for Newsletter</h3>
                                <div class="block_content">
                                    <form method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">
                                        <div class="form-group">
                                            <div class="input-box">
                                                <input type="email" placeholder="Your email address..." value="" class="form-control" id="news_email" name="news_email" size="55">
                                            </div>
                                            <div class="subcribe">
                                                <button class="btn btn-primary btn-default font-title" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                                    <span>Subscribe</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Subscriber Modal -->

        <div class="modal fade" id="news_subs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Newsletter Subscriber</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="news_subs_msg"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- End Of Newsletter Subscriber Modal -->


        <!-- /Footer middle Container -->
        <!-- Footer Bottom Container -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="copyright col-lg-12">
                        <div>Autoparts © 2022 SK DISTRIBUTORS. All Rights Reserved. Designed by <a href="http://www.thinkgraphics.in/" target="_blank">Think Graphics</a></div> 
                    </div>
                </div>
            </div>
        </div> 
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>  
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery-2.2.4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/owl.carousel.js')); ?>"></script> 
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/slick.js')); ?>"></script>  
	<script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/libs.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery.unveil.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery.countdown.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery.dcjqaccordion.2.8.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/moment.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/modernizr-2.6.2.min.js')); ?>"></script> 
	<script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/jquery.miniColors.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/lightslider.js')); ?>"></script> 
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/application.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/homepage.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/toppanel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/so_megamenu.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/addtocart.js')); ?>"></script>  

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('frontend_assets/css/stellarnav.css')); ?>">

    <!-- jQuery UI library For Auto Suggestion -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <!--  End of jQuery UI library For Auto Suggestion -->

     
    <!-- product-grid -->
    <script type="text/javascript"> 

             if($.cookie('display')){
                 view = $.cookie('display');
             }else{
                 view = 'grid';
             }
             if(view) display(view);
         
      </script> 

    <script type="text/javascript" src="<?php echo e(asset('frontend_assets/js/stellarnav.min.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery('.stellarnav').stellarNav({
                 
                breakpoint: 960,
                position: 'right',
                phoneBtn: '18009997788',
                locationBtn: 'https://www.google.com/maps'
            });
        });
    </script>
    <!--This page took <?php echo e((microtime(true) - LARAVEL_START)); ?> seconds to render -->
    




</body>
</html>
<?php if(Auth::check()): ?>
    <?php if(Auth::user()->role == 'dealer'): ?>
      <script type="text/javascript">
        $(document).ready(function(){
           // $(".price").css({"display":"block !important"});

           $(".price").attr("style", "display:block !important;");
        });
      </script>  
    <?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#keyword_search").autocomplete({
            source: function(request, response) {
               $.ajax({
                   type: 'GET',
                   url: "<?php echo e(url('/keyword_search_auto_sugg')); ?>",
                   data: {
                        term : request.term,_token: '<?php echo e(csrf_token()); ?>'
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            const temp = {
                              name: obj.name,
                            };
                            return temp;
                        }); 
                        response(resp);
                    },
                    error: function (requestObj, textStatus, errorThrown) {
                        console.log(requestObj);
                    },
               });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#keyword_search").val(ui.item.name);
                $("#keyword_search_form").submit();
            }
        }).data("ui-autocomplete")._renderItem = function( ul, item ) {
            return $( "<li class='ui-autocomplete-row'></li>" )
                .data( "item.autocomplete", item )
                .append( item.name )
                .appendTo( ul );
        };
    });
</script>

<script type="text/javascript">


    function hideLoader(){
       $('#loader').fadeOut(1000);  
    }


    $(document).ready(function(){
        //For stop page loader
       setTimeout(hideLoader, 500);

        $(".custom-cates .contentslider .owl2-height").css('height','385');

        $("#submit_search").click(function(){

            if($("#keyword_search").val() == "")
            {
                alert("Please enter the value in search box.");
                $("#keyword_search").focus();
                return false;
            }

            /*
            if($("#category_search").val() == "" && $("#brand_search").val() == "")
            {
                alert("Please select a vehicle type then select segment.");
                $("#keyword_search").focus();
                return false;
            }
            */
        });
    });

    function subscribe_newsletter()
    {
        var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var email = $('#news_email').val();
        var d = new Date();
        var createdate = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
        var status   = 0;
        var dataString = 'email='+email+'&createdate='+createdate+'&status='+status;
        if(email != "")
        {
            if(!emailpattern.test(email))
            {
                $('.show-error').remove();
                $('.send-mail').after('<span class="show-error" style="color: red;margin-left: 10px"> Invalid Email </span>')
                return false;
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    url:  '/addNewsletterSubscriber',
                    dataType: 'json',
                    data:{'email':email, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                      // console.log(data);
                       $('#news_subs_msg').text(data.message);
                       $('#news_subs').modal('show');
                       $('#news_email').val('');

                    },
                    error: function (data, textStatus, errorThrown) {
                        //console.log(data);
                       $('#news_subs_msg').text(data.message);
                       $('#news_subs').modal('show');
                    },
                });
                return false;
                /*
                $.ajax({
                    url: 'index.html?route=extension/module/so_newletter_custom_popup/newsletter',
                    type: 'post',
                    data: dataString,
                    dataType: 'json',
                    success: function(json) {
                        $('.show-error').remove();
                        if(json.message == "Subscription Successfull") {
                            checkCookie();
                            $('.send-mail').after('<span class="show-error" style="color: #003bb3;margin-left: 10px"> ' + json.message + '</span>');
                            setTimeout(function () {
                                var this_close = $('.popup-close');
                                this_close.parent().css('display', 'none');
                                this_close.parents().find('.so_newletter_custom_popup_bg').removeClass('popup_bg');
                            }, 3000);

                        }else{
                            $('.send-mail').after('<span class="show-error" style="color: red;margin-left: 10px"> ' + json.message + '</span>');
                        }
                        document.getElementById('signup').reset();
                    }
                });
                */
                return false;
            }
        }
        else
        {
            alert("Email Is Require");
            $(email).focus();
            return false;
        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/common/footer.blade.php ENDPATH**/ ?>