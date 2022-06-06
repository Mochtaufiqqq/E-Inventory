<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="goodsModal" tabindex="-1" aria-labelledby="goodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="goodsModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveGoods">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Item Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" wire:model="stock" class="form-control">
                        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" wire:model="brand" class="form-control">
                        @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Product Code</label>
                        <input type="text" wire:model="productcode" class="form-control">
                        @error('productcode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Goods Modal -->
<div wire:ignore.self class="modal fade" id="updateGoodsModal" tabindex="-1" aria-labelledby="updateGoodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGoodsModalLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateGoods">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" wire:model="stock" class="form-control">
                        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" wire:model="brand" class="form-control">
                        @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Product Code</label>
                        <input type="text" wire:model="productcode" class="form-control">
                        @error('productcode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Goods Modal -->
<div wire:ignore.self class="modal fade" id="deleteGoodsModal" tabindex="-1" aria-labelledby="deleteGoodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGoodsModalLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyGoods">
                <div class="modal-body">
                    <h5>Are you sure you want to delete this item ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Goods Modal -->
<div wire:ignore.self class="modal fade" id="viewGoodsModal" tabindex="-1" aria-labelledby="viewGoodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGoodsModalLabel">Item Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateGoods">
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name item:</th>
                                <th>{{ $view_goods_name }}</th>
                            </tr>

                            <tr>
                                <th>Stock:</th>
                                <th>{{ $view_goods_stock }}</th>
                            </tr>

                            <tr>
                                <th>Brand:</th>
                                <th>{{ $view_goods_brand }}</th>
                            </tr>

                            <tr>
                                <th>Product Code:</th>
                                <th>{{ $view_goods_productcode }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>