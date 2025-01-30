@extends('admin.layout')
@push('styles')
    <style>
        .table td, .table th {
    white-space: initial !important;
}
    </style>
@endpush
@section('content')
    <section>
        <div class="row">
            <div class="col-12">

                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Contacts Details</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Mobile</th>
                                        <th width="30%" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Message</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($contacts as $val)
                                        <tr class="align-middle text-center">
                                            <td>
                                                <span class="text-xs font-weight-bold mb-0">{{ $i++ }}</span>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $val->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $val->email }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $val->mobile }}</p>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $val->message ?? 'Null' }}</span>
                                            </td>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-secondary text-xxs font-weight-bold">
                                                No registered contacts found.</td>
                                        </tr>
                                    @endforelse



                                </tbody>
                            </table>
                        </div>
                        <!-- Paginate -->
                        <div class="paginate-pro mt-5 text-center">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
