<?php

namespace App\Repositories;

use App\DTO\CreateAddressDTO;
use App\DTO\EditAddressDTO;
use stdClass;

interface IAddressRepository
{
    public function update(EditAddressDTO $data): stdClass | null;
    public function create(CreateAddressDTO $data): stdClass;
}
