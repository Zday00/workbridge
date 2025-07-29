<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vérification Email - Workbridge</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fafbfc;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4169E1;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #4169E1;
        }

        input[readonly] {
            background-color: #f8f9fa;
            color: #666;
        }

        #otp_code {
            text-align: center;
            font-size: 24px;
            letter-spacing: 8px;
            font-family: 'Courier New', monospace;
        }

        button {
            width: 100%;
            background-color: #4169E1;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3651d1;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            color: #28a745;
            font-size: 14px;
            margin-top: 5px;
        }

        .resend-link {
            text-align: center;
            margin-top: 20px;
        }

        .resend-link a {
            color: #4169E1;
            text-decoration: none;
            font-size: 14px;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }

        .info-box {
            background-color: #e7f3ff;
            border: 1px solid #b3d9ff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #0066cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Vérification de votre email</h1>

        <div class="info-box">
            📧 Nous avons envoyé un code de vérification à votre adresse email.
            Veuillez vérifier votre boîte de réception (et vos spams).
        </div>

        <!-- Messages d'erreur globaux -->
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Messages de succès -->
        @if (session('success'))
            <div class="success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('verification.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" value="{{ $user->email ?? old('email') }}" readonly
                    required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="otp_code">Code de vérification (6 chiffres)</label>
                <input type="text" name="otp_code" id="otp_code" placeholder="000000" maxlength="6"
                    pattern="[0-9]{6}" required>
                @error('otp_code')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Vérifier mon compte</button>
        </form>

        <div class="resend-link">
            <p>Vous n'avez pas reçu le code ?</p>
            <a href="{{ route('verification.resend') }}?email={{ $user->email ?? '' }}">
                Renvoyer le code
            </a>
        </div>
    </div>

    <script>
        // Auto-focus sur le champ OTP
        document.getElementById('otp_code').focus();

        // Validation en temps réel - seulement des chiffres
        document.getElementById('otp_code').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>
