<?php

namespace App\Services\Bank;

interface BankInterface
{
    public function getBalance(): array;
}
