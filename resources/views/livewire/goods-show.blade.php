<div>

    @include('livewire.goodsmodal')


    <div class="container-fluid">
        @if (session()->has('message'))
        <div>
            <h5 class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert" aria-label="Close">
                {{ session('message') }}</h5>
        </div>
        @endif

        <div class="page-title">
            <div class="card card-absolute mt-5 mt-md-4">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        📦📚 • All Items
                    </h5>
                </div>
                <div class="card-body">
                    <p>
                        Hallo {{ auth()->user()->name }},
                        <span class="d-none d-md-inline">
                            Manage your item
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#goodsModal"> + Add New Item</button>
                    <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ url('/reportpdf') }}" target="_blank" class="btn btn-info btn-md"> PDF</a>
                        <a href="#" target="_blank" class="btn btn-info btn-md">Excell</a></div>
                    <h5 class="text-center text-me mb-3">All Items</h5>
                    <input type="search" wire:model="search" class="form-control" placeholder="Search item..."
                        style="width: 1250x" />
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Item</th>
                                <th>Stock</th>
                                <th>Brand</th>
                                <th>Product Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($goods as $index => $g)
                            <tr>
                                <td>{{ $goods->firstItem() + $index }}</td>
                                <td>{{ $g->name }}</td>
                                <td>{{ $g->stock }}</td>
                                <td>{{ $g->brand }}</td>
                                <td>{{ $g->productcode }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#viewGoodsModal"
                                        wire:click="viewGoods({{$g->id}})" class="btn btn-dark">
                                        View
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateGoodsModal"
                                        wire:click="editGoods({{$g->id}})" class="btn btn-primary">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteGoodsModal"
                                        wire:click="deleteGoods({{$g->id}})" class="btn btn-danger">Delete</button>
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
                        {{ $goods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>