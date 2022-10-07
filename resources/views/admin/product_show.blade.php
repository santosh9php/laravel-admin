<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">

                       <div class="col-lg-4 mb-4">
                           @can('product-delete')
                             <form id="bulk_delete_form" method="GET" action="{{ route('admin_product_show') }}">
                                <label class="form-label">Bulk Delete </label>
                                <div>
                                   <select class="form-control wide" id="bulk_delete" name="status" >
                                     <option value="">Choose Action</option>
                                     <option value="bulk_delete" >Bulk Delete</option>
                                  </select>
                                  <input type="hidden" name="product_bulk_delete_ids" id="product_bulk_delete_ids" value="">
                                </div>
                             </form>
                           @endcan
                       </div>
                       <div class="col-lg-4 mb-4">

                           @can('product-edit')
                             <form id="change_status_form" method="GET" action="{{ route('admin_product_show') }}">
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
                           @endcan
                       </div>
                      
                       <div class="col-lg-4 mb-4">
                           <form method="GET" action="{{ route('admin_product_show') }}">
                             <label class="form-label">Search By product Name </label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                       </div>

                      <div class="clearfix"></div>

                       <div class="col-lg-4 mb-3">
                          <form method="GET" action="{{ route('admin_product_show') }}">
                             <label class="form-label"> Filter By Category</label>
                             <div>
                                <select class="form-control" id="single-select" name="search_by_category" onchange="this.form.submit()">
                                   <option value="">Select Category</option>
                                   @if($categories)
                                      @foreach($categories as $category)
                                         <?php $dash=''; ?>
                                         <option value="{{$category->id}}" @if(app('request')->input('search_by_category') == $category->id) selected @endif>{{$category->name}}</option>
                                         @if(count($category->subcategory))
                                            @include('admin.product.subCategory_search',['subcategories' => $category->subcategory])
                                         @endif
                                      @endforeach
                                   @endif
                                </select>
                             </div>
                          </form>
                       </div>

                      

                       <div class="col-lg-4 mb-3"></div>
                    
                       <div class="col-lg-4 mb-3">
                          <form method="GET" action="{{ route('admin_product_show') }}">
                             <label class="form-label">Order By </label>
                             <div>
                                <select class=" form-control" id="single-select-order-by" name="order_by" onchange="this.form.submit()">
                                   <option value="">Select Order By</option>

                                   <option value="product_name_asc" @if(app('request')->input('order_by') == 'product_name_asc') selected @endif >By Product Name Asc</option>

                                   <option value="product_name_desc" @if(app('request')->input('order_by') == 'product_name_desc') selected @endif >By Product Name Desc</option>

                                   <option value="sale_price_asc" @if(app('request')->input('order_by') == 'sale_price_asc') selected @endif >By Sale Price Asc</option>

                                   <option value="sale_price_desc" @if(app('request')->input('order_by') == 'sale_price_desc') selected @endif >By Sale Price Desc</option>

                                   <option value="created_at_asc" @if(app('request')->input('order_by') == 'created_at_asc') selected @endif >By Created Date Asc</option>

                                   <option value="created_at_desc" @if(app('request')->input('order_by') == 'created_at_desc') selected @endif >By Created Date Desc</option>

                                   <option value="status_active" @if(app('request')->input('order_by') == 'status_active') selected @endif >By Active Products</option>

                                   <option value="status_inactive" @if(app('request')->input('order_by') == 'status_inactive') selected @endif >By Inactive Products</option>



                                   <option value="views_asc" @if(app('request')->input('order_by') == 'views_asc') selected @endif >By Views Asc</option>

                                   <option value="views_desc" @if(app('request')->input('order_by') == 'views_desc') selected @endif >By Views Desc</option>

                                   <option value="featured" @if(app('request')->input('order_by') == 'featured') selected @endif >By Featured products</option>
                           
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
                           @php 
                              session(['product_counter' => 1]);
                           @endphp
                            @foreach($products as $product)

                              <tr>
                                 <td>

                                  <div class="form-check">
                                         <input class="form-check-input product_check" type="checkbox" name="product_ids" id="product_ids" value="{{$product->id}}"  >
                                   </div>

                                 
                                 </td>
                                 <td style="text-align:center;">

                                    {{ session('product_counter')}}
                                    @php 
                                       session(['product_counter' => session('product_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$product->name}}</div>
                                 </td>

                                 <td style="text-align:center;">
                                    @php
                                       $count = 0;
                                       $categories = $product->productCat()->orderBy('name')->get();

                                       foreach($categories as $category){
                                          if($count != 0)
                                             echo '&nbsp;,&nbsp;';
                                          else 
                                             $count=1;
                                          echo $category->name;
                                          
                                       }
                                       
                                    @endphp

                                 </td>

                                 <td style="text-align:center;">
                                    @if($product->featured)
                                       Yes
                                    @else
                                       No
                                    @endif
                                 </td>

                                 <td style="text-align:center;">{{$product->views}}</td>
                                 <td align="center">
                                    <a href=""  data-product="{{ $product->id }}" data-toggle="modal" data-target="#viewProductModal{{ $product->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;"><i class="fa fa-circle text-success me-1"></i> {{$product->status}}
                                 </td>
                                 <td style="text-align:center;">
                                    @can('product-edit') 
                                       <a href="{{route('admin_product_edit',[$product->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan

                                    @can('product-delete')
                                       <a href=""  data-product="{{ $product->id }}" data-toggle="modal" data-target="#delete_product" class="btn btn-danger shadow btn-xs sharp product_delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                     
                                 </td>
                              </tr>
                              @include('admin.model.view_product')

                           @endforeach
                           <tr><td colspan="12">
                                 <div class="d-flex justify-content-center">
                                     {{ $products->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
