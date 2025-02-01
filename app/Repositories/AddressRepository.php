<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Interfaces\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
    public function createAddress(array $addressData)
    {
        return Address::create($addressData);
    }

    public function updateAddress(int $addressId, array $addressData)
    {
        $address = Address::findOrFail($addressId);
        $address->update($addressData);
        return $address;
    }

    public function getAddressByUserId(int $userId)
    {
        return Address::where('user_id', $userId)->first();
    }
}
