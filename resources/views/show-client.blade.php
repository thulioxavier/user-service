<div class="client-details">
    <h1 class="client-name">{{ $client->name }}</h1>

    <div class="client-actions">
        <a href="{{ route('client.edit', $client->id) }}" class="edit-link">Editar</a>
        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="delete-form">
            @method('delete')
            @csrf
            <button type="submit" class="delete-button">Apagar</button>
        </form>
    </div>

    <div class="client-info">
        <h4>Informações do Cliente</h4>
        <p><strong>Nome:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>CPF:</strong> {{ $client->cpf }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $client->birthdate }}</p>
    </div>

    <div class="address-info">
        <h4>Endereço</h4>
        @if ($client->address)
            <p><strong>Rua:</strong> {{ $client->address->street }}</p>
            <p><strong>Cidade:</strong> {{ $client->address->city }}</p>
            <p><strong>Estado:</strong> {{ $client->address->state }}</p>
            <p><strong>CEP:</strong> {{ $client->address->zipcode }}</p>
        @else
            <p>O cliente não possui endereço cadastrado.</p>
        @endif
    </div>
</div>
