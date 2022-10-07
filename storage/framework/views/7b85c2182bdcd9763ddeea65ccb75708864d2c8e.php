<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">

                       <div class="col-lg-4 mb-4">
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                             <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_product_show')); ?>">
                                <label class="form-label">Bulk Delete </label>
                                <div>
                                   <select class="form-control wide" id="bulk_delete" name="status" >
                                     <option value="">Choose Action</option>
                                     <option value="bulk_delete" >Bulk Delete</option>
                                  </select>
                                  <input type="hidden" name="product_bulk_delete_ids" id="product_bulk_delete_ids" value="">
                                </div>
                             </form>
                           <?php endif; ?>
                       </div>
                       <div class="col-lg-4 mb-4">

                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                             <form id="change_status_form" method="GET" action="<?php echo e(route('admin_product_show')); ?>">
                                 <label class="form-label"> Change Status</label>
                                <div>
                                   <select class="form-control wide" id="change_status" name="status" >
                                     <option value="">Choose Status</option>
                                     <option value="active" >Inactive To Active</option>
                                     <option value="inactive">Active To Inactive</option>
                                  </select>
                                  <input type="hidden" name="product_status_ids" id="product_status_ids" value="">
                                </div>
                             </form>
                           <?php endif; ?>
                       </div>
                      
                       <div class="col-lg-4 mb-4">
                           <form method="GET" action="<?php echo e(route('admin_product_show')); ?>">
                             <label class="form-label">Search By product Name </label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="<?php echo e(app('request')->input('search_by_name')); ?>" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                       </div>

                      <div class="clearfix"></div>

                       <div class="col-lg-4 mb-3">
                          <form method="GET" action="<?php echo e(route('admin_product_show')); ?>">
                             <label class="form-label"> Filter By Category</label>
                             <div>
                                <select class="form-control" id="single-select" name="search_by_category" onchange="this.form.submit()">
                                   <option value="">Select Category</option>
                                   <?php if($categories): ?>
                                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php $dash=''; ?>
                                         <option value="<?php echo e($category->id); ?>" <?php if(app('request')->input('search_by_category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                         <?php if(count($category->subcategory)): ?>
                                            <?php echo $__env->make('admin.product.subCategory_search',['subcategories' => $category->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php endif; ?>
                                </select>
                             </div>
                          </form>
                       </div>

                      

                       <div class="col-lg-4 mb-3"></div>
                    
                       <div class="col-lg-4 mb-3">
                          <form method="GET" action="<?php echo e(route('admin_product_show')); ?>">
                             <label class="form-label">Order By </label>
                             <div>
                                <select class=" form-control" id="single-select-order-by" name="order_by" onchange="this.form.submit()">
                                   <option value="">Select Order By</option>

                                   <option value="product_name_asc" <?php if(app('request')->input('order_by') == 'product_name_asc'): ?> selected <?php endif; ?> >By Product Name Asc</option>

                                   <option value="product_name_desc" <?php if(app('request')->input('order_by') == 'product_name_desc'): ?> selected <?php endif; ?> >By Product Name Desc</option>

                                   <option value="sale_price_asc" <?php if(app('request')->input('order_by') == 'sale_price_asc'): ?> selected <?php endif; ?> >By Sale Price Asc</option>

                                   <option value="sale_price_desc" <?php if(app('request')->input('order_by') == 'sale_price_desc'): ?> selected <?php endif; ?> >By Sale Price Desc</option>

                                   <option value="created_at_asc" <?php if(app('request')->input('order_by') == 'created_at_asc'): ?> selected <?php endif; ?> >By Created Date Asc</option>

                                   <option value="created_at_desc" <?php if(app('request')->input('order_by') == 'created_at_desc'): ?> selected <?php endif; ?> >By Created Date Desc</option>

                                   <option value="status_active" <?php if(app('request')->input('order_by') == 'status_active'): ?> selected <?php endif; ?> >By Active Products</option>

                                   <option value="status_inactive" <?php if(app('request')->input('order_by') == 'status_inactive'): ?> selected <?php endif; ?> >By Inactive Products</option>



                                   <option value="views_asc" <?php if(app('request')->input('order_by') == 'views_asc'): ?> selected <?php endif; ?> >By Views Asc</option>

                                   <option value="views_desc" <?php if(app('request')->input('order_by') == 'views_desc'): ?> selected <?php endif; ?> >By Views Desc</option>

                                   <option value="featured" <?php if(app('request')->input('order_by') == 'featured'): ?> selected <?php endif; ?> >By Featured products</option>
                           
                                </select>
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
                                 <input class="form-check-input" type="checkbox" name="product_all_check" id="product_all_check" value="all"  >
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th class="product"><strong>product</strong></th>
                              <th class="regular_price"><strong>Categories</strong></th>
                              <th class="featured"><strong>Featured</strong></th>
                              <th class="views"><strong>Views</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['product_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td>

                                  <div class="form-check">
                                         <input class="form-check-input product_check" type="checkbox" name="product_ids" id="product_ids" value="<?php echo e($product->id); ?>"  >
                                   </div>

                                 
                                 </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('product_counter')); ?>

                                    <?php 
                                       session(['product_counter' => session('product_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($product->name); ?></div>
                                 </td>

                                 <td style="text-align:center;">
                                    <?php
                                       $count = 0;
                                       $categories = $product->productCat()->orderBy('name')->get();

                                       foreach($categories as $category){
                                          if($count != 0)
                                             echo '&nbsp;,&nbsp;';
                                          else 
                                             $count=1;
                                          echo $category->name;
                                          
                                       }
                                       
                                    ?>

                                 </td>

                                 <td style="text-align:center;">
                                    <?php if($product->featured): ?>
                                       Yes
                                    <?php else: ?>
                                       No
                                    <?php endif; ?>
                                 </td>

                                 <td style="text-align:center;"><?php echo e($product->views); ?></td>
                                 <td align="center">
                                    <a href=""  data-product="<?php echo e($product->id); ?>" data-toggle="modal" data-target="#viewProductModal<?php echo e($product->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;"><i class="fa fa-circle text-success me-1"></i> <?php echo e($product->status); ?>

                                 </td>
                                 <td style="text-align:center;">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?> 
                                       <a href="<?php echo e(route('admin_product_edit',[$product->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                                       <a href=""  data-product="<?php echo e($product->id); ?>" data-toggle="modal" data-target="#delete_product" class="btn btn-danger shadow btn-xs sharp product_delete"><i class="fa fa-trash"></i></a>
                                    <?php endif; ?>
                                     
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="12">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($products->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/product_show.blade.php ENDPATH**/ ?>