@extends('layouts.user.master')

@section('title', 'Send Loans Request | E - Inventory')
@section('content')

@push('timepicker-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/timepicker.css')}}">
@endpush

@if (session()->has("failed"))
<div class="alert alert-danger alert-dismissible fade show col-lg-8" data-bs-dismiss="alert" aria-label="Close"
    role="alert">
    {{ session("failed") }}
</div>
@endif

<div class="container-fluid">

    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">
                    ✏️✉️ • Send Loans Request
                </h5>
            </div>
            <div class="card-body">
                <p>
                    Hallo {{ auth()->user()->name }} , Below is the form for sending a loan,
                    <span class="d-none d-md-inline">
                        Before borrowing an item you must send a request !
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Send Loans Request</h5>
                </div>
                <form method="POST" action="/create" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label class="labels fw-bold">Loans Code</label>
                            <input type="text" name="loans_code"
                                class="form-me form-control border border-primary mb-2 @error('loans_code') is-invalid @enderror"
                                placeholder="Masukkan kode barang" value="{{ 'LOAN-'.$kd }}" readonly required>
                            <label class="labels fw-bold">Choose an item</label>
                            <select class="form-select @error('goods_id') is-invalid @enderror" name="goods_id">
                                <option selected>Select Item</option>
                                @foreach($goods as $g)
                                <option value="{{ $g->id }}">{{ $g->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="labels fw-bold">Purpose</label>
                        <div class="form floating">
                            <textarea name="purpose" id="floatingTextArea" class="form-control"></textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary m-r-15" type="submit">Tambah</button>
                            <button class="btn btn-light" type="reset">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    @push('timepicker-scripts')
    <script src="{{url('cuba/assets/js/time-picker/jquery-clockpicker.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/time-picker/highlight.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/time-picker/clockpicker.js')}}"></script>
    @endpush

    @endsection