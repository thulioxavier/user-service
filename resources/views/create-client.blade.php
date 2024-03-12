<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/app.css" rel="stylesheet">
    <title>Novo Cliente</title>
</head>

<body>
    <div>
        <h1 class="text__h1">Criar Novo Cliente</h1>

        <form action="{{ route('client.store') }}" method="POST">
            @csrf()
            <h2>Dados Pessoais</h2>
            <input type="text" placeholder="Nome Completo" name="name" required class="input">
            <input type="email" placeholder="E-mail" name="email" required class="input">
            <input type="text" placeholder="CPF" name="cpf" required class="input">
            <input type="date" placeholder="Data de Nascimento" name="birthdate" required class="input">
            <label>
                Ativo
                <input type="checkbox" name="active">
            </label>

            <hr>
            <h2>Endereço</h2>

            <input type="number" placeholder="CEP" name="zipcode" required class="input">
            <input type="text" placeholder="Estado" name="state" required class="input">
            <input type="text" placeholder="Cidade" name="city" required class="input">
            <input type="text" placeholder="Rua" name="street" required class="input">
            <input type="text" placeholder="Número" name="street_number" required class="input">

            <br>

            <button type="submit" class="button"> Salvar </button>
        </form>
    </div>

</body>

</html>
