<div>
    <h1 class="text__h1">Editar {{ $client->name }}</h1>

    <form action="{{ route('client.update', $client->id) }}" method="POST">

        @method('put')
        @csrf()
        <h2>Dados Pessoais</h2>
        <input type="text" placeholder="Nome Completo" name="name" value="{{ $client->name }}" required>
        <input type="email" placeholder="E-mail" name="email" value="{{ $client->email }}" required>
        <input type="text" placeholder="CPF" name="cpf" value="{{ $client->cpf }}" required>
        <input type="date" placeholder="Data de Nascimento" name="birthdate" value="{{ $client->birthdate }}"
            required>
        <label>
            Ativo
            <input type="checkbox" name="active" checked="{{ $client->active }}">
        </label>

        <hr>
        <h2>Endereço</h2>

        <input type="number" placeholder="CEP" name="zipcode" value="{{ $client->address->zipcode }}" required>
        <input type="text" placeholder="Estado" name="state" value="{{ $client->address->state }}" required>
        <input type="text" placeholder="Cidade" name="city" value="{{ $client->address->city }}" required>
        <input type="text" placeholder="Rua" name="street" value="{{ $client->address->street }}" required>
        <input type="text" placeholder="Número" name="street_number" value="{{ $client->address->street_number }}"
            required>

        <br>

        <button type="submit"> Salvar </button>
    </form>
</div>
