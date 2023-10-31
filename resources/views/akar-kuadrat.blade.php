<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akar Kuadrat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="row" style="display:flex; flex-direction:row; justify-content:center; align-items: center;">
            <h3 class="mb-3 mt-3" style="text-align: center; font-weight: bold;">Kalkulator Akar Kuadrat</h3>
            <div class="col-md-6 mt-3">
                <form method="POST" action="{{ route('hitung-akar-kuadratAPI') }}" class="form form-control">
                    @csrf
                    <label for="billangan">Masukan Bilangan Dengan Metode API:</label><br>
                    <input type="text" placeholder="masukan angka" id="billangan" class="form form-control @error('billangan') is invalid @enderror"
                        name="billangan" value="{{ old('billangan') }}"><br>
                    @error('billangan')
                    <div class="invalid-feedback" style="display:block">
                        {{ $message  }}
                    </div>
                    @enderror
                    <button type="submit" class="btn button">Submit API</button>
                </form>
            </div>
            <div class="col-md-6 mt-3">
                <form method="POST" action="{{ route('hitung-akar-kuadratPLSQL') }}" class="form form-control">
                    @csrf
                    <label for="bilangan">Masukan Bilangan Dengan Metode PL-SQL:</label><br>
                    <input type="text" id="bilangan" placeholder="masukan angka"
                        class="form form-control @error('bilangan') is invalid @enderror" name="bilangan" value="{{ old('bilangan') }}"><br>
                    @error('bilangan')
                    <div class="invalid-feedback" style="display:block">
                        {{ $message  }}
                    </div>
                    @enderror

                    <button type="submit" class="btn button">Submit PL-SQL</button>
                </form>
            </div>
        </div>
        
        <div class="container">
            <div class="row mt-5">
                @if (Auth::check())
                <table class="table" border="1" style="width: 20%; margin: 0 auto; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="background-color: #000; color: white; text-align: center; font-size: 1.1rem; padding: 20px;">
                                {{ Auth::user()->nim }}
                            </th>
                        </tr>
                    </thead>
                </table>
                @endif
            </div>
        </div>
        
        <div class="container ">
            <div class="row">
                @if (Auth::check())    
                @foreach ($hasil_akar as $item)
                    @php
                        $totalAngka = ($item->angka);
                    @endphp
                @endforeach
                <table class="table" border="1" style="width: 20%; margin: auto; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="background-color: #000; color: white; text-align: center; font-size: 1.1rem; padding: 15px;">
                                ({{ $totalAngka }})
                            </th>
                        </tr>
                    </thead>
                </table>
                @endif
            </div>
        </div>
        
              
        <div class="table-container">
        <table class="table table-bordered mt-3">
            <h3 class="mt-5" style="text-align:center; font-weight: bold;">Tabel Hasil Perhitungan</h3>
            <thead class="table">
                <tr>
                    <!-- <th scope="col">Num</th> -->
                    <th>Input</th>
                    <th>Angka</th>
                    <th >Jenis</th>
                    <th >Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil_akar as $item)
            <tr>
                <td>{{ $item->input }}</td>
                <td>{{ $item->angka }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->waktu }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> 
            {{ $hasil_akar->links() }} 
         </div>
         <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
         <a class="btn btn-primary" href="{{ route('bandingkan-waktu') }}">Bandingkan Waktu</a>
        </div>  
        
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>
</html>