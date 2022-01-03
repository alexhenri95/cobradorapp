<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;

class HistorialComponent extends Component
{
    use WithPagination;

    public $search;
    
    public function render()
    {
        $loans = Loan::where('user_id', auth()->user()->id)
                                ->where('code', 'LIKE', '%'.$this->search.'%')
                                ->where('balance', '=', '0')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

        return view('livewire.historial-component', compact('loans'));
    }
}
