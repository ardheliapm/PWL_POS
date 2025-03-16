<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <style>
        .container {
            border: 2px solid blue;
            padding: 20px;
            width: fit-content;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data User</h1>

        <!-- Tabel daftar pengguna -->
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr>
            
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->level_id }}</td>
            </tr>
            @endforeach
        </table>

        <br>

        <!-- Tabel jumlah pengguna -->
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
            </tr>
            <tr>
                <td>{{ $jumlahPengguna }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
