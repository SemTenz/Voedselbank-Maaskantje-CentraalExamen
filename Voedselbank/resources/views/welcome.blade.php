<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom bij Voedselbank Maaskaantje</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-image: url("{{ asset('img/maaskantje.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50; /* Donkergrijze kleur voor tekst */
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Iets minder transparant voor betere leesbaarheid */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Iets donkerdere schaduw */
            max-width: 600px;
        }
        .card {
            border: none;
        }
        .card-header {
            background-color: #27ae60; /* Groene kleur passend bij voedselbank thema */
            color: white;
            font-size: 28px;
            text-align: center;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            font-weight: bold;
        }
        .card-body {
            padding: 30px;
            text-align: center;
        }
        .btn {
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
            border: none;
        }
        .btn-primary {
            background-color: #2980b9; /* Blauw voor inlogknop */
            color: white;
        }
        .btn-primary:hover {
            background-color: #1f618d; /* Donkerder blauw bij hover */
            transform: scale(1.05);
        }
        p {
            font-size: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Welkom bij Voedselbank Maaskantje</div>
                    <div class="card-body">
                        <p>Welkom! Log in om verder te gaan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Inloggen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
