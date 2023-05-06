<?php

namespace App\Services\Bank\C\V1;

use App\Services\Bank\BankInterface;

class CBank implements BankInterface
{

    public function getBalance(): array
    {
        $bank = auth()->user()->banks->firstWhere('slug', 'c');

        return [
            'value' => $bank->pivot->amount
        ];
    }
}
