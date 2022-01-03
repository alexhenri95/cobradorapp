<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesComponent extends Component
{
    use WithPagination;

    public $search = ''; 

    public $customer, $selected_id;
    public $dni, $name, $address, $phone, $email;
    public $open_create=false, $open_delete=false ,$open_edit=false, $open_show=false;

    protected $rules = [
        'dni' => 'required|min:10|max:10|unique:customers,dni',
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ];

    protected $validationAttributes = [
        'dni' => 'cédula',
        'name' => 'nombre',
        'phone' => 'teléfono',
        'address' => 'dirección',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset(['dni','name','address','phone','email']);
        $this->open_create = true;
    }

    public function edit($id)
    {
        $registro = Customer::findOrFail($id);
        $this->selected_id = $id;
        $this->customer = $registro;
        $this->dni = $registro->dni;
        $this->name = $registro->name;
        $this->address = $registro->address;
        $this->phone = $registro->phone;
        $this->email = $registro->email;
        $this->open_edit = true;
    }

    public function show($id)
    {
        $registro =  Customer::findOrFail($id);
        $this->selected_id = $id;
        $this->dni = $registro->dni;
        $this->name = $registro->name;
        $this->address = $registro->address;
        $this->phone = $registro->phone;
        $this->email = $registro->email;
        $this->open_show = true;
    }

    public function destroy($id)
    {
        $registro = Customer::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $registro->name;
        $this->open_delete = true;
    }

    public function store()
    {
        $this->validate();

        Customer::create([
            'dni' => $this->dni,
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->open_create = false;
        $this->reset(['dni','name','address','phone','email']);
        $this->emit('render');

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Cliente registrado!']);
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'dni' => 'required|unique:clientes,cedula,' . $this->selected_id,
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        
        if ($this->selected_id) {
            $registro = Customer::find($this->selected_id);
            $registro->update([
                'dni' => $this->dni,
                'user_id' => auth()->user()->id,
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);
            $this->reset(['dni','name','address','phone', 'email']);
            $this->open_edit = false;

            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Cliente actualizado!']);
        }
    }

    public function delete()
    {
        if ($this->selected_id) {
            $registro = Customer::find($this->selected_id);
            $registro->delete();
            $this->open_delete = false;

            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Cliente eliminado!']);
        }
    }

    public function render()
    {
        $customers = Customer::where('user_id', auth()->user()->id)
                                ->where('name', 'LIKE', '%'.$this->search.'%')
                                ->orderBy('name', 'asc')
                                ->paginate(5);
        
        $loans = Loan::all();
        return view('livewire.clientes-component', compact('customers', 'loans'));
    }
}
