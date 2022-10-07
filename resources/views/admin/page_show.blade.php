<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                     {{-- 
                       <div class="col-lg-4">
                         <form id="bulk_delete_form" method="GET" action="{{ route('admin_page_show') }}">
                             <label class="form-label">Bulk Delete </label>
                             
                               <select class=" form-control wide" id="bulk_delete" name="status" >
                                 <option value="">Choose Action</option>
                                 <option value="bulk_delete" >Bulk Delete</option>
                              </select>
                              <input type="hidden" name="page_bulk_delete_ids" id="page_bulk_delete_ids" value="">
                            
                         </form>
                       </div>
                     --}}  
                       <div class="col-lg-4">
                          <form id="change_status_form" method="GET" action="{{ route('admin_page_show') }}">
                              <label class="form-label">Change Status </label>
                                <select class="form-control wide" id="change_status" name="status" >
                                  <option value="">Choose Status</option>
                                  <option value="active" >Inactive To Active</option>
                                  <option value="inactive">Active To Inactive</option>
                               </select>
                               <input type="hidden" name="page_status_ids" id="page_status_ids" value="">
                             
                          </form>
                       </div>
                       <div class="col-lg-4">&nbsp;</div>
                       <div class="col-lg-4">
                           <form method="GET" action="{{ route('admin_page_show') }}">
                             <label class="form-label">Search By page Name </label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
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
                                 <input class="form-check-input" type="checkbox" name="page_all_check" id="page_all_check" value="all"  > 

                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Name</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong>Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['page_counter' => 1]);
                           @endphp
                            @foreach($pages as $page)

                              <tr>
                                 <td>
                                    <div class="form-check">
                                       <input class="form-check-input page_check" type="checkbox" name="page_ids" id="page_ids" value="{{$page->id}}"  >
                                    </div>
                                 </td>
                                 <td>

                                    {{ session('page_counter')}}
                                    @php 
                                       session(['page_counter' => session('page_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$page->name}}</div>
                                 </td>

                                 
                                 
                                 <td align="center">
                                    <a href=""  data-page="{{ $page->id }}" data-toggle="modal" data-target="#viewPageModal{{ $page->id }}"  title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td >
                                    <div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> {{$page->status}}</div>
                                 </td>
                                 <td style="text-align:center;">
                                    <div class="d-flex">
                                       <a href="{{route('admin_page_edit',[$page->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                       @if($page->slug != 'welcome-to-sk-distributors' && $page->slug != 'about-us' && $page->slug != 'contact-us')
                                       <a href=""  data-page="{{ $page->id }}" data-toggle="modal" data-target="#delete_page" class="btn btn-danger shadow btn-xs sharp page_delete"><i class="fa fa-trash"></i></a>
                                       @endif
                                    </div>
                                 </td>
                              </tr>
                              @include('admin.model.view_page')

                           @endforeach
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     {{ $pages->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
