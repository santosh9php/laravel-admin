<?php
   $bodypart_add_form="hide";
   if($errors->first() or Session::get('open_add_form') == "show"){
      $bodypart_add_form="show";
   } 
   if(Route::currentRouteName() == 'admin_bodypart_show'){
      edit_redirect_query_string('admin_bodypart_show');
   }
?>



<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">  Body Parts Management </h4>
            </div>
         </div>

         <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <button class="btn btn-success bodypart_add_button" > Add Body Part </button>
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
         
         <?php echo $__env->make('admin.bodypart_add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         
      </div>
      <?php echo $__env->make('admin.bodypart_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
  </div>

   <!--For Model -->
   <!-- Delete bodypart -->
   <?php echo $__env->make('admin.model.delete_bodypart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- End of delete bodypart -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>
  <script type="text/javascript">


     $(document).ready(function(){

         $("#change_status").select2();

         var open_add_form ='<?php echo $bodypart_add_form; ?>';
         if(open_add_form == 'hide'){
            $('#bodypart_add_model').hide();
         } else {
            $('#bodypart_add_model').show();
         }

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='bodypart_ids']:checked"), function () {
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
                  $("#bodypart_bulk_delete_ids").val(open.join(", "));
                  $("#bulk_delete_form").submit();
               }
            } 
           
         });

         $("#change_status").change(function(){
            var open = [];
            $.each($("input:checkbox[name='bodypart_ids']:checked"), function () {
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
                     $("#bodypart_status_ids").val(open.join(", "));
                     $("#change_status_form").submit();
                  } else {
                     $("#change_status").val('');
                     $("#change_status").trigger("change.select2");
                  }

               }
            } 
           
         });

         $(".bodypart_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("bodypart");
            $("#bodypart_id").val(id);
            
          });

         $('.bodypart_add_button').click(function(){

            $('#bodypart_add_model').toggle();
         });

         $('#bodypart_hide_form').click(function(){

            $('#bodypart_add_model').hide();
         });

         //For Tree view of category
            var toggler = document.getElementsByClassName("caret");
            var i;
            for (i = 0; i < toggler.length; i++) {
              toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
              });
            }
         //End of tree view

         $('#parent_bodypart input:checkbox').click(function() {
            $('#parent_bodypart input:checkbox').not(this).prop('checked', false);
         });

         $("#select_bodypart").select2({});


         //For all bodypart check and uncheck

            $('#bodypart_all_check').click(function() {
                $('.bodypart_check').prop('checked', this.checked); 
            });

         //End of all bodypart check and uncheck


      });

     
  </script>


 
 
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/bodypart.blade.php ENDPATH**/ ?>