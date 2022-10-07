<div class="modal fade" id="delete_blog_post">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <form method="POST" action="<?php echo e(route('admin_delete_blog_post_show')); ?>">
         <?php echo csrf_field(); ?>
         <input type="hidden" name="_method" value="DELETE">
         <div class="modal-content">
            <div class="modal-body text-center p-5">
               <h2>Are you sure to delete ?
                <input type="hidden" id="blog_post_id" name="blog_post_id" value="" ></h2>
               <br>
               <!--  <p>You will not be able to recover this imaginary file !!</p> -->
               <button type="button" class="btn btn-danger light" data-dismiss="modal">Cancel</button> &nbsp;
               <button type="submit" class="btn btn-primary">Yes, delete it !!</button>
            </div>
         </div>
      </form>
   </div>
</div> <?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/delete_blog_post.blade.php ENDPATH**/ ?>