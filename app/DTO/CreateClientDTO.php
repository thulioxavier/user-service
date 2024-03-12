<?php

namespace App\DTO;

use App\Http\Requests\StoreAndUpdateClientRequest;

class CreateClientDTO
{
    public function __construct(
        public ?string $id,
        public string $name,
        public string $email,
        public string $cpf,
        public string $birthdate,
        public bool $active,
        public string $street,
        public string $street_number,
        public string $zipcode,
        public string $city,
        public string $state
    ) {
    }

    public static function makeFromRequest(StoreAndUpdateClientRequest $request, ?string $id = null): CreateClientDTO
    {
        return new self(
            $id,
            $request->input('name'),
            $request->input('email'),
            $request->input('cpf'),
            $request->input('birthdate'),
            (bool) $request->input('active'),
            $request->input('street'),
            $request->input('street_number'),
            $request->input('zipcode'),
            $request->input('city'),
            $request->input('state')
        );
    }
}
