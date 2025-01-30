@extends('admin.layout')

@section('content')
    <section>
        <div class="row">
            <div class="col-12">
                <div class="text-end">
                    <a href="{{url('profile-create')}}" class="btn btn-outline-success">Create New Profile</a>
                </div>
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registered Profiles</h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr class="text-center">
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Age</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Posted at</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($pro as $val)
                        <tr class="align-middle text-center">
                            <td>
                                <span class="text-xs font-weight-bold mb-0">{{$i++}}</span>
                            </td>
                          
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{$val->name}}</p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{$val->email}}</p>
                            </td>
                            <td class="">
                                <span class="text-secondary text-xs font-weight-bold">{{$val->mobile}}</span>
                              </td>
                       

                            <td class="">
                              <span class="text-secondary text-xs font-weight-bold">{{Carbon\Carbon::parse($val['created_at'])->diffForHumans()}}</span>
                            </td>
                            <td class="">
                              <a href="{{url('profile-edit/'.$val->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="{{url('profile-delete/'.$val->id)}}" class="btn btn-outline-danger btn-sm ms-2" onclick="return confirm('Are you sure to delete this profile?')">Delete</a>
                            </td>
                          </tr>
                        @empty
                            <tr>
                              <td colspan="8" class="text-center text-secondary text-xxs font-weight-bold">No registered profiles found.</td>
                            </tr>
                        @endforelse

          

                      </tbody>
                    </table>
                  </div>
                    <!-- Paginate -->
                    <div class="paginate-pro mt-5 text-center">
                      {{ $pro->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection