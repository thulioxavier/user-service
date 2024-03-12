<?php

namespace App\Http\Controllers\Client;

use App\DTO\CreateClientDTO;
use App\Http\Requests\StoreAndUpdateClientRequest;
use App\Models\Address;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/** @var \App\DTO\CreateClientDTO $make */


class ClientController extends BaseController
{

    public function __construct(
        protected ClientService $service
    ) {
    }

    public function create()
    {

        return view('create-client');
    }

    public function store(StoreAndUpdateClientRequest $request)
    {
        $make = CreateClientDTO::makeFromRequest($request);
        $this->service->create($make);

        return redirect()->route('clients.findAll');
    }

    public function findAll(Request $request)
    {

        $result = $this->service->findAll($request->filter);

        return view('list-clients', [
            'clients' => $result
        ]);
    }

    public function show($id)
    {

        $client = $this->service->findOne($id);


        if (!$client) {
            return redirect()->back();
        }


        return view('show-client', compact('client'));
    }

    public function edit(string $id, Client $clientModel)
    {

        $client = $clientModel->where('id', $id)->first();

        if (!$client) {
            return back();
        }

        return view('edit-client', compact('client'));
    }

    public function update(StoreAndUpdateClientRequest $request, string $id, Client $clientModel, Address $address)
    {

        $client = $clientModel->where('id', $id)->first();

        if (!$client) {
            return back();
        }

        $data = $request->except('_token');

        $client->update($data);

        if ($client->address) {
            $address::where('id', $client->address->id)->update([
                'street' => $data['street'],
                'street_number' => $data['street_number'],
                'zipcode' => $data['zipcode'],
                'city' => $data['city'],
                'state' => $data['state'],
            ]);
        }

        return redirect()->route('clients.findAll');
    }

    public function destroy(string $id)
    {
        $this->service->destroy($id);

        return redirect()->route('clients.findAll');
    }
};
