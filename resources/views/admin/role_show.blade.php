<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                       
                       
                       <div class="col-lg-9 mb-9"></div>

                       <div class="col-lg-3 mb-3">
                           
                       </div>

                    </div>

               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                             
                              <th class="sno"><strong>S No.</strong></th>
                              <th ><strong>Name</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['role_counter' => 1]);
                           @endphp
                           @foreach($roles as $role)

                              <tr>
                                 
                                 <td style="text-align:center;">

                                    {{ session('role_counter')}}
                                    @php 
                                       session(['role_counter' => session('role_counter')+1]);
                                    @endphp
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">{{$role->name}}</div>
                                 </td>

                                 <td align="center">
                                    

                                       <a href=""  data-role="{{ $role->id }}" data-toggle="modal" data-target="#viewRoleModal{{ $role->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                               
                                 <td style="text-align:center;"> 

                                    @if($role->name != 'Registered User' && $role->name != 'Super Admin')

                                       @can('role-edit')

                                          <a href="{{route('admin_role_edit',[$role->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

                                       @endcan

                                        @can('role-delete')

                                          <a href=""  data-role="{{ $role->id }}" data-toggle="modal" data-target="#delete_role" class="btn btn-danger shadow btn-xs sharp role_delete"><i class="fa fa-trash"></i></a>

                                       @endcan

                                    @endif
                                     
                                 </td>
                              </tr>
                              @include('admin.model.view_role')

                           @endforeach
                           <tr><td colspan="12">
                                 <div class="d-flex justify-content-center">
                                     {{ $roles->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
