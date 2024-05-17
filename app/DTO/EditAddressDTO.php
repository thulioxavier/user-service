<?php

namespace App\DTO;


class EditAddressDTO
{
    public function __construct(
        public string $id,
        public string $street,
        public string $street_number,
        public string $zipcode,
        public string $city,
        public string $state,
        public string $client_id,
    ) {
    }

    public static function makeData(EditAddressDTO $data): EditAddressDTO
    {
        return new self(
            $data->id,
            $data->street,
            $data->street_number,
            $data->zipcode,
            $data->city,
            $data->state,
            $data->client_id,
        );
    }
}
