<?php

namespace App\Repositories;

use App\DTO\CreateClientDTO;
use App\DTO\EditClientDTO;
use stdClass;

interface IClientRepository
{
    public function findAll(string $filter = null): array;
    public function findOne(string $id): stdClass | null;
    public function destroy(string $id): void;
    public function update(EditClientDTO $data): stdClass | null;
    public function create(CreateClientDTO $data): stdClass;
}
