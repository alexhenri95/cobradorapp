<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Loan;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
use Livewire\Component;

class RegistrarPrestamo extends Component
{
    public $customers;

    public $start_date;
    public $end_date;
    public $description, $quantity, $interest, $payments_number, $final_payment, $customer_id;
    public $summary = false;
    public $payment_type="2";
    public $time="3";
    public $message;

    public function mount()
    {
        $this->customers = Customer::where('user_id', auth()->user()->id)
                                    ->orderBy('name', 'asc')
                                    ->get();
    }

    protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'description' => 'required',
        'payment_type' => 'required',
        'time' => 'required',
        'customer_id' => 'required',
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
        'customer_id' => 'cliente',
        'final_payment' => 'pago final'
    ];

    public function calcular()
    {
        $this->validate([
            'quantity' => 'required|numeric',
            'payments_number' => 'required|numeric',
            'interest' => 'required|numeric',
        ]);
        
        if($this->payment_type === "1"){

            $i = round($this->interest / 100, 3);
            $payment_number = $this->payments_number;
            $resultado = round((1 + ($payment_number * $i)),3);
            $this->final_payment = round($resultado * $this->quantity);

            $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number solo pago";

        

        }else if($this->payment_type === "2"){

            if($this->time === "1"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 30, 3);
                $resultado = round($i * $payment_number * $this->quantity);
                $this->final_payment = round($resultado + $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas diarios de " . " $" . round($this->final_payment/$this->payments_number, 2);

            }
            else if($this->time === "2"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 52, 3);
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas semanales de " . " $" . round($this->final_payment/$this->payments_number, 2);

            }else if($this->time === "3"){

                $i = round($this->interest / 100, 3);
                $payment_number = round($this->payments_number / 12, 3);
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas mensuales de " . " $" . round($this->final_payment/$this->payments_number, 2);

            }else if($this->time === "4"){

                $i = round($this->interest / 100, 3);
                $payment_number = $this->payments_number;
                $resultado = round((1 + ($payment_number * $i)),3);
                $this->final_payment = round($resultado * $this->quantity);

                $this->message = "El monto final a pagar es de $$this->final_payment con $this->payments_number cuotas anuales de " . " $" . round($this->final_payment/$this->payments_number, 2);

            }
            
        }    
        $this->summary = true;
           
    }

    public function save()
    {
        $this->validate();

        Loan::create([
            'code' => time() . auth()->user()->id,
            'start_date' => Carbon::parse($this->start_date),
            'end_date' => Carbon::parse($this->end_date),
            'description' => $this->description,
            'payment_type' => $this->payment_type,
            'quantity' => $this->quantity,
            'payments_number' => $this->payments_number,
            'balance' => $this->final_payment,
            'interest' => $this->interest,
            'time' => $this->time,
            'final_payment' => $this->final_payment,
            'customer_id' => $this->customer_id,
            'user_id' => auth()->user()->id 
        ]);

        $this->reset(['start_date', 'end_date', 'description', 'payment_type', 'quantity', 'payments_number', 'interest', 'time', 'customer_id', 'final_payment']);

        $this->summary = false;

        $this->message = "";

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Préstamo registrado correctamente.']);

    }

    public function render()
    {
        return view('livewire.registrar-prestamo');
    }
}
