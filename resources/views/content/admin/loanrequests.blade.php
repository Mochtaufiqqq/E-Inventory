@extends('layouts.admin.master')

@section('title', 'Loan Requests | E - Inventory')
@section('content')

@push('datatable-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/scrollable.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatable-extension.css')}}">
@endpush

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
    {{ session('success') }} <a href="/loanactivity"> View Status </a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
 @if (session()->has("warning"))
 <div class="alert alert-warning alert-dismissible fade show mt-3 mb-3" role="alert">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif
@if (session()->has("failed"))
<div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
   {{ session('failed') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="container-fluid">

    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">
                    📅📚 • Loans Requests
                </h5>
            </div>
            <div class="card-body">
                <p>
                    Hallo {{ auth()->user()->name }} , Below is your loan data
                    <span class="d-none d-md-inline">
                        Make sure you manage it properly so that there are no problems when returning or canceling
                    </span>
                </p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                    <h5 class="text-center text-me mb-3">Loans Request</h5>
                    <table id="myTable" class="table table-bordered">
                        <thead class="text-me">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Addres</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $l)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $l->user->name }}</td>
                                <td>{{ $l->goods->name }}</td>
                                <td>{{ $l->user->address }}</td>
                                <td>{{ $l->purpose }}</td>
                                <td>{{ $l->created_at }}</td>
                                <td> 
                                  @if($l->acceptance_status === NULL)
                                      <a href="/loanrequests/{{ $l->id }}/accept" class="btn btn-success">Accept</a>
                                      <a href="/loanrequests/{{ $l->id }}/reject" class="btn btn-danger">Reject</a>
                                      {{-- <a href="/loanrequests/{{ $l->id }}/cancel" class="btn btn-danger" onclick="return confirm('Are you sure want to cancel ?');">Cancel</a> --}}
                                   @elseif($l->acceptance_status !== 2)
                                      <a href="/loanrequests/{{ $l->id }}/cancel" class="btn btn-danger" onclick="return confirm('Are you sure want to cancel ?');">Cancel</a>
                                  @endif
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection