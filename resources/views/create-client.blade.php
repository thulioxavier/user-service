<div>
    <h1 class="text__h1">Criar Novo Cliente</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <form action="{{ route('client.store') }}" method="POST">
        @csrf()
        <h2>Dados Pessoais</h2>
        <input type="text" placeholder="Nome Completo" name="name" value="{{ old('name') }}" required>
        <input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
        <input type="text" placeholder="CPF" name="cpf" value="{{ old('cpf') }}" required>
        <input type="date" placeholder="Data de Nascimento" name="birthdate" value="{{ old('birthdate') }}"required>
        <label>
            Ativo
            <input type="checkbox" name="active" checked="{{ old('active') }}">
        </label>

        <hr>
        <h2>Endereço</h2>

        <input type="number" placeholder="CEP" name="zipcode" value="{{ old('zipcode') }}" required>
        <input type="text" placeholder="Estado" name="state" value="{{ old('state') }}" required>
        <input type="text" placeholder="Cidade" name="city" value="{{ old('city') }}" required>
        <input type="text" placeholder="Rua" name="street" value="{{ old('street') }}" required>
        <input type="text" placeholder="Número" name="street_number" value="{{ old('street_number') }}" required>

        <br>

        <button type="submit"> Salvar </button>
    </form>
</div>
