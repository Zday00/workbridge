<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <style>
        /* Solution Flexbox pour le footer collé */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding: 20px;
            /* Espacement optionnel */
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <main> <!-- Ajout crucial de cette balise -->
        <p>Bienvenue sur job board</p>
        <!-- Tout votre contenu ici -->
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga unde ratione...</p>
        <!-- ... -->
    </main>

    @include('layouts.footer')

</body>

</html>
