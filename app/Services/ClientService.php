<?php


namespace App\Services;

use App\DTO\CreateAddressDTO;
use App\DTO\CreateClientDTO;
use App\Repositories\IAddressRepository;
use App\Repositories\IClientRepository;
use Illuminate\Support\Str;

use stdClass;


class ClientService
{


    public function __construct(
        protected IClientRepository $clientRepositoy,
        protected IAddressRepository $addressRepositoy
    ) {
    }

    public function findAll(string $filter = null): array
    {
        return $this->clientRepositoy->findAll($filter);
    }

    public function findOne(string $id): stdClass | null
    {
        return (object) $this->clientRepositoy->findOne($id);
    }
    public function destroy(string $id): void
    {
        $this->clientRepositoy->destroy($id);
    }

    public function update()
    {
    }

    public function create(CreateClientDTO $data)
    {
        $client_id = Str::uuid();

        $data->id = $client_id;

        $this->clientRepositoy->create($data);

        $addressData = new CreateAddressDTO(
            $data->street,
            $data->street_number,
            $data->zipcode,
            $data->city,
            $data->state,
            $client_id
        );

        $make = CreateAddressDTO::makeData($addressData);


        $this->addressRepositoy->create($make);
    }
}
