<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function buscar(Request $request)
    {
        //Validar
        $data = $request->validate([
            'code' => 'required',
        ]); 

        //Asignar valores
        $code = $data['code'];

        $loan = Loan::where('code', $code)->first();

        if(!empty($loan)){
            return view('buscador.index', compact('loan','request'));
        }else{
            return view('buscador.index', compact('code','loan'));
        }                               
        
    }

    public function resultados()
    {
        return 'mostrando resultados';
    }

    public function pdfInfo(Request $request, $id){
        $loan = Loan::findOrFail($id);

        $info_pdf = \PDF::loadView('pdf.info_pdf', compact('loan'));
        return $info_pdf->download('info_prestamo.pdf');
    }
}
