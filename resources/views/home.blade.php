
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="menu">
        <h1>Home</h1>
    </div>

    <div class="tabela">
        <table style="border:1px solid black;">
            <thead>
                <tr>ID</tr>
                <tr>NOME</tr>
                <tr>EMAIL</tr>
                <tr>DATA DE CRIAÇÃO</tr>
                <tr>DATA DE MODIFICAÇÃO</tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->update_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
