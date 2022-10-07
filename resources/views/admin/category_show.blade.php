<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                   
                  <!--
                     <form id="bulk_delete_form" method="GET" action="{{ route('admin_category_show') }}">
                        <div>Bulk Delete</div>
                        <div class="input-group search-area right d-lg-inline-flex d-none">
                           <select class="form-control wide" id="bulk_delete" name="status" >
                             <option value="">Choose Action</option>
                             <option value="bulk_delete" >Bulk Delete</option>
                          </select>
                          <input type="hidden" name="category_bulk_delete_ids" id="category_bulk_delete_ids" value="">
                        </div>
                     </form>
                  -->

                   <div class="row">

                           <div class="col-lg-4">
                              @can('category-edit')
                                <form id="change_status_form" method="GET" action="{{ route('admin_category_show') }}">
                                        <div>
                                        <label class="form-label">Change Status</label> 
                                            <select class="form-control wide" id="change_status" name="status" >
                                            <option value="">Choose Status</option>
                                            <option value="active" >Inactive To Active</option>
                                            <option value="inactive">Active To Inactive</option>
                                        </select>
                                        <input type="hidden" name="category_status_ids" id="category_status_ids" value="">
                                        </div>
                                </form>
                              @endcan
                           </div>
                           <div class="col-lg-4">
                                <form method="GET" action="{{ route('admin_category_show') }}">
                                    <label class="form-label">Search By Category</label>
                                    <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                           </div>

                           
                           <div class="col-lg-4">
                                <form method="GET" action="{{ route('admin_category_show') }}">
                                    <label class="form-label">Show Sub Categories</label>
                                     <div>
                                        <select class="default-select  form-control wide" id="single-select" name="search_category" onchange="this.form.submit()">
                                           <option value="">Select Category</option>
                                           @if($categories)
                                              @foreach($categories as $category)
                                                 <?php $dash=''; ?>
                                                 <option value="{{$category->id}}" @if(app('request')->input('search_category') == $category->id) selected @endif>{{$category->name}}</option>
                                                 @if(count($category->subCategory))
                                                    @include('admin.subCategory.subCategory_search',['subcategories' => $category->subCategory])
                                                 @endif
                                              @endforeach
                                           @endif
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
                                 
                                 <input class="form-check-input" type="checkbox" name="cat_all_check" id="cat_all_check" value="all"  > 

                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Category</strong></th>
                              <th class="subcategory"><strong>Sub Category</strong></th>
                              <th class="view"><strong>No. of products</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['cat_counter' => 1]);
                           @endphp
                            @foreach($categories_list as $category)

                              <tr>
                                 <td style="text-align:center;">
                                    <div class="form-check">
                                        <input class="form-check-input cat_check" type="checkbox" name="cat_ids" id="cat_ids" value="{{$category->id}}" >
                                    </div> 

                                 </td>
                                 <td style="text-align:center;">
                                    {{ session('cat_counter')}}
                                    @php 
                                       session(['cat_counter' => session('cat_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$category->name}}</div>
                                 </td>

                                 <td>&nbsp;</td>

                                 <td align="center">
                                    @php
                                     echo count($category->noOfproducts);
                                    @endphp
                                 </td>
                                 
                                 <td align="center">
                                    <a href=""  data-category="{{ $category->id }}" data-toggle="modal" data-target="#viewCategoryModal{{ $category->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                     <i class="fa fa-circle text-success me-1"></i> {{$category->status}} 
                                 </td>
                                 <td style="text-align:center;"> 

                                    @can('category-edit')

                                       <a href="{{route('admin_category_edit',[$category->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

                                    @endcan


                                    @can('category-delete')
                                    
                                       <a href=""  data-category="{{ $category->id }}" data-toggle="modal" data-target="#delete_cat" class="btn btn-danger shadow btn-xs sharp category_delete"><i class="fa fa-trash"></i></a>
                                    
                                    @endcan
                                     
                                 </td>
                              </tr>
                              @include('admin.model.view_category')

                              

                              @if(count($category->subcategory))
                                 @include('admin.subCategory.subCategory_show',['subcategories' => $category->subCategory,])
                              @endif
                              

                           @endforeach
                           <tr><td colspan="9">
                                 <div class="d-flex justify-content-center">
                                     {{ $categories_list->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
