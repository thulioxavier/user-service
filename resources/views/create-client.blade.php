
<div>
<h1 class="text__h1">Criar Novo Cliente</h1>

<form action="{{route('client.store')}}" method="POST">
    @csrf()
    <input type="text" placeholder="Nome Completo" name="name" required>
    <input type="email" placeholder="E-mail" name="email" required>
    <input type="text" placeholder="CPF" name="cpf" required>
    <input type="date" placeholder="Data de Nascimento" name="birthdate" required>
    <label>
        Ativo
        <input type="checkbox" name="active">
    </label>

    <button type="submit"> Salvar </button>
</form>
</div>

