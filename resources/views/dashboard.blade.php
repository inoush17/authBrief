<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
    <title>Authentification</title>
</head>

    <body class="app-bar">
        <table width="100%">
            <tbody>
                <tr>
                    <td>
                        <h1>Tableau de bord</h1>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('logout') }}">
                            Se déconnecter
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h3>Bienvenue sur notre page web {{ Auth::user()->name }}</h3>
    </body>
</html>