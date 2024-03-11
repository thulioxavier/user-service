<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController {

    public function create(Client $client){

        return view('create-client');
    }

    public function store(Request $request, Client $client){

        $data = $request->except('_token');

        $response = $client->create($data);

        return redirect()->route('clients.findAll');
    }

    public function findAll(Client $client){

        $clients = $client->all();

        return view('list-clients', [
            'clients' => $clients
        ]);
    }
};
