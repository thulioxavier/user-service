<div>
    <h1 class="text__h1">Editar {{ $client->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('client.update', $client->id) }}" method="POST">
        @method('put')
        @csrf
        <h2>Dados Pessoais</h2>
        <input type="text" placeholder="Nome Completo" name="name" value="{{ old('name', $client->name) }}" required>
        <input type="email" placeholder="E-mail" name="email" value="{{ old('email', $client->email) }}" required>
        <input type="text" placeholder="CPF" name="cpf" value="{{ old('cpf', $client->cpf) }}" required>
        <input type="date" placeholder="Data de Nascimento" name="birthdate"
            value="{{ old('birthdate', $client->birthdate ? $client->birthdate : '') }}" required>
        <label>
            Ativo
            <input type="checkbox" name="active" {{ old('active', $client->active) ? 'checked' : '' }}>
        </label>

        <hr>
        <h2>Endereço</h2>

        <input type="number" placeholder="CEP" name="zipcode"
            value="{{ old('zipcode', optional($client->address)->zipcode) }}" required>
        <input type="text" placeholder="Estado" name="state"
            value="{{ old('state', optional($client->address)->state) }}" required>
        <input type="text" placeholder="Cidade" name="city"
            value="{{ old('city', optional($client->address)->city) }}" required>
        <input type="text" placeholder="Rua" name="street"
            value="{{ old('street', optional($client->address)->street) }}" required>
        <input type="text" placeholder="Número" name="street_number"
            value="{{ old('street_number', optional($client->address)->street_number) }}" required>

        <br>

        <button type="submit"> Salvar </button>
    </form>
</div>
