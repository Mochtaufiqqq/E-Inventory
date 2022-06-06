<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Warehouses;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade as pdf;



class WarehousesShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $total, $brand, $itemcondition, $productcode;

    public $view_warehouses_id, $view_warehouses_name, $view_warehouses_total, $view_warehouses_brand, $view_warehouses_itemcondition, $view_warehouses_productcode;

    public $search = '';

    
    protected function rules()
    {
        return [
            'name' => 'required',
            'total' => 'required',
            'brand' => 'required',
            'itemcondition' => 'required',
            'productcode' => 'required'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveWarehouses()
    {
        $validatedData = $this->validate();

        Warehouses::create($validatedData);
        session()->flash('message', 'Item Add Succesfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

    }

    public function resetInput()
    {
        $this->name = '';
        $this->total = '';
        $this->brand = '';
        $this->itemcondition = '';
        $this->productcode = '';
    }

    public function editWarehouses(int $warehouses_id)
    {
        $warehouses = Warehouses::find($warehouses_id);
        if($warehouses){

            $this->warehouses_id = $warehouses->id;
            $this->name = $warehouses->name;
            $this->total = $warehouses->total;
            $this->brand = $warehouses->brand;
            $this->itemcondition = $warehouses->itemcondition;
            $this->productcode = $warehouses->productcode;
        }else{
            return redirect()->to('/warehouse');
        }
    }

    public function updateWarehouses()
    {
        $validatedData = $this->validate();

        Warehouses::where('id',$this->warehouses_id)->update([
            'name' => $validatedData['name'],
            'total' => $validatedData['total'],
            'brand' => $validatedData['brand'],
            'itemcondition' => $validatedData['itemcondition'],
            'productcode' => $validatedData['productcode']
        ]);
        session()->flash('message','Item Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteWarehouses(int $warehouses_id)
    {
        $this->warehouses_id = $warehouses_id;
    }

    public function destroyWarehouses()
    {
        Warehouses::find($this->warehouses_id)->delete();
        session()->flash('message','Item Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function viewWarehouses(int $warehouses_id)
    {
        $warehouses = Warehouses::find($warehouses_id);
        

            $this->view_warehouses_id = $warehouses->id;
            $this->view_warehouses_name = $warehouses->name;
            $this->view_warehouses_total = $warehouses->total;
            $this->view_warehouses_brand = $warehouses->brand;
            $this->view_warehouses_itemcondition = $warehouses->itemcondition;
            $this->view_warehouses_productcode = $warehouses->productcode;

    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        $warehouses = Warehouses::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.warehouses-show',['warehouses' => $warehouses]);
    }

    public function reportpdfwarehouse(){
        $warehouses = Warehouses::all();

        $pdf = PDF::loadview('livewire.reportpdfwarehouse',['warehouses'=> $warehouses])->setOptions(['defaultFont' => 'sans-serif']);;
    	return $pdf->download('report-warehouse.pdf');
        return redirect('livewire.warehouses-show');
    }

}
