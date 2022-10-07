<div class="modal fade" id="viewRoleModal{{$role->id}}">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Role Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                    

                  <div class="mb-3 col-md-12">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;">{{$role->name}}</div>
                     
                  </div>
                  <div class="mb-3 col-md-12">
                     @if($role->name != 'Registered User')
                        <label class="form-label">Permissions</label>
                     @endif
                     <div style="font-weight:bold;">
                        @php
                           if($role->name == 'Super Admin'){

                              $permissions = App\Http\Controllers\Admin\RoleController::getAllPermissions();

                           } else {

                              $permissions = App\Http\Controllers\Admin\RoleController::getPermissions($role->id);

                           }

                        @endphp
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

                  
                  
                  
               </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
      </div>

   </div>

   </div>
   
</div>
