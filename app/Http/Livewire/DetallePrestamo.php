<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DetallePrestamo extends Component
{
    use AuthorizesRequests;

    public $loan;
    public $selected_id;
    public $open_pago=false, $open_delete=false;
    public $quantity, $balance, $pago;

    public function mount(Loan $loan)
    {
        $this->loan = $loan;
    }

    protected $rules = [
        'quantity' => 'required|lte:balance'
    ];

    protected $validationAttributes = [
        'quantity' => 'cantidad',
    ];

    public function pago($id)
    {
        $this->balance = $this->loan->balance;
        $this->open_pago = true;
    }

    public function destroy($id)
    {
        $registro = Payment::findOrFail($id);
        $this->selected_id = $id;
        $this->pago = $registro->quantity;
        $this->open_delete = true;
    }

    public function delete()
    {
        if ($this->selected_id) {
            $aumentar = Loan::find($this->loan->id);
            $aumentar->update([
                'balance' => ($this->loan->balance + $this->pago)
            ]);

            $registro = Payment::find($this->selected_id);
            $registro->delete();
        }

        $this->open_delete = false;

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Préstamo eliminado!']);

    }

    public function save()
    {
        $this->validate();
        Payment::create([
            'payment_date' => Carbon::now(),
            'quantity' => $this->quantity,
            'loan_id' => $this->loan->id,
            'user_id' => auth()->user()->id
        ]);

        if ($this->loan->id) {
            $registro = Loan::find($this->loan->id);
            $registro->update([
                'balance' => ($this->balance - $this->quantity)
            ]);
        }

        $this->open_pago = false;
        $this->reset(['balance','quantity']);
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Pago registrado correctamente.']);
        $this->emit('render');
    }

    public function render()
    {
        $this->authorize('loan', $this->loan);
        $loan_payments = Loan::where('id', $this->loan->id)->first();
        return view('livewire.detalle-prestamo', compact('loan_payments'));
    }
}
