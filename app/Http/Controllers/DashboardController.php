<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $total_customers = Customer::where('user_id', auth()->user()->id)->count();
        $loan_in_proccess = Loan::where('user_id', auth()->user()->id)->where('balance' ,'>', '0')->count();
        $total_loans = Loan::where('user_id', auth()->user()->id)->sum('quantity');
        $total_payments = Payment::where('user_id', auth()->user()->id)->sum('quantity');
        return view('dashboard', compact('total_customers', 'loan_in_proccess','total_loans', 'total_payments'));
    }
}
