<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                       <div class="col-lg-4">
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-delete')): ?>
                               <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_news_subs_show')); ?>">
                                  <label class="form-label">Bulk Delete </label>
                                  <div>
                                      <select class=" form-control wide" id="bulk_delete" name="status" >
                                          <option value="">Choose Action</option>
                                          <option value="bulk_delete" >Bulk Delete</option>
                                      </select>
                                      <input type="hidden" name="news_subs_bulk_delete_ids" id="news_subs_bulk_delete_ids" value="">
                                  </div>
                               </form>
                           <?php endif; ?>
                       </div>
                       <div class="col-lg-4">
                           <form method="GET" action="<?php echo e(route('admin_news_subs_show')); ?>">
                              <label class="form-label"> Search By Email</label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="<?php echo e(app('request')->input('search_by_name')); ?>" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                       </div>
                   </div>
                  


                  


               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th class="check">
                                <input class="form-check-input" type="checkbox" name="news_all_check" id="news_all_check" value="all"  > 
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Email</strong></th>
                              <th style="width:280px;"><strong>Date</strong></th>
                              <th class="edit_delete"><strong>Delete</strong></th>
                                
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['news_subs_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $news_subss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news_subs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td>
                                    <div class="form-check">
                                         <input class="form-check-input news_check" type="checkbox" name="news_subs_ids" id="news_subs_ids" value="<?php echo e($news_subs->id); ?>"  >
                                     </div> 
                                 
                                 </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('news_subs_counter')); ?>

                                    <?php 
                                       session(['news_subs_counter' => session('news_subs_counter')+1]);
                                    ?>
                                 </td>

                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($news_subs->email); ?></div>
                                 </td>

                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e(date('j F, Y h:i:s A',strtotime($news_subs->created_at))); ?></div>
                                 </td>
                                 
                                 <td style="text-align:center;">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-delete')): ?> 
                                       
                                       <a href=""  data-news_subs="<?php echo e($news_subs->id); ?>" data-toggle="modal" data-target="#delete_news_subs" class="btn btn-danger shadow btn-xs sharp news_subs_delete"><i class="fa fa-trash"></i></a>

                                    <?php endif; ?>
                                   
                                 </td>
                              </tr>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($news_subss->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/news_subs_show.blade.php ENDPATH**/ ?>