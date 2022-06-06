<!-- View Goods Modal -->
<div wire:ignore.self class="modal fade" id="viewGoodsUserModal" tabindex="-1" aria-labelledby="viewGoodsUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGoodsModalLabel">Item Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{ $view_goods_id }}</th>
                        </tr>

                        <tr>
                            <th>Name item</th>
                            <th>{{ $view_goods_name }}</th>
                        </tr>

                        <tr>
                            <th>Stock</th>
                            <th>{{ $view_goods_stock }}</th>
                        </tr>

                        <tr>
                            <th>Brand</th>
                            <th>{{ $view_goods_brand }}</th>
                        </tr>

                        <tr>
                            <th>Product Code</th>
                            <th>{{ $view_goods_productcode }}</th>
                        </tr>

                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/create') }}" class="btn btn-primary">Borrow</a>
                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>