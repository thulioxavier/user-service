<?php

namespace App\Implementations;

use App\DTO\CreateAddressDTO;
use App\DTO\EditAddressDTO;
use App\Models\Address;
use App\Repositories\IAddressRepository;
use stdClass;


class AddressImplementation implements IAddressRepository
{
    public function __construct(
        protected Address $model
    ) {
    }

    public function update(EditAddressDTO $data): stdClass | null
    {
        $array = (array) $data;

        return (object) $this->model->find($data->id)->update($array);
    }

    public function create(CreateAddressDTO $data): stdClass
    {
        $address = $this->model->create((array) $data);
        return (object) $address->toArray();
    }
}
