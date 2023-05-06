<?php

namespace App\Services\Bank\V1;

use App\Http\Resources\Bank\V1\BankResource;
use App\Repository\Bank\V1\BankRepo;
use App\Services\Bank\A\V1\ABank;
use App\Services\Bank\BankOffice;
use App\Services\Service;

class BankService implements Service
{
    public function __construct(public BankRepo $repo)
    {
    }

    public function store($request)
    {
        $model = $this->repo->store($request);

        return $this->response(
            'success',
            new BankResource($model),
            'success operation',
            '201'
        );
    }

    public function show($request)
    {
        $banks = $this->bankDriver($request);

        $bank = new BankOffice();
        $res = $bank->getBalance(new $banks);

        return $this->response(
            'success',
            $res,
            'success get val',
            '200'
        );
    }

    private function bankDriver(string $bank)
    {
        return config("bank.banks.$bank");
    }

    public function response($status, $data, $message, $code)
    {
        return [
            'status' => $status,
            'data' => $data,
            'message' => $message,
            'code' => $code
        ];
    }
}
