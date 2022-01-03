<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;
class PrestamosComponent extends Component
{
    use WithPagination;

    public $search;

    public $open_delete=false;
    public $code, $selected_id;

    public function destroy($id)
    {
        $registro = Loan::findOrFail($id);
        $this->selected_id = $id;
        $this->code = $registro->code;
        $this->open_delete = true;
    }

    public function delete()
    {
        if ($this->selected_id) {
            $registro = Loan::find($this->selected_id);
            $registro->delete();
            $this->open_delete = false;

            $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Préstamo eliminado!']);
        }
    }

    public function render()
    {
        $loans = Loan::where('user_id', auth()->user()->id)
                                ->where('code', 'LIKE', '%'.$this->search.'%')
                                ->where('balance', '>', '0')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

        return view('livewire.prestamos-component', compact('loans'));
    }
}
