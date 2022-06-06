@extends('layouts.admin.master')

@section('title', 'Manage Users | E - Inventory')
@section('content')

<div>
    <livewire:user-show>
</div>
    
@endsection

@section('script')

<script>
     window.addEventListener('close-modal', event => {

        $('#updateUserModal').modal('hide');
        $('#deleteUserModal').modal('hide');
        })
    </script>
    
@endsection