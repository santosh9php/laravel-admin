<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"> 
                  <!--
                     <form id="bulk_delete_form" method="GET" action="{{ route('admin_faq_category_show') }}">
                        <div>Bulk Delete</div>
                        <div class="input-group search-area right d-lg-inline-flex d-none">
                           <select class="form-control wide" id="bulk_delete" name="status" >
                             <option value="">Choose Action</option>
                             <option value="bulk_delete" >Bulk Delete</option>
                          </select>
                          <input type="hidden" name="faq_category_bulk_delete_ids" id="faq_category_bulk_delete_ids" value="">
                        </div>
                     </form>
                  -->
                   <div class="row">
                           <div class="col-lg-4">
                              @can('faq-category-edit')
                                 <form id="change_status_form" method="GET" action="{{ route('admin_faq_category_show') }}">
                                    <label class="form-label">Change Status </label>
                                       <select class=" form-control wide change_status" id="change_status" name="status" >
                                         <option value="">Choose Status</option>
                                         <option value="active" >Inactive To Active</option>
                                         <option value="inactive">Active To Inactive</option>
                                      </select>
                                      <input type="hidden" name="faq_category_status_ids" id="faq_category_status_ids" value="">
                                     
                                 </form>
                              @endcan
                           </div>
                           <div class="col-lg-4">
                               <form method="GET" action="{{ route('admin_faq_category_show') }}">
                                 <label class="form-label">Search By  Name </label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-lg-4"></div>
                   </div>








                  
               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th class="check">
                                 <input class="form-check-input" type="checkbox" name="faq_cat_all_check" id="faq_cat_all_check" value="all"  > 
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Name</strong></th>
                              <th style="text-align:center; width:140px;"><strong>No. of faqs</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              $cat_counter =0;
                           @endphp
                            @foreach($categories as $faq_category)

                              <tr>
                                 <td>
                                     <div class="form-check">
                                        <input class="form-check-input faq_cat_check" type="checkbox" name="cat_ids" id="cat_ids" value="{{$faq_category->id}}"  >
                                     </div> 
                                 </td>
                                 <td style="text-align:center;">
                                    {{ ++$cat_counter }}
                                 </td>
                                 <td>
                                    {{$faq_category->name}}
                                 </td>
                                 <td style="text-align:center;">
                                    @php
                                    if($faq_category->findFaqs){
                                       $findFaqs = $faq_category->findFaqs;
                                       echo count($findFaqs);
                                    }
                                    @endphp
                                 </td>
                                 <td align="center">
                                    <a href=""  data-faq_category="{{ $faq_category->id }}" data-toggle="modal" data-target="#viewfaqCategoryModal{{ $faq_category->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                 </td>
                                 <td style="text-align:center;">
                                    <i class="fa fa-circle text-success me-1"></i> {{$faq_category->status}} 
                                 </td>
                                 <td style="text-align:center;"> 
                                    
                                    @can('faq-category-edit')
                                       <a href="{{route('admin_faq_category_edit',[$faq_category->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan

                                    @can('faq-category-delete')
                                       <a href=""  data-faq_category="{{ $faq_category->id }}" data-toggle="modal" data-target="#faq_delete_cat" class="btn btn-danger shadow btn-xs sharp faq_category_delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                    
                                 </td>
                              </tr>
                              @include('admin.model.view_faq_category')

                              

                           @endforeach
                           <tr><td colspan="9">
                                 <div class="d-flex justify-content-center">
                                     {{ $categories->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
