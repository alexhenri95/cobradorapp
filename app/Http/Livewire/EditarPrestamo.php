<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EditarPrestamo extends Component
{
    use AuthorizesRequests;

    public $customers;

    public $start_date, $end_date;
    public $description, $quantity, $interest, $payments_number, $final_payment, $payment_type, $time;
    public $loan_id, $customer_id;
    public $summary = false;
    public $message = "";

    protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'description' => 'required',
        'payment_type' => 'required',
        'time' => 'required',
        'final_payment' => 'required',
        'quantity' => 'required|numeric',
        'payments_number' => 'required|numeric',
        'interest' => 'required|numeric',
    ];

    protected $validationAttributes = [
        'start_date' => 'fecha de unicio',
        'end_date' => 'fecha de fin',
        'description' => 'descripción',
        'payment_type' => 'tipo de pago',
        'quantity' => 'monto',
        'payments_number' => 'cuotas',
        'interest' => 'interés',
        'time' => 'tiempo',
        // 'customer_id' => 'cliente',
        'final_payment' => 'pago final'
    ];

    public function mount(Loan $loan)
    {
        $this->loan = $loan;
        $this->customers = Customer::all();
        $this->start_date = $loan->start_date;
        $this->end_date = $loan->end_date;
        $this->description = $loan->description;
        $this->payment_type = $loan->payment_type;
        $this->time = $loan->time;
        $this->quantity = $loan->quantity;
        $this->payments_number = $loan->payments_number;
        $this->interest = $loan->interest;
        $this->final_payment = $loan->final_payment;
        $this->customer_id = $loan->customer->name;
        $this->loan_id = $loan->id;
    }

    public function calcular()
    {
        $this->validate([
            'quantity' => 'required|numeric',
            'payments_number' => 'required|numeric',
            'interest' => 'required|numeric',
        ]);
        
        if($this->payment_type === "1"){

            $this->message="has elegido el metodo de pago corriente";

        }else if($this->payment_type === "2"){

            if($this->time === "1"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 360, 3);
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas diarios de " . " $" . $this->final_payment/$this->payments_number;

            }
            else if($this->time === "2"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 52, 3);
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas semanales de " . " $" . $this->final_payment/$this->payments_number;

            }else if($this->time === "3"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 12, 3);
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas mensuales de " . " $" . $this->final_payment/$this->payments_number;

            }else if($this->time === "4"){

                $i = round($this->interest / 100, 3);
                $payment_number = $this->payments_number;
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas anuales de " . " $" . $this->final_payment/$this->payments_number;

            }

            $this->summary = true;

        }   
           
    }

    public function save()
    {
        $this->validate();

        $registro = Loan::find($this->loan_id);

        $registro->update([
            'start_date' => Carbon::parse($this->start_date),
            'end_date' => Carbon::parse($this->end_date),
            'description' => $this->description,
            'payment_type' => $this->payment_type,
            'quantity' => $this->quantity,
            'payments_number' => $this->payments_number,
            'balance' => $this->quantity,
            'interest' => $this->interest,
            'time' => $this->time,
            'final_payment' => $this->final_payment,
            'user_id' => auth()->user()->id 
        ]);

        $this->reset(['start_date', 'end_date', 'description', 'payment_type', 'quantity', 'payments_number', 'interest', 'time', 'customer_id', 'final_payment']);

        $this->summary = false;
        $this->message = "";

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Préstamo actualizado correctamente.']);

        return redirect()->route('prestamos.index');

    }

    public function render()
    {
        $this->authorize('loan', $this->loan);
        return view('livewire.editar-prestamo');
    }
}
