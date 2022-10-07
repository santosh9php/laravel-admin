<?php
   $faq_category_add_form="hide";
   if($errors->first() or Session::get('open_add_form') == "show"){
      $faq_category_add_form="show";
   } 
   if(Route::currentRouteName() == 'admin_faq_category_show'){
      edit_redirect_query_string('admin_faq_category_show');
   }
?>



<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Faq Categories Management</h4>
            </div>
         </div>

         <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <button class="btn btn-success faq_category_add_button" > Add Faq Category </button>
         </div>
      </div>

      <?php if(Session::has('success') || Session::has('error')): ?>
         <div class="row page-titles mb-0 border-bottom mx-0">
            <div class="col-sm-12 p-md-0">
               <div class="welcome-text">
                  
                  <?php if(Session::has('success')): ?>
                     <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px;">  
                     <?php echo Session::get('success'); ?>

                     </h4>
                  <?php endif; ?>

                     <?php if(Session::has('error')): ?>
                        <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px;">
                        <?php echo Session::get('error'); ?>

                        </h4>
                     <?php endif; ?>
                  
               </div>
            </div>
         </div>

      <?php endif; ?>

      <div class="col-lg-12">
         
         <?php echo $__env->make('admin.faq_category_add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         
      </div>
      <?php echo $__env->make('admin.faq_category_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
   </div>
  </div>

   <!--For Model -->
   <!-- Delete faq_category -->
    <?php echo $__env->make('admin.model.delete_faq_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
   <!-- End of delete faq_category -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>
  <script type="text/javascript">

     $(document).ready(function(){

         $(".status").select2();

         $("#change_status").select2();

         var open_add_form ='<?php echo $faq_category_add_form; ?>';
         if(open_add_form == 'hide'){
            $('#faq_category_add_model').hide();
         } else {
            $('#faq_category_add_model').show();
         }

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='cat_ids']:checked"), function () {
               open.push($(this).val());
            });
             //alert("We remain open on: " + open.join(", "));
             //alert($("#change_status").val());
            if($("#bulk_delete").val() != ""){
               if(open.length < 1){
                  alert("Checked at least one record.")
                  $("#bulk_delete").val('');
                  document.getElementById("bulk_delete").selectedIndex = "0";
                  //$("select#change_status")[0].selectedIndex = 0;
                  //$('#change_status option:nth-child(1)').val();
               } else{
                  $("#faq_category_bulk_delete_ids").val(open.join(", "));
                  $("#bulk_delete_form").submit();
               }
            } 
           
         });

         $("#change_status").change(function(){
            var open = [];
            $.each($("input:checkbox[name='cat_ids']:checked"), function () {
               open.push($(this).val());
            });
             //alert("We remain open on: " + open.join(", "));
             //alert($("#change_status").val());
            if($("#change_status").val() != ""){
               if(open.length < 1){
                  alert("Checked at least one record.")
                  $("#change_status").val('');
                  $("#change_status").trigger("change.select2");
                  //$("select#change_status")[0].selectedIndex = 0;
                  //$('#change_status option:nth-child(1)').val();
               } else{
                  let status = confirm("Are you sure to change the status of selected records?");
                  if(status){
                     $("#faq_category_status_ids").val(open.join(", "));
                     $("#change_status_form").submit();
                  } else {

                     $("#change_status").val('');
                     $("#change_status").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".faq_category_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("faq_category");
            $("#faq_category_id").val(id);
            //var token = $("meta[name='csrf-token']").attr("content");
            //alert($("#faq_category_id").val());
          });

         //$('#faq_category_add_model').hide();
         $('.faq_category_add_button').click(function(){

            $('#faq_category_add_model').toggle();
         });

         $('#faq_category_hide_form').click(function(){

            $('#faq_category_add_model').hide();
         });

         //For Tree view of faq_category
         var toggler = document.getElementsByClassName("caret");
         var i;
         for (i = 0; i < toggler.length; i++) {
           toggler[i].addEventListener("click", function() {
             this.parentElement.querySelector(".nested").classList.toggle("active");
             this.classList.toggle("caret-down");
           });
         }
         //End of tree view


         //For all faq category check and uncheck

            $('#faq_cat_all_check').click(function() {
                $('.faq_cat_check').prop('checked', this.checked); 
            });

         //End of all faq category check and uncheck

      });

      
  </script>


 
 
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/faq_category.blade.php ENDPATH**/ ?>