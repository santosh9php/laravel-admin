<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                   <div class="col-lg-3">
                     @can('blog-post-delete')
                         <form id="bulk_delete_form" method="GET" action="{{ route('admin_blog_post_show') }}">
                            <label class="form-label">Bulk Delete </label>
                            <div>
                               <select class=" form-control wide" id="bulk_delete" name="status" >
                                 <option value="">Choose Action</option>
                                 <option value="bulk_delete" >Bulk Delete</option>
                              </select>
                              <input type="hidden" name="blog_post_bulk_delete_ids" id="blog_post_bulk_delete_ids" value="">
                            </div>
                         </form>
                     @endcan
                   </div>
                   <div class="col-lg-3">
                     @can('blog-post-edit')
                      <form id="change_status_form" method="GET" action="{{ route('admin_blog_post_show') }}">
                         <label class="form-label"> Change Status </label>
                         <div>
                            <select class=" form-control wide" id="change_status" name="status" >
                              <option value="">Choose Status</option>
                              <option value="active" >Inactive To Active</option>
                              <option value="inactive">Active To Inactive</option>
                           </select>
                           <input type="hidden" name="blog_post_status_ids" id="blog_post_status_ids" value="">
                         </div>
                      </form>
                     @endcan
                   </div>
                   <div class="col-lg-3">
                       <form method="GET" action="{{ route('admin_blog_post_show') }}">
                        <label class="form-label"> Search By Title </label>
                         <div class="input-group">
                            <input type="text" class="form-control" placeholder="Title" value="{{app('request')->input('search_by_title')}}" name="search_by_title" >
                            <button type="submit" class="btn btn-primary">Search</button>
                         </div>
                      </form>
                   </div>
                   <div class="col-lg-3">
                       <form method="GET" action="{{ route('admin_blog_post_show') }}">
                         <label class="form-label"> Filter By Category </label>
                         <div class="input-group">
                            <select class="default-select form-control" id="single-select" name="search_by_category" onchange="this.form.submit()">
                               <option value="">Select Category</option>
                               @if($categories)
                                  @foreach($categories as $category)
                                     <?php $dash=''; ?>
                                     <option value="{{$category->id}}" @if(app('request')->input('search_by_category') == $category->id) selected @endif>{{$category->name}}</option>
                                 
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
                                 <input class="form-check-input" type="checkbox" name="blog_post_all_check" id="blog_post_all_check" value="all"  > 

                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Title</strong></th>
                              <th style="text-align:center; width: 250px;"><strong>Category</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['blog_post_counter' => 1]);
                           @endphp
                            @foreach($blog_posts as $blog_post)

                              <tr>
                                 <td>
                                   <div class="form-check">
                                       <input class="form-check-input blog_post_check" type="checkbox" name="blog_post_ids" id="blog_post_ids" value="{{$blog_post->id}}"  >
                                   </div> 
                                 </td>
                                 <td style="text-align:center;">

                                    {{ session('blog_post_counter')}}
                                    @php 
                                       session(['blog_post_counter' => session('blog_post_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$blog_post->title}}</div>
                                 </td>

                                 <td style="text-align:center;">
                                    @php
                                    if($blog_post->BlogCategory){
                                       $BlogCategory = $blog_post->BlogCategory;
                                       echo $BlogCategory->name;
                                    }
                                    @endphp
                                 </td>
                                 
                                 <td align="center">
                                    <a href=""  data-blog_post="{{ $blog_post->id }}" data-toggle="modal" data-target="#viewBlogPostModal{{ $blog_post->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                    <i class="fa fa-circle text-success me-1"></i> {{$blog_post->status}} 
                                 </td>
                                 <td style="text-align:center;">
                                    @can('blog-post-edit') 
                                       <a href="{{route('admin_blog_post_edit',[$blog_post->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan

                                    @can('blog-post-delete')
                                       <a href=""  data-blog_post="{{ $blog_post->id }}" data-toggle="modal" data-target="#delete_blog_post" class="btn btn-danger shadow btn-xs sharp blog_post_delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                    
                                 </td>
                              </tr>
                              @include('admin.model.view_blog_post')

                           @endforeach
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     {{ $blog_posts->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
