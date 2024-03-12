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
                <script>
                    console.log(@json($clients))
                </script>
                <tr onclick="window.location='{{ route('client.show', ['id' => $client['id']]) }}'">
                    <td>{{ $client['name'] }}</td>
                    <td>{{ $client['email'] }}</td>
                    <td>{{ $client['cpf'] }}</td>
                    <td>{{ $client['birthdate'] }}</td>
                    <td> @checked($client['active']) </td>
                    <td>
                        <form action="{{ route('client.destroy', $client['id']) }}" method="POST">
                            @method('delete')
                            @csrf()
                            <button type="submit">Apagar</button>
                        </form>
                        <a href="{{ route('client.edit', $client['id']) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
