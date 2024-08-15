<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('otpCode.process') }}" method="POST">
            @csrf
            <h1>Code de confirmation</h1>
    
            @if ($errors->any())
                <ul class="alert alert-danger signal">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div>{{ $message }}</div><br>
            @endif
    
            <p class="paragraphe">
                Un code de confirmation à été envoyé <br> à votre adresse e-mail. <br> Saississez-le dans le champs pour continuer.
            </p>
    
            <label for="code">Code de confirmation</label><br>
            <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}">
            <input type="text" name="code" id="code" autocomplete="off" placehorder="Saisir le code ici ..."><br><br>
    
            <button class="button" type="submit">Soumettre</button>
        </form>
    </div>
</body>
</html>