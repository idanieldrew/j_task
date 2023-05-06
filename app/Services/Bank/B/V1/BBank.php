<?php

namespace App\Services\Bank\B\V1;

use App\Services\Bank\BankInterface;

class BBank implements BankInterface
{

    public function getBalance(): array
    {
        $bank = auth()->user()->banks->firstWhere('slug', 'b');

        return [
            'balance' => $bank->pivot->amount
        ];
    }
}
