@extends('layouts.user.master')

@section('title', 'All Items | E - Inventory')
@section('content')

<div>
    <livewire:goods-user-show>
</div>
    
@endsection

@section('script')

<script>
     window.addEventListener('close-modal', event => {

        $('#goodsModal').modal('hide');
        $('#viewGoodsModal').modal('hide');
        })
    </script>
    
@endsection