@extends('layouts.user.master')

@section('title', 'Loans Activity | E - Inventory')
@section('content')

@push('datatable-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/scrollable.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatable-extension.css')}}">
@endpush

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid">

<div class="page-title">
    <div class="card card-absolute mt-5 mt-md-4">
        <div class="card-header bg-primary">
            <h5 class="text-white">
                📅📚 • Your Loans Activity
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
                    <a href="{{ url('/downloadpdfloans') }}" target="_blank" class="btn btn-info btn-md"> PDF</a>
                    <a href="{{ url('/downloadpdfloans') }}" target="_blank" class="btn btn-info btn-md">Excell</a>
                    <h5 class="text-center text-me mb-3">Loans Table Activity</h5>
                    <table id="myTable" class="table table-bordered">
                        <thead class="text-me">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item Name</th>
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
                                <td>{{ $l->goods->name }}</td>
                                <td>{{ $l->purpose }}</td>
                                <td>{{ $l->created_at }}</td>
                                <td>
                                    @if($l->acceptance_status === 1)
                                    <h5><span class="badge bg-opacity-100 bg-success text-white">Accepted</span></h5>
                                    @elseif($l->acceptance_status === 0)
                                    <h5><span class="badge bg-opacity-100 bg-danger text-white">Rejected</span></h5>
                                    @elseif($l->acceptance_status === 2)
                                    <h5><span class="badge bg-opacity-100 bg-success text-white">Returned</span></h5>
                                    @else
                                    <h5><span class="badge bg-opacity-100 bg-warning text-white">Waiting</span></h5>
                                    @endif
                                </td>
                                <td>
                                    @if($l->acceptance_status === NULL)
                                    <form action="/delete/{{ $l->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Are you sure want to cancel this loans ?');">Cancel</button>
                                    </form>
                                    @elseif($l->acceptance_status == 1)
                                    <a href="/loans/{{ $l->id }}/return" class="btn text-success border-success"
                                        onclick="return confirm('Return this item ?');">Return</a>
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