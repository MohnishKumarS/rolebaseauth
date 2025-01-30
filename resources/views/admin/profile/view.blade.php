@extends('admin.layout')

@section('content')
    <section>
        <div class="card card-body mx-3 mx-md-4">
            <div class="row gx-4 mb-2">
              <div class="col-auto">
                <div class="avatar avatar-xl position-relative overflow-hidden">

                    <img src="{{ $pro->image ? asset('image/profile/' . $pro->image) : asset('image/common/' . ($pro->gender == 'Male' ? 'default-male.jpg' : 'default-female.jpg')) }}"
                     alt="profile_image" class="w-100 border-radius-lg shadow-sm" class="">
            
                </div>
              </div>
              <div class="col-auto my-auto">
                <div class="h-100">
                  <h5 class="mb-1">
                    {{$pro->name}}
                  </h5>

                </div>
              </div>
              <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                @if ($pro->status == '0')
                <a href="{{url('profile-status/1/'.$pro->id)}}" class="text-sm btn btn-sm btn-outline-success me-2">Approve</a>
                <a href="{{url('profile-status/2/'.$pro->id)}}" class="text-sm btn btn-sm btn-outline-danger">Reject</a>
                @else
                    <h6 class="text-primary">{{$pro->status == 1 ? 'Profile Approved 💌' : 'Profile Rejected ❌'}}</h6>
                @endif
        
              </div>
            </div>
            <div class="row">
              <div class="row">
                <div class="col-12 col-xl-4">
                  <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                      <h6 class="mb-0">Basic Details</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$pro->name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$pro->name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; {{$pro->gender}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Age:</strong> &nbsp; {{$pro->age}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">DOB:</strong> &nbsp; {{$pro->dob}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Marital Status:</strong> &nbsp; {{$pro->marital_status}}</li>
         
                          </ul>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                      <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                          <h6 class="mb-0">Religious Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                          <a href="javascript:;">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Religion:</strong> &nbsp; {{$pro->name}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Caste:</strong> &nbsp; {{$pro->caste}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mother tongue:</strong> &nbsp; {{$pro->community}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{$pro->city}} , {{$pro->state}}</li>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                      <h6 class="mb-0">Horoscope</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Raasi:</strong> &nbsp; {{$pro->raasi}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Star:</strong> &nbsp; {{$pro->star}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Dosham:</strong> &nbsp; {{$pro->dosham}}</li>              
                          </ul>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                    <div class="text-end">
                        <a href="{{url('profile-edit/'.$pro->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="{{url('profile-delete/'.$pro->id)}}" class="btn btn-outline-danger btn-sm ms-2" onclick="return confirm('Are you sure to delete this profile?')">Delete</a>
                    </div>
                </div>
              </div>
            </div>
         
    </section>
@endsection
