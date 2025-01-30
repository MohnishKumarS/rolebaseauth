@extends('admin.layout')

@section('content')
    <section>
        <div class="row">
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Create New Profile</h6>
                  </div>
                </div>
                <div class="card-body pb-2">
                    <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="prof-add ">
                            <h6 class="prof-head">Basic Information</h6>
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Name </label>
                                        <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
   
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Email </label>
                                        <input type="email" class="form-control" required name="email"
                                           >
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Mobile </label>
                                        <input type="text" class="form-control" required name="mobile" maxlength="10"
                                            onkeyup="this.value = this.value.replace(/[^0-9]/g,'')">
                                            @error('mobile')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                          
                      
                            </div>
                       
        
                            <div class="text-center mt-5">
                                <button class="btn-success btn w-50" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection