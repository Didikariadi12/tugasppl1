<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbandingan API dan PL-SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>

        body{
            background: black;
            font-family: arial;
        }
        .container {
            display: flex;
            justify-content: space-between;
        }

        .table-container {
            width: 45%; /* Atur lebar tabel */
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .table tr th {
            margin-top: 25px;
            background-color: #00cc99;
        }
        .button {
            font-family: sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: white;
            border-radius: 10px;
            padding: 8px 20px;
            margin-top: 10px;
            background-color: #00cc99;
        }

        .button:hover {
            background-color: #008060;
            color: white;
        }
        
            /* * media query */ */
        @media (max-width: 1200px){
            
        }
        /* Laptop */
        @media (max-width: 992px){
            html{
                font-size: 75%;
            }

        }
        /* Tablet */
        @media (max-width: 768px){
            html{
                font-size: 65%;
            }
            .table-container {
                width: 100%; /* Tabel akan mengambil lebar penuh saat layar kecil */
            }

            h2 {
                font-size: 24px; /* Ukuran font yang lebih kecil pada layar kecil */
            }

            th, td {
                font-size: 16px; /* Ukuran font yang lebih kecil pada layar kecil */
            }
            
        }
        /* Mobile Phone */
        @media (max-width: 576px){
            html{
                font-size: 60%;
            }
        
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="display:flex; flex-direction:row; justify-content:center; align-items: center; color:white;">
            <h2 class="mb-3 mt-3" style="text-align: center; font-weight: bold;">Tabel Hasil Perbandingan API dan PL-SQL</h3>

        <div class="table-container">
            <h3 style="text-align: center; margin-top: 40px; color: white;" >Tabel Hasil API</h2>
            <table class="table table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th>Input Angka</th>
                        <th>Hasil API</th>
                        <th>Waktu Eksekusi API (ms)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $inputAPI }}</td> <!-- Menampilkan angka inputan API -->
                        <td>{{ $angkaAPI }}</td>
                        <td>{{ $waktuEksekusiAPI }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-container">
            <h3 style="text-align: center; margin-top: 40px; color: white;">Tabel Hasil PLSQL</h2>
            <table class="table table-bordered" style="text-align: center" >
                <thead>
                    <tr>
                        <th>Input Angka</th>
                        <th>Hasil PL-SQL</th>
                        <th>Waktu Eksekusi PL-SQL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $inputPLSQL }}</td> <!-- Menampilkan angka inputan PLSQL -->
                        <td>{{ $angkaPLSQL }}</td>
                        <td>{{ $waktuEksekusiPLSQL }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            <a class="btn button" href="{{ route('akar-kuadrat-index') }}">Back</a>
        </div>        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
