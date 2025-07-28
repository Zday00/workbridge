<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Essai</title>
</head>

<body>
    <main>

        <h2>Choisissez votre rôle</h2>

        <a href="{{ route('show.register.applicant') }}">
            <button>Je suis un postulant</button>
        </a>

        <a href="{{ route('show.register.recruiter') }}">
            <button>Je suis un recruteur</button>
        </a>

    </main>
</body>

</html>
