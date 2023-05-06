<?php

namespace App\Repository;

interface Repository
{
    public function model();

    public function store($request);
}
