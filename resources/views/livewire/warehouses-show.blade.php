<div>
    <div>

        @include('livewire.warehousesmodal')


        <div class="container-fluid">
            @if (session()->has('message'))
            <h5 class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert" aria-label="Close">
                {{ session('message') }}</h5>
            @endif

            
        <div class="page-title">
            <div class="card card-absolute mt-5 mt-md-4">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        📅📃 • Warehouse
                    </h5>
                </div>
                <div class="card-body">
                    <p>
                        Hallo {{ auth()->user()->name }}, 
                        <span class="d-none d-md-inline">
                            You can add unused items in the warehouse
                        </span>
                    </p>
                </div>
            </div>
        </div>

            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#warehousesModal">Add New Item</button>

                        <div class="dt-buttons btn-group flex-wrap">
                            <a href="{{ url('/reportpdfwarehouse') }}" target="_blank" class="btn btn-info btn-md"> PDF</a>
                        <a href="#" target="_blank" class="btn btn-info btn-md">Excell</a>
                        </div>
                        <h5 class="text-center text-me mb-3">All Items in warehouse</h5>
                        <input type="search" wire:model="search" class="form-control" placeholder="Search item..."
                            style="width: 1300px" />
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Item</th>
                                    <th>Total</th>
                                    <th>Brand</th>
                                    <th>Item Condition</th>
                                    <th>Product Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($warehouses as $index => $w)
                                <tr>
                                    <td>{{ $warehouses->firstItem() + $index }}</td>
                                    <td>{{ $w->name }}</td>
                                    <td>{{ $w->total }}</td>
                                    <td>{{ $w->brand }}</td>
                                    <td>{{ $w->itemcondition }}</td>
                                    <td>{{ $w->productcode }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#ViewWarehousesModal"
                                            wire:click="viewWarehouses({{$w->id}})" class="btn btn-dark">
                                            View
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#updateWarehousesModal"
                                            wire:click="editWarehouses({{$w->id}})" class="btn btn-primary">
                                            Edit
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#deleteWarehousesModal"
                                            wire:click="deleteWarehouses({{$w->id}})"
                                            class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $warehouses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>