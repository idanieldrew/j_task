<?php

namespace App\Repository\Bank\V1;

use App\Models\Bank;
use App\Repository\Repository;
use Illuminate\Support\Str;

class BankRepo implements Repository
{

    public function model()
    {
        return Bank::query();
    }

    public function find(array $slug)
    {
        return $this->model()
            ->whereIn('slug', $slug)
            ->get()
            ->pluck('id')
            ->toArray();
    }

    public function store($request)
    {
        return $this->model()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
    }
}
