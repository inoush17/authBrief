<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Authentification</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('registration.process') }}" method="POST">
            @csrf
            <h1>Inscription</h1>
    
            @if ($errors->any())
                <ul class="alert alert-danger signal">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div>{{ $message }}</div><br>
            @endif
    
            <label for="name">Nom d'utilisateur</label><br>
            <input type="text" name="name" id="name"  placeholder="Saisir le nom ici ..."><br><br>
    
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email"  placeholder="Saisir l'e-mail ici ..."><br><br>
    
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password"  placeholder="Saisir le mot de passe ici ..."><br><br>
    
            <label for="passwordConfirm">Confirmer mot de passe</label><br>
            <input type="password" name="passwordConfirm" id="passwordConfirm"  placeholder="Confirmer le mot de passe ici ..."><br><br>
    
            <a href="{{ route('login') }}">Se connecter</a><br><br>
    
            <button class="button" type="submit">Soumettre</button>
        </form>
    </div>
</body>
</html>
