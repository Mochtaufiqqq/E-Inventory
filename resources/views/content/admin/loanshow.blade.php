@extends('layouts.admin.master')

@section('title', 'Loans Activity | E - Inventory')
@section('content')

@push('datatable-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/scrollable.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatable-extension.css')}}">
@endpush

@if (session()->has('message'))
    <div>
        <h5 class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert" aria-label="Close">
            {{ session('message') }}</h5>
    </div>
@endif

<div class="container-fluid">

    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">
                    📅📚 • Loans Activity
                </h5>
            </div>
            <div class="card-body">
                <p>
                    Hallo {{ auth()->user()->name }} , Below is your loan data
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ url('/pdfloans') }}" target="_blank" class="btn btn-info btn-md"> PDF</a>
                        </div>
                    <h5 class="text-center text-me mb-3">All Activity</h5>
                    <table id="myTable" class="table table-bordered">
                        <thead class="text-me">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Loans Code</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Addres</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $l)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $l->loans_code }}</td>
                                <td>{{ $l->user->name }}</td>
                                <td>{{ $l->goods->name }}</td>
                                <td>{{ $l->user->address }}</td>
                                <td>{{ $l->purpose }}</td>
                                <td>{{ $l->created_at }}</td>
                                <td>
                                    @if($l->acceptance_status === 1)
                                    <h5><span class="badge bg-opacity-25 bg-success text-white">Borrowing</span>
                                    </h5>
                                    @elseif($l->acceptance_status === 0)
                                    <h5><span class="badge bg-opacity-25 bg-danger text-danger">Rejected</span></h5>
                                    @elseif($l->acceptance_status === 2)
                                    <h5><span class="badge bg-opacity-25 bg-success text-success">Returned</span>
                                    </h5>
                                    @else
                                    <h5><span class="badge bg-opacity-100 bg-warning text-white">Waiting</span></h5>
                                    @endif
                                </td>
                                <td>
                                    @if($l->acceptance_status === 2)
                                    <form action="/deleteloanactivity/{{ $l->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Are you sure want to delete ?');">Clear</button>
                                    </form>
                                    @elseif($l->acceptance_status === 0)
                                    <form action="/deleteloanactivity/{{ $l->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Are you sure want to delete ?');">Clear</button>
                                    </form>
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

    @endsection