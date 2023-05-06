<?php

namespace App\Services\User\V1;

use App\Http\Resources\User\V1\UserResource;
use App\Models\User;
use App\Repository\Bank\V1\BankRepo;
use App\Repository\User\V1\UserRepo;
use App\Services\Service;

class UserService implements Service
{
    public function __construct(public UserRepo $repo)
    {
    }

    /**
     * Store Users
     *
     * @param
     * @return array
     */
    public function store($request)
    {
        $model = $this->repo->store($request);
        $token = $model->createToken('token')->plainTextToken;

        // just for faking data
        $this->fakeData($model);

        return $this->response(
            'success',
            [
                'user' => new UserResource($model),
                'token' => $token
            ],
            'success operation',
            201
        );
    }

    public function fakeData(User $user)
    {
        $banks = (new BankRepo)->find(['a', 'b', 'c']);

        $user->banks()->syncWithPivotValues($banks, ['amount' => 50]);
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
