@extends('layouts.admin.master')

@section('title', 'Manage Goods | E - Inventory')
@section('content')

<div>
    <livewire:goods-show>
</div>
    
@endsection

@section('script')

<script>
     window.addEventListener('close-modal', event => {

        $('#goodsModal').modal('hide');
        $('#updateGoodsModal').modal('hide');
        $('#deleteGoodsModal').modal('hide');
        $('#viewGoodsModal').modal('hide');
        })
    </script>
    
@endsection