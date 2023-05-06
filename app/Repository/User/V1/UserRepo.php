<?php

namespace App\Repository\User\V1;

use App\Models\User;
use App\Repository\Repository;
use Illuminate\Support\Facades\Hash;

class UserRepo implements Repository
{
    public function model()
    {
        return User::query();
    }

    public function store($request)
    {
        return $this->model()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
