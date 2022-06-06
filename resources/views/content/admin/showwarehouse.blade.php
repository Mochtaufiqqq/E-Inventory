@extends('layouts.admin.master')

@section('title', 'Warehouse | E - Inventory')
@section('content')

<div>
    <livewire:warehouses-show>
</div>
    
@endsection

@section('script')

<script>
    window.addEventListener('close-modal', event => {

       $('#warehousesModal').modal('hide');
       $('#updateWarehousesModal').modal('hide');
       $('#deleteWarehousesModal').modal('hide');
       $('#viewWarehousesModal').modal('hide');
       })
   </script>
   
@endsection