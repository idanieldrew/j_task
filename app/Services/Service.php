<?php

namespace App\Services;

interface Service
{
    public function response($status, $data, $message, $code);
}
