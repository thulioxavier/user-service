<?php

namespace App\Http\Controllers\Client;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientController
{

    public function create()
    {

        return view('create-client');
    }

    public function store(Request $request, Client $client, Address $address)
    {

        $data = $request->except('_token');
        $client_id = Str::uuid();

        $client->create(['id' => $client_id, ...$data]);

        $address->create([
            'street' => $data['street'],
            'street_number' => $data['street_number'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'state' => $data['state'],
            'client_id' => $client_id
        ]);

        return redirect()->route('clients.findAll');
    }

    public function findAll(Client $client)
    {

        $result = $client->all();

        return view('list-clients', [
            'clients' => $result
        ]);
    }

    public function show($id, Client $client)
    {

        $result = $client->find($id);

        if (!$result) {
            return redirect()->back();
        }

        return view('show-client', [
            'client' => $result
        ]);
    }

    public function edit(string $id, Client $clientModel)
    {

        $client = $clientModel->where('id', $id)->first();

        if (!$client) {
            return back();
        }

        return view('edit-client', compact('client'));
    }

    public function update(Request $request, string $id, Client $clientModel, Address $address)
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

    public function destroy(string $id, Client $clientModel)
    {
        $client = $clientModel->where('id', $id)->first();

        if (!$client) {
            return back();
        }

        $client->delete();

        return redirect()->route('clients.findAll');
    }
};
