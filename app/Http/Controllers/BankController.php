<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Services\Bank\V1\BankService;

class BankController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BankRequest $request, BankService $service)
    {
        $res = $service->store($request);

        return response()->json([
            'status' => $res['status'],
            'data' => $res['data'],
            'message' => $res['message'],
        ], $res['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param Bank $bank
     * @param BankService $service
     * @return array
     */
    public function show(Bank $bank, BankService $service)
    {
        return $service->show($bank->slug);

       /*return response()->json([
            'status' => $res['status'],
            'data' => $res['data'],
            'message' => $res['message'],
        ], $res['code']);*/
    }

}
