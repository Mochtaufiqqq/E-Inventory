<?php

namespace App\Http\Livewire;

use App\Models\Goods;
use Livewire\Component;
use Livewire\WithPDF;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade as pdf;
use Illuminate\Support\Facades\DB;



class GoodsShow extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $name, $stock, $brand, $productcode;
    
    public $view_goods_id, $view_goods_name, $view_goods_stock, $view_goods_brand, $view_goods_productcode;

    public $search = '';
    public $kd;

    
    protected function rules()
    {
        return [
            'name' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'productcode' => 'required',
             
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveGoods()
    {
        $validatedData = $this->validate(); 

        Goods::create($validatedData);
        session()->flash('message', 'Item Add Succesfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

    }

    public function resetInput()
    {
        $this->name = '';
        $this->stock = '';
        $this->brand = '';
        $this->productcode = '';
        
    }

    public function editGoods(int $goods_id)
    {
        $goods = Goods::find($goods_id);
        if($goods){

            $this->goods_id = $goods->id;
            $this->name = $goods->name;
            $this->stock = $goods->stock;
            $this->brand = $goods->brand;
            $this->productcode = $goods->productcode;
        }else{
            return redirect()->to('/goods');
        }
    }

    public function updateGoods()
    {
        $validatedData = $this->validate();

        Goods::where('id',$this->goods_id)->update([
            'name' => $validatedData['name'],
            'stock' => $validatedData['stock'],
            'brand' => $validatedData['brand'],
            'productcode' => $validatedData['productcode']
        ]);
        session()->flash('message','Item Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteGoods(int $goods_id)
    {
        $this->goods_id = $goods_id;
    }

    public function destroyGoods()
    {
        Goods::find($this->goods_id)->delete();
        session()->flash('message','Item Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function viewGoods(int $goods_id)
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
        $this->resetInput();
    }

    public function render()
    {
        $goods = Goods::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.goods-show',['goods' => $goods]);
    }

    public function reportpdf(){
        $goods = Goods::all();

        $pdf = PDF::loadview('livewire.reportpdf',['goods'=> $goods])->setOptions(['defaultFont' => 'sans-serif']);;
    	return $pdf->download('report-goods.pdf');
        return redirect('livewire.goods-show');
    }
}
