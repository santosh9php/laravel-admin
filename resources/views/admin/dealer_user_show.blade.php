<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">

                       <div class="col-lg-3 mb-3">
                             <form id="bulk_delete_form" method="GET" action="{{ route('admin_dealer_user_show') }}">
                                <label class="form-label">Bulk Delete </label>
                                <div>
                                   <select class=" form-control wide" id="bulk_delete" name="status" >
                                     <option value="">Choose Action</option>
                                     <option value="bulk_delete" >Bulk Delete</option>
                                  </select>
                                  <input type="hidden" name="user_bulk_delete_ids" id="user_bulk_delete_ids" value="">
                                </div>
                             </form>
                       </div>
                       <div class="col-lg-3 mb-3">
                          <form id="change_status_form" method="GET" action="{{ route('admin_dealer_user_show') }}">
                              <label class="form-label"> Change Status</label>
                             <div>
                                <select class=" form-control wide" id="change_status" name="status" >
                                  <option value="">Choose Status</option>
                                  <option value="active" >Inactive To Active</option>
                                  <option value="inactive">Active To Inactive</option>
                               </select>
                               <input type="hidden" name="user_status_ids" id="user_status_ids" value="">
                             </div>
                          </form>
                       </div>
                       
                       <div class="col-lg-3 mb-3">
                           <form method="GET" action="{{ route('admin_dealer_user_show') }}">
                             <label class="form-label">Search By user Name </label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                       </div>

                       <div class="col-lg-3 mb-3">
                          <form method="GET" action="{{ route('admin_dealer_user_show') }}">
                             <label class="form-label">Order By </label>
                             <div>
                                <select class="form-control" id="single-select-order-by" name="order_by" onchange="this.form.submit()">
                                   <option value="">Select Order By</option>

                                   <option value="user_name_asc" @if(app('request')->input('order_by') == 'user_name_asc') selected @endif >By Name Asc</option>

                                   <option value="user_name_desc" @if(app('request')->input('order_by') == 'user_name_desc') selected @endif >By Name Desc</option>

                                  
                                   <option value="created_at_asc" @if(app('request')->input('order_by') == 'created_at_asc') selected @endif >By Created Date Asc</option>

                                   <option value="created_at_desc" @if(app('request')->input('order_by') == 'created_at_desc') selected @endif >By Created Date Desc</option>

                                   <option value="status_active" @if(app('request')->input('order_by') == 'status_active') selected @endif >By Active Users</option>

                                   <option value="status_inactive" @if(app('request')->input('order_by') == 'status_inactive') selected @endif >By Inactive Users</option>
                           
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
                                 <input class="form-check-input" type="checkbox" name="user_all_check" id="user_all_check" value="all"  >
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th class="user"><strong>Name</strong></th>
                              <th class="email"><strong>Email Id</strong></th>
                              <th class="mobile"><strong>Mobile No.</strong></th>
                              <th class="gender"><strong>Gender</strong></th>
                              <th class="create_date" style="width:150px;"><strong>Created Date</strong></th>
                              <th class="role"><strong>Verify</strong></th>
                              <th class="user_view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['user_counter' => 1]);
                           @endphp
                            @foreach($users as $user)

                              <tr>
                                 <td>

                                  <div class="form-check">
                                         <input class="form-check-input user_check" type="checkbox" name="user_ids" id="user_ids" value="{{$user->id}}"  >
                                   </div>

                                 
                                 </td>
                                 <td style="text-align:center;">

                                    {{ session('user_counter')}}
                                    @php 
                                       session(['user_counter' => session('user_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$user->fname." ".$user->lname}}</div>
                                 </td>
                                 <td style="text-align:center;"><a title="Send Mail" href="mailto:{{$user->email}}">{{$user->email}}</a></td>


                                 <td style="text-align:center;">
                                    @if($user->country_code)
                                         +{{$user->country_code}}&nbsp;
                                    @endif
                                    {{$user->mobile}}
                                 </td>

                                 

                                 <td style="text-align:center;">
                                    @if($user->gender == 'm')
                                       Male
                                    @else
                                       Female
                                    @endif
                                 </td>

                                 <td style="text-align:center;">{{$user->created_at->format('d-m-Y')}}</td>


                                 <td style="text-align:center;">
                                    @if(!is_null($user->email))
                                       @if(is_null($user->email_verified_at) or $user->email_verified_at == '-0001-11-30 00:00:00')
                                          <a href="{{route('admin_generate_user_show',[$user->id])}}" title="Generate Mail" style="color:red;">Generate</a>
                                       @else
                                          Verified
                                       @endif
                                    @endif
                                 </td>


                                 <td align="center">
                                    <a href=""  data-user="{{ $user->id }}" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;"><i class="fa fa-circle text-success me-1"></i> {{$user->status}}
                                 </td>
                                 <td style="text-align:center;"> 
                                       <a href="{{route('admin_dealer_user_edit',[$user->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                       <a href=""  data-user="{{ $user->id }}" data-toggle="modal" data-target="#delete_user" class="btn btn-danger shadow btn-xs sharp user_delete"><i class="fa fa-trash"></i></a>
                                     
                                 </td>
                              </tr>
                              @include('admin.model.view_dealer_user')

                           @endforeach
                           <tr><td colspan="12">
                                 <div class="d-flex justify-content-center">
                                     {{ $users->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
