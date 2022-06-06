<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goods;

class GoodsUserShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $stock, $brand, $productcode, $photo;
    
    public $view_goods_id, $view_goods_name, $view_goods_stock, $view_goods_brand, $view_goods_productcode;

    public $search = '';

    
    protected function rules()
    {
        return [
            'name' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'productcode' => 'required',
            
        ];
    }

    public function viewGoodsUser(int $goods_id)
    {
        $goods = Goods::find($goods_id);
        

            $this->view_goods_id = $goods->id;
            $this->view_goods_name = $goods->name;
            $this->view_goods_stock = $goods->stock;
            $this->view_goods_brand = $goods->brand;
            $this->view_goods_productcode = $goods->productcode;

    }

    public function closeModal()
    {
        
    }

    public function render()
    {
        $goods = Goods::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.goods-user-show',['goods' => $goods]);
    }
}
