

<?php $__env->startSection('body-content'); ?>


<div class="container">
    <ul class="breadcrumb"> 
       <li><a href="<?php echo e(url()->previous()); ?>">Back</a></li>
    </ul>
</div>

<br />


<div class="main-container container">

        <div class="row">
 
            <div id="content" class="col-md-12 col-sm-8">
                
                <div class="product-view">
                    <div class="left-content-product">
                        <div class="row">
                            <div class="content-product-left col-md-6 col-sm-12 col-xs-12">
                                <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                    
                                    <ul class="thumb-vertical">

                                        <?php
                                            $product_img_arr=array();
                                            $images = json_decode($product->images,true);
                                            if(is_array($images)){
                                                $i=0;
                                                $image_show='n';
                                                foreach($images as $image){
                                                    if(Storage::exists($image)){
                                                        array_push($product_img_arr,Storage::url($image));
                                        ?>
                                          

                                           <li class="owl2-item">
                                                <a data-index="<?php echo e($i); ?>" class="img thumbnail" data-image="<?php echo e(Storage::url($image)); ?>">
                                                    <img src="<?php echo e(Storage::url(findSTPath($image))); ?>" alt="<?php echo e($product->image_attr); ?>">
                                                </a>
                                            </li>
                                         
                                        <?php
                                                        $image_show='y';
                                                        $i++;
                                                    }
                                                }
                                            }

                                        if($image_show=='n'){
                                        ?>
                                        <img src="<?php echo e(Storage::url('media/product/default/productDefaultImage.webp')); ?>" class="img-1 img-responsive" alt="" />
                                        <?php
                                            }
                                        ?>
                                    </ul>                                                           
                                </div>
                                <div class="large-image  vertical">

                                    <?php
                                       $images = json_decode($product->images,true);
                                       if(is_array($images)){
                                          $image_show='n';
                                          foreach($images as $image){
                                             if(Storage::exists($image)){
                                    ?>
                                                <img itemprop="image" class="product-image-zoom" src="<?php echo e(Storage::url($image)); ?>" data-zoom-image="<?php echo e(Storage::url($image)); ?>">
                                    <?php
                                        $image_show='y';
                                        break;
                                            }
                                         }
                                      }
                                    if($image_show=='n'){
                                    ?>
                                        <img itemprop="image" class="product-image-zoom" src="<?php echo e(Storage::url('media/product/default/productDefaultImage.webp')); ?>" data-zoom-image="<?php echo e(Storage::url('media/product/default/productDefaultImage.webp')); ?>">

                                    <?php
                                        }
                                    ?>

                                    <div class="product_detail_partno"><?php echo e($product->part_no); ?></div>
                                </div>
                                <!--<a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>-->
                                
                            </div>

                            <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                                <div class="title-product">
                                    <h1><?php echo e($product->name); ?></h1>
                                </div>
                                <!-- Review ---->
                                <!--
                                <div class="box-review form-group">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>

                                    <a class="reviews_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>  | 
                                    <a class="write_review_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                                </div>
                            -->

                                <div class="product-label form-group">
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                        <?php echo showProductPrice($product->regular_price, $product->sale_price); ?>

                                    </div>
                                    <!--<div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>-->
                                </div>

                                <div class="product-box-desc">
                                    <div class="inner-box-desc">
                                        <?php if($product->part_no): ?>
                                            <div class="brand"><span>Part No. : </span><?php echo e($product->part_no); ?></div>
                                        <?php endif; ?>
                                        <?php if($product->brand): ?>
                                            <div class="brand"><span>Brand : </span><?php echo e($product->brand); ?></div>
                                        <?php endif; ?>
                                        <?php if($product->package_include): ?>
                                            <div class="brand"><span>Package Include : </span><?php echo e($product->package_include); ?></div>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>

                                <div class="short_description form-group">
                                     <?php echo $product->short_description; ?>

                                </div>
                        <?php if(Auth::check()): ?>
                            <?php if(Auth::user()->role == 'dealer' && $product->sale_price > 0): ?>  
                                <div>
                                    <div class="form-group" >
                                        <div class="input-box">
 
                                                <div class="pull-left">
                                                    <label class="qty_label">Quantity : </label>
                                                </div>
                                                <div class="pull-left">                                      
                                                    <input class="form-control quantity update-cart qty_inp f" id="addtocart_quantity" type="number" value="1" step="1" min="1"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only"   /></div>
                                                <div class="clearfix"></div>
                                            

                                        </div>
                                        <div class="input-box" id="addtocart_price_box">
 
                                                <div class="pull-left">
                                                  <label>Price : </label>
                                                </div>
                                                <div class="pull-left">  
                                                 <span id="addtocart_price" class="price">
                                                     <?php echo showProductPrice($product->regular_price, $product->sale_price); ?>

                                                </span>                                    
                                                    </div>
                                                <div class="clearfix"></div>
                                               
                                        </div>

                                     

                                        <div class="input-box" id="addtocart_button">
                                            <div id="addtocart_loader"> </div>
                                            <p class="btn-holder">
                                                <button type="button" id="addtocart_product" class="continue_shopping">Add to cart</button> &nbsp;

                                                <?php if(Auth::check()): ?>
                                                    <button class="checkout" type="button" id="addtocart_wishlist">Add to wishlist</button>
                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>" />
                                                <?php else: ?>
                                                    <button class="checkout" type="button" id="addtocart_wishlist"><a href="<?php echo e(route('user_login')); ?>">Add to wishlist</a></button>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                   
                                        

                                        <input type="hidden" name="addtocart_product_id" id="addtocart_product_id" value="<?php echo e($product->id); ?>" />

                                        <input type="hidden" name="addtocart_regular_price" id="addtocart_regular_price" value="<?php echo e($product->regular_price); ?>" />

                                        <input type="hidden" name="addtocart_sale_price" id="addtocart_sale_price" value="<?php echo e($product->sale_price); ?>" />

                                        <input type="hidden" name="siteCurrentcy" id="siteCurrentcy" value="<?php echo e(siteCurrentcy()); ?>" />

                                        <input type="hidden" name="product_partno" id="product_partno" value="<?php echo e($product->part_no); ?>" />

                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>        

                            </div>
                        </div>
                    </div>
                    
                
                </div>
                
                <!-- Product Tabs -->
                <div class="producttab ">
                    <div class="tabsslider horizontal-tabs  col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                            
                        </ul>
                        <div class="tab-content col-xs-12">
                            <div id="tab-1" class="tab-pane fade active in">
                                
                                <?php echo $product->long_description; ?>

                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->
              
                
            </div>
         
        </div>
        
    </div>




                <!-- Related Products -->
                    <?php echo $__env->make('relatedProducts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- end Related  Products-->
  


    <?php echo $__env->make('modal.add_tocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('modal.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">

    var product_img_arr = <?php echo json_encode($product_img_arr) ?>;
    var product_img_obj={};
    for (var i = 0; i < product_img_arr.length; i++)
    {
        var temp_obj ={};
        temp_obj['src'] = product_img_arr[i];
        product_img_obj[i] = temp_obj;
    }
    //console.log( Object.values(product_img_obj));

    $(document).ready(function() {
    var zoomCollection = '.large-image img';
    $( zoomCollection ).elevateZoom({
        zoomType    : "inner",
        lensSize    :"200",
        easing:true,
        gallery:'thumb-slider-vertical',
        cursor: 'pointer',
        galleryActiveClass: "active"
    });


    $('.large-image').magnificPopup({
         
        items: Object.values(product_img_obj),
        gallery: { enabled: true, preload: [0,2] },
        type: 'image',
        mainClass: 'mfp-fade',
        callbacks: {
            open: function() {
                var product_partno = $("#product_partno").val();
                $('.mfp-bottom-bar').append('<div class="product_detail_popup_partno">'+product_partno+'</div>');
                console.log(product_partno);
                var activeIndex = parseInt($('#thumb-slider-vertical .img.active').attr('data-index'));
                var magnificPopup = $.magnificPopup.instance;
                magnificPopup.goTo(activeIndex);
            }
        }
    });
    $("#thumb-slider-vertical .owl2-item").each(function() {
        $(this).find("[data-index='0']").addClass('active');
    });
    
    $('.thumb-video').magnificPopup({
      type: 'iframe',
      iframe: {
        patterns: {
           youtube: {
              index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
              id: 'v=', // String that splits URL in a two parts, second part should be %id%
              src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                },
            }
        }
    });
    
    $('.product-options li.radio').click(function(){
        $(this).addClass(function() {
            if($(this).hasClass("active")) return "";
            return "active";
        });
        
        $(this).siblings("li").removeClass("active");
        $(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
    });
    
    var _isMobile = {
      iOS: function() {
       return navigator.userAgent.match(/iPhone/i);
      },
      any: function() {
       return (_isMobile.iOS());
      }
    };
    
    $(".thumb-vertical-outer .next-thumb").click(function () {
        $( ".thumb-vertical-outer .lSNext" ).trigger( "click" );
    });

    $(".thumb-vertical-outer .prev-thumb").click(function () {
        $( ".thumb-vertical-outer .lSPrev" ).trigger( "click" );
    });

    $(".thumb-vertical-outer .thumb-vertical").lightSlider({
        item: 3,
        autoWidth: false,
        vertical:true,
        slideMargin: 10,
        verticalHeight:330,
        pager: false,
        controls: true,
        prevHtml: '<i class="fa fa-angle-up"></i>',
        nextHtml: '<i class="fa fa-angle-down"></i>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    verticalHeight: 215,
                    item: 2,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    verticalHeight: 240,
                    item: 2,
                    slideMargin: 5,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    verticalHeight: 340,
                    item: 3,
                }
            }
            ,
            {
                breakpoint: 480,
                settings: {
                    verticalHeight: 100,
                    item: 1,
                }
            }

        ]
        
    });

    
    
    // Product detial reviews button
    $(".reviews_button,.write_review_button").click(function (){
        var tabTop = $(".producttab").offset().top;
        $("html, body").animate({ scrollTop:tabTop }, 1000);
    });

     $("#addtocart_quantity").keyup(function(e){

            let siteCurrentcy =$('#siteCurrentcy').val();

            let code = event.keyCode || event.charCode;

            if(code >= 48 && code <= 57){

                let quantity = $('#addtocart_quantity').val();

                let regular_price = $('#addtocart_regular_price').val();

                let sale_price = $('#addtocart_sale_price').val();

                let total_price=0;



                if(parseFloat(sale_price) != parseFloat(regular_price)){
                    total_price = '<span class="price-new">'+siteCurrentcy+(sale_price * quantity).toFixed(2)+'</span>';
                    total_price += '<span class="price-old">'+siteCurrentcy+(regular_price * quantity).toFixed(2)+'</span>';

                }else{
                    total_price = '<span class="price">'+siteCurrentcy+(sale_price * quantity).toFixed(2)+'</span>';

                }
                $("#addtocart_price").html(total_price);

                if(parseInt(quantity) == 0){
                    $("#addtocart_button").hide();
                    $("#addtocart_price_box").hide();
                } else {
                    $("#addtocart_button").show();
                    $("#addtocart_price_box").show();
                }
            }
        })

        $("#addtocart_quantity").change(function(e){

            let siteCurrentcy =$('#siteCurrentcy').val();

            let quantity = $('#addtocart_quantity').val();

            let regular_price = $('#addtocart_regular_price').val();

            let sale_price = $('#addtocart_sale_price').val();

            let total_price=0;

            if(parseInt(quantity) == 0){
                $("#addtocart_button").hide();
                $("#addtocart_price_box").hide();
            } else {
                $("#addtocart_button").show();
                $("#addtocart_price_box").show();
            }

            if(parseFloat(sale_price) != parseFloat(regular_price)){
                total_price = '<span class="price-new">'+siteCurrentcy+(sale_price * quantity).toFixed(2)+'</span>';
                total_price += '<span class="price-old">'+siteCurrentcy+(regular_price * quantity).toFixed(2)+'</span>';

            }else{
                total_price = '<span class="price">'+siteCurrentcy+(sale_price * quantity).toFixed(2)+'</span>';

            }
            $("#addtocart_price").html(total_price);
        })

        $("#addtocart_product").click(function (){

            let product_id = $('#addtocart_product_id').val();

            let quantity = $('#addtocart_quantity').val();

            $.ajax({
                    type: 'GET',
                    url:  '/add-to-cart',
                    dataType: 'json',
                    data:{'product_id':product_id,'quantity':quantity, _token: '<?php echo e(csrf_token()); ?>'},
                    beforeSend: function(){
                        $('#addtocart_loader').show();
                    },
                    complete: function(){
                        $('#addtocart_loader').hide();
                    },
                    success: function (data) {
                       //console.log(data);
                      // alert(data.message);
                       $('#cart_total_items').text(data.cart_total_items);
                       $('#cart_total_prices').text(data.cart_total_prices);
                       $('#cart_each_item').html(data.cart_each_item);
                       $('#addtocart_message').text(data.message);
                       $("#addtocart_modal").modal('show');
                       $('#addtocart_quantity').val(1);
                       $('#addtocart_quantity').trigger("change");
                    },
                    error: function (requestObj, textStatus, errorThrown) {
                        console.log(requestObj);
                        //alert(requestObj.message);
                        $('#addtocart_message').text('Some issue occured.');
                        $('#addtocart_modal').modal('show');
                    },
                });

        });

         $("#addtocart_wishlist").click(function (){

            let product_id = $('#addtocart_product_id').val();

            let user_id = $('#user_id').val();

            let quantity = $('#addtocart_quantity').val();

            $.ajax({
                    type: 'GET',
                    url:  '/add-to-wishlist',
                    dataType: 'json',
                    data:{'product_id':product_id,'user_id':user_id,'quantity':quantity, _token: '<?php echo e(csrf_token()); ?>'},
                    beforeSend: function(){
                        $('#addtocart_loader').show();
                    },
                    complete: function(){
                        $('#addtocart_loader').hide();
                    },
                    success: function (data) {
                       //console.log(data);
                      // alert(data.message);
                       $('#wishlist-total').prop('title', data.totalRecord);
                       $('#wishlist_message').text(data.message);
                       $("#wishlist_modal").modal('show');
                       $('#addtocart_quantity').val(1);
                       $('#addtocart_quantity').trigger("change");
                    },
                    error: function (requestObj, textStatus, errorThrown) {
                        console.log(requestObj);
                        //alert(requestObj.message);
                        $('#wishlist_message').text('Some issue occured.');
                        $('#wishlist_modal').modal('show');
                    },
                });

        });

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/productDetail.blade.php ENDPATH**/ ?>