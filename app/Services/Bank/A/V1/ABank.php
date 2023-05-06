<?php

namespace App\Services\Bank\A\V1;

use App\Services\Bank\BankInterface;

class ABank implements BankInterface
{
    public function getBalance(): array
    {
        $bank = auth()->user()->banks->firstWhere('slug','a');

        return [
            'amount' => $bank->pivot->amount
        ];
    }
}
