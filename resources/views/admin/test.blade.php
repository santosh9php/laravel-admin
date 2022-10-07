<body>
          @include('admin.navigation')
          <div class="container">
        <div class="row">

            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Edit Profile</h1>
                        @if (Session::has('success'))
                            <p class="text-success">{!! Session::get('success') !!}</p>
                        @endif
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif

                        <form action="{{ route('admin_editpf') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="name" required />
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" value="" class="form-control" placeholder="name"  />
                                <img src="{{Storage::url(auth()->user()->photo)}}"  class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                                @if ($errors->has('photo'))
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mobile Number(Please enter your 10 digit mobile number without the country code)</label>
                                <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control"
                                    placeholder="mobile number"  />
                                 @if ($errors->has('mobile'))
                                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                @if($data->gender == 'm')
                                    <input class="form-check-input " type="radio" name="gender" id="exampleRadios1" value="m" checked >
                                    <label class="form-check-label" for="exampleRadios1">Male</label>

                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="f">
                                    <label class="form-check-label" for="exampleRadios2">Female</label>

                                    @if ($errors->has('gender'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                @else
                                    <input class="form-check-input " type="radio" name="gender" id="exampleRadios1" value="m"  >
                                    <label class="form-check-label" for="exampleRadios1">Male</label>

                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="f" checked>
                                    <label class="form-check-label" for="exampleRadios2">Female</label>

                                    @if ($errors->has('gendergender'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif

                                    @endif
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->address}}</textarea>
                                @if ($errors->has('address'))
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            

                            <div class="row">
                                
                                <div class="col-4 text-right">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
      </body>