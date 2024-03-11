<div class="">
    <h1 class="text__h1">Clientes Cadastrados</h1>

    <table>
        <thead>
            <th>name</th>
            <th>email</th>
            <th>cpf</th>
            <th>birthdate</th>
            <th>active</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->cpf}}</td>
                    <td>{{$client->birthdate}}</td>
                    <td> @checked($client->active) </td>
                    <td> > </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

