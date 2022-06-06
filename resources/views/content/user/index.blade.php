@extends('layouts.user.master')

@section('title', 'Dashboard | E - Inventory')
@section('content')

<div class="container-fluid product-wrapper">
    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">🏠 • Dashboard</h5>
            </div>
            <div class="card-body">
                <p>
                    Welcome {{ auth()->user()->name }}
                </p>
            </div>
        </div>
    </div>
    <div class="product-grid">
        <div class="product-wrapper-grid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Items </h4>
                            <div class="font-weight-bold text-uppercase mb-1">
                                Now</div>
                                <div class="font-weight-bold  text-uppercase mb-3">
                                    ( {{ $goods->count() }} )
                                </div>
                        </div>
                        <div class="card-footer py-3">
                            <a href="/item">View Details ⇾</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection