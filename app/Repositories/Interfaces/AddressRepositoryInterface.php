<?php

namespace App\Repositories\Interfaces;

interface AddressRepositoryInterface
{
    public function createAddress(array $addressData);
    public function updateAddress(int $addressId, array $addressData);
    public function getAddressByUserId(int $userId);
}
