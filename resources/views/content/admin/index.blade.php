@extends('layouts.admin.master')

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
                            <h4>Loans Request</h4>
                            <div class="font-weight-bold text-uppercase mb-1">
                                Today</div>
                                <div class="font-weight-bold  text-uppercase mb-3">
                                    ( {{ $totalloans->count() }} )
                                </div>
                        </div>
                        <div class="card-footer py-3">
                            <a href="/loanrequests">View Details ⇾</a>
                        </div>
                    </div>
                </div>
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
                            <a href="/goods">View Details ⇾</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Loans Status</h4>
                        </div>
                        <div class="card-footer py-3">
                            <a href="/loanactivity">View Details ⇾</a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="text-me ml-3 fw-bold">{{ $chart1->options['chart_title'] }}</h4>
                            {!! $chart1->renderHtml() !!}
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection