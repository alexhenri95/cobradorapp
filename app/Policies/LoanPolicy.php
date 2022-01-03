<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanPolicy
{
    use HandlesAuthorization;

    public function loan(User $user, Loan $loan)
    {
        if ($user->id === $loan->user_id) {
            return true;
        }else{
            return false;
        }
    }
}
