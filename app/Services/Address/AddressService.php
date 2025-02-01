<?php

namespace App\Services\Address;

use App\Repositories\Interfaces\AddressRepositoryInterface;
use App\Services\Address\AddressServiceInterface;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class AddressService implements AddressServiceInterface
{
    protected $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function createAddress(object $shippingDetails, int $phone)
    {

        // dd($shippingDetails);

        // Format the $address array
        $address = [
            'user_id' => Auth()->user()->id,
            'phone' => $phone,  // Get the phone from metadata
            'address_line_1' => $shippingDetails->address->line1,  // Concatenate address lines
            'address_line_2' => $shippingDetails->address->line2 ? $shippingDetails->address->line2 : null,  // Add line2 if available, otherwise null
            'city' => $shippingDetails->address->city,  // City from shipping address
            'state' => $shippingDetails->address->state,  // State from shipping address
            'country' => $shippingDetails->address->country,  // Country from shipping address
            'zip_code' => $shippingDetails->address->postal_code,  // Postal code from shipping address
        ];
        return $this->addressRepository->createAddress($address);
    }

    public function updateAddress(int $addressId, Request $request)
    {
        return $this->addressRepository->updateAddress($addressId, $request->all());
    }
}
