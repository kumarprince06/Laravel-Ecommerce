<?php

namespace App\Services\Address;

use Illuminate\Http\Request;

interface AddressServiceInterface
{
    public function createAddress(object $address, int $phone);
    public function updateAddress(int $addressId, Request $request);
}
