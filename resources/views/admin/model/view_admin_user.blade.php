<div class="modal fade" id="viewUserModal{{$user->id}}">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">User Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                    

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;">{{$user->fname." ".$user->lname}}</div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Email Id</label>
                     <div style="font-weight:bold;">{{$user->email}}</div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Country</label>
                     <div style="font-weight:bold;">{{$user->country}}</div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">State</label>
                     <div style="font-weight:bold;">{{$user->state}}</div>
                     
                  </div>


                  <div class="mb-3 col-md-6">
                     <label class="form-label">Mobile Number</label>
                     <div style="font-weight:bold;">
                        @if($user->country_code)
                             +{{$user->country_code}}&nbsp;
                        @endif
                        {{$user->mobile}}

                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Gender</label>
                     <div style="font-weight:bold;">
                        @if($user->gender == 'm')
                           Male
                        @else
                           Female
                        @endif
                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Address</label>
                     <div style="font-weight:bold;">{{$user->address}}</div>
                     
                  </div>

                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Photo</label>
                     <div style="font-weight:bold;">
                        @if($user->photo)
                           <img src="{{Storage::url($user->photo)}}"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                        @endif

                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Role</label>
                     <div style="font-weight:bold;">
                        <?php
                          $userRole = $user->roles->pluck('name','name')->all();
                        ?>
                        @if($userRole)
                           @foreach($userRole as $role)
                              {{$role}} <br>
                           @endforeach
                        @endif
                     </div>
                  </div>

                  @php
                     $permissions = '';
                     $userRole = $user->getRoleNames();
                     if($userRole){
                        foreach($userRole as $role){
                           if($role == 'Super Admin'){
                              $permissions = App\Http\Controllers\Admin\RoleController::getAllPermissions();
                           } else {
                              $permissions = $user->getAllPermissions();
                           }
                        }
                     }
                  @endphp

                  @if($permissions and count($permissions))

                     <div class="mb-3 col-md-12">
                        <label class="form-label">Permissions</label>
                        <div style="font-weight:bold;">
                           <div class="row">
                                 @php $count = 0; @endphp
                                 @if($permissions)
                                    @foreach($permissions as $permission)
                                       @php 
                                          if($count == 0){
                                             echo '<div class="col-md-3">';
                                          }
                                       @endphp
                                           <label>
                                               {{ $permission->displayName }}
                                           </label>
                                          <br/>
                                       @php 
                                          if($count == 0){
                                             
                                          }
                                          $count++;

                                          if($count == 12){
                                             echo '</div>';
                                            $count = 0;
                                          }
                                          
                                       @endphp
                                    @endforeach
                                 @endif

                                 @if($count != 12 && $count != 0)
                                    </div>
                                 @endif
                           </div>
                        </div>
                     </div>

                  @endif


               </div>
         </div>
     
         <div class="modal-footer">
           <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
         </div>
      
      </div>

   </div>
   

</div>
