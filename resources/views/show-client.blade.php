<div class="">
    <h1 class="text__h1">{{ $client->name }}</h1>

    <a href="{{ route('client.edit', $client->id) }}">Editar</a>
    <form action="{{ route('client.destroy', $client->id) }}" method="POST">
        @method('delete')
        @csrf()
        <button type="submit">Apagar</button>
    </form>

    <div>
        <h4>Nome</h4>
        <p>{{ $client->name }}</p>
        <p>{{ $client->address->street ?? null }}</p>

    </div>
</div>
