<?php

namespace App\Implementations;

use App\DTO\CreateClientDTO;
use App\DTO\EditClientDTO;
use App\Models\Client;
use App\Repositories\IClientRepository;
use stdClass;


class ClientImplementation implements IClientRepository
{
    public function __construct(
        protected Client $model
    ) {
    }

    public function findAll(string $filter = null): array
    {
        return $this->model->where(function ($quety) use ($filter) {
            if ($filter) {
                $quety->where('name', $filter);
                $quety->where('email', $filter);
                $quety->where('cpf', $filter);
            }
        })->get()->toArray();
    }

    public function findOne(string $id): stdClass | null
    {
        $client = $this->model->find($id);

        if (!$client) return null;

        return (object) $client->toArray();
    }

    public function destroy(string $id): void
    {
        $this->model->findOrFail($id)->delete($id);
    }

    public function update(EditClientDTO $data): stdClass | null
    {
        $array = (array) $data;

        return (object) $this->model->find($data->id)->update($array);
    }

    public function create(CreateClientDTO $data): stdClass
    {
        $client = $this->model->create((array) $data);
        return (object) $client->toArray();
    }
}
