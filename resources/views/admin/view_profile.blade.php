
@extends('admin.main')

@section('body-content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info">
                                 
                                    @if($data->photo)
                                       <div class="profile-photo">
                                          <img style="border: 10px solid #fff;" src="{{Storage::url(findMTPath($data->photo))}}" class="img-fluid rounded-circle" alt="">
                                       </div>
                                    @endif
                                   
                                </div>
                            </div>

                             <div class="profile-details">
                                       <div class="profile-name px-2 pt-2">
                                          <h3 class="text-primary mb-0">{{$data->fname. " ".$data->lname}}</h3>
                                       </div>
                                       
                                       <div class="dropdown ml-auto px-2"> 
                                          <a class="btn btn-primary light sharp" href="{{route('admin_editpf')}}"><i class="fa fa-edit text-primary"></i> Edit Profile</a> 
                                       </div>
                                    </div>


                              <div class="clearfix mb-3"></div>


                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                        <p class="mb-0">Email</p>
                                    <h4 class="text-muted mb-0">{{$data->email}}</h4>
                                   
                                 </div>
                                </div>

                               

                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                        <p class="mb-0">Mobile No.</p>
                                    <h4 class="text-muted mb-0">
                                        @if($data->country_code)
                                            +{{$data->country_code}}&nbsp;
                                        @endif
                                        {{$data->mobile}}

                                    </h4>
                                   
                                 </div>
                                </div>

                                 

                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                       <p class="mb-0">Gender</p>
                                       @if($data->gender == 'm')
                                          <h4 class="text-muted mb-0">Male</h4>
                                       @else
                                          <h4 class="text-muted mb-0">Female</h4>

                                       @endif
                                    
                                 </div>


                                </div>  

                                    <div class="col-lg-4">
                                        <div class="profile-email px-2 pt-2">
                                            <p class="mb-0">Country</p>
                                            <h4 class="text-muted mb-0">{{$data->country}}</h4>
                                           
                                        </div>
                                    </div>

                                     <div class="col-lg-4">
                                        <div class="profile-email px-2 pt-2">
                                            <p class="mb-0">State</p>
                                            <h4 class="text-muted mb-0">{{$data->state}}</h4>
                                           
                                         </div>
                                    </div>

                                     <div class="col-lg-4">
                                         
                                        <div class="profile-email px-2 pt-2">
                                            <p class="mb-0">Role</p>
                                            <h4 class="text-muted mb-0">
                                                <?php
                                                  $userRole = $data->roles->pluck('name','name')->all();
                                                ?>
                                                @if($userRole)
                                                   @foreach($userRole as $role)
                                                      {{$role}} <br>
                                                   @endforeach
                                                @endif

                                            </h4>
                                           
                                         </div>

                                     </div>



                                 <div class="col-lg-12">
                                    <div class="profile-email px-2 pt-2 mt-3">
                                        <p class="mb-0">Address</p>
                                    <h4 class="text-muted mb-0">{{$data->address}}</h4>
                                   
                                 </div>
                                </div> 

                                <div class="clearfix mb-5"></div>
                               
                                </div>

                        </div>
                    </div>
               </div>
   </div>
</div>
@endsection
