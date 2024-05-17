<?php

namespace App\DTO;


class CreateAddressDTO
{
    public function __construct(
        public string $street,
        public string $street_number,
        public string $zipcode,
        public string $city,
        public string $state,
        public string $client_id,
    ) {
    }

    public static function makeData(CreateAddressDTO $data): CreateAddressDTO
    {
        return new self(
            $data->street,
            $data->street_number,
            $data->zipcode,
            $data->city,
            $data->state,
            $data->client_id,
        );
    }
}
