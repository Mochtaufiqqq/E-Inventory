<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="warehousesModal" tabindex="-1" aria-labelledby="warehousesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warehousesModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveWarehouses">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Item Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Total</label>
                        <input type="text" wire:model="total" class="form-control">
                        @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" wire:model="brand" class="form-control">
                        @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Item Condition</label>
                       <select wire:model="itemcondition" class="form-select form-control">
                        <option selected>Select item condition</option>
                        <option value="Good">Good</option>
                        <option value="Damaged">Damaged</option>
                        <option value="Badly Damaged">Badly Damaged</option>
                    </select>
                    @error('itemcondition') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Update Warehouse Modal -->
<div wire:ignore.self class="modal fade" id="updateWarehousesModal" tabindex="-1" aria-labelledby="updateWarehousesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateWarehousesModalLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateWarehouses">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Total</label>
                        <input type="text" wire:model="total" class="form-control">
                        @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" wire:model="brand" class="form-control">
                        @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Item Condition</label>
                        <select wire:model="itemcondition" class="form-select form-control">
                            <option selected>Select item condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Badly Damaged">Badly Damaged</option>
                        </select>
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
<div wire:ignore.self class="modal fade" id="deleteWarehousesModal" tabindex="-1" aria-labelledby="deleteWarehousesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteWarehousesModalLabel">Delete Goods</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyWarehouses">
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

<!-- View Warehouses Modal -->
<div wire:ignore.self class="modal fade" id="viewWarehousesModal" tabindex="-1" aria-labelledby="viewWarehousesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewWarehousesModalLabel">Item Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateGoods">
                <div class="modal-body">
                   <table class="table table-bordered">
                       <tbody>
                           <tr>
                               <th>ID</th>
                               <th>{{ $view_warehouses_id }}</th>
                           </tr>

                           <tr>
                            <th>Name item</th>
                            <th>{{ $view_warehouses_name }}</th>
                        </tr>

                        <tr>
                            <th>Total</th>
                            <th>{{ $view_warehouses_total }}</th>
                        </tr>

                        <tr>
                            <th>Brand</th>
                            <th>{{ $view_warehouses_brand }}</th>
                        </tr>

                        <tr>
                            <th>Item Condition</th>
                            <th>{{ $view_warehouses_itemcondition }}</th>
                        </tr>

                        <tr>
                            <th>Product Code</th>
                            <th>{{ $view_warehouses_productcode }}</th>
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