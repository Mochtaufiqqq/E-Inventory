<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Barryvdh\DomPDF\Facade as pdf;

class UserShow extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $email;
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            
        ];
    }

   
    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->address = '';
        
    }

    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){

            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->address = $user->address;
        }else{
            return redirect()->to('/user');
        }
    }

    public function updateUser()
    {
        $validatedData = $this->validate();

        User::where('id',$this->user_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address']
        ]);
        session()->flash('message','User Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.user-show',['users' => $users]);
    }

    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyUser()
    {
        User::find($this->user_id)->delete();
        session()->flash('message','User Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function closeModal()
    {
        $this->resetInput();
        
    }
    public function reportpdfuser(){
        $users = User::all();

        $pdf = PDF::loadview('livewire.reportpdfuser',['users'=> $users])->setOptions(['defaultFont' => 'sans-serif']);;
    	return $pdf->download('report-user.pdf');
        return redirect('livewire.user-show');
    }

}

