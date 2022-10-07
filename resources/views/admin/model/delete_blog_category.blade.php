<div class="modal fade" id="blog_delete_cat">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <form method="POST" action="{{ route('admin_delete_blog_category_show') }}">
         @csrf
         <input type="hidden" name="_method" value="DELETE">
         <div class="modal-content">
            <div class="modal-body text-center p-5">
               <h2>Are you sure to delete ?
                <input type="hidden" id="blog_category_id" name="blog_category_id" value="" ></h2>
               <br>
               <!--  <p>You will not be able to recover this imaginary file !!</p> -->
               <button type="button" class="btn btn-danger light" data-dismiss="modal">Cancel</button> &nbsp;
               <button type="submit" class="btn btn-primary">Yes, delete it !!</button>
            </div>
         </div>
      </form>
   </div>
</div> 