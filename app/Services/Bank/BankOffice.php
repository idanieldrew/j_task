<?php

namespace App\Services\Bank;

class BankOffice
{
    public function getBalance(BankInterface $bank)
    {
        return $bank->getBalance();
    }
}
