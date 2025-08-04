<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Formulaire de connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8ff;
        }

        .page-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            width: 1100px;
            height: 600px;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .left {
            flex: 0.35;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            background-color: white;
        }

        .right {
            flex: 0.65;
            background-image: url('{{ asset('images/login_pic.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .header>h2 {
            color: #4169E1;
        }

        .header>h4 {
            font-weight: normal;
            font-size: 15px;
            color: rgba(0, 0, 0, .4);
            margin-top: 10px;
        }

        .form {
            max-width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .form-field {
            height: 46px;
            padding: 0 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            margin-top: 20px;
            transition: .2s;
        }

        .form-field:focus {
            border-color: #0f7ef1;
        }

        .form>p {
            text-align: right;
            margin-top: 10px;
        }

        .form>p>a {
            color: #000;
            font-size: 14px;
        }

        .form>button {
            padding: 12px 10px;
            border: 0;
            background: #4169E1;
            border-radius: 8px;
            margin-top: 8px;
            color: #fff;
            letter-spacing: 1px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form>button:hover {
            background-color: #274aa3;
            transform: translateY(-2px);
        }

        .forgot-password {
            text-align: right;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .forgot-password a {
            font-size: 0.9rem;
            color: #4169E1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #274aa3;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="container">
            <div class="left">
                <div class="header">
                    <h2>Bon retour parmi nous !</h2>
                    <h4>Veuillez vous connecter en utilisant votre e-mail et votre mot de passe.</h4>
                </div>
                <form action="{{ route('verify.login') }}" method="POST" class="form">
                    @csrf
                    {{-- Email --}}
                    <input type="email" class="form-field" placeholder="Email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    {{-- Mot de passe --}}
                    <input type="password" class="form-field" name="password" placeholder="Mot de passe" required>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <div class="forgot-password">
                        <p><a href="#">Mot de passe oublié ?</a></p>
                    </div>

                    <button type="submit">Se connecter</button>
                </form>
            </div>
            <div class="right"></div>
        </div>
    </div>
</body>

</html>
