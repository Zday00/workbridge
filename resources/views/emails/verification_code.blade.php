<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code de vérification - Workbridge</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #fafbfc;
            color: #333;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4169E1;
            padding: 30px 40px;
            text-align: center;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .content {
            padding: 40px;
            text-align: center;
        }

        .content h2 {
            color: #333;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .otp-code {
            display: inline-block;
            background-color: #f8f9fa;
            border: 2px solid #4169E1;
            border-radius: 12px;
            padding: 20px 30px;
            font-size: 32px;
            font-weight: 700;
            color: #4169E1;
            letter-spacing: 4px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
        }

        .validity-info {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
            color: #856404;
        }

        .footer {
            background-color: #fafbfc;
            padding: 20px 40px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
        }

        .logo {
            width: 60px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ asset('images/logo-workbridge.png') }}" alt="Workbridge Logo" class="logo">
            <h1>Workbridge</h1>
        </div>

        <div class="content">
            <h2>Code de vérification</h2>
            <p>Nous avons reçu une demande de connexion à votre compte. Utilisez le code ci-dessous pour continuer :</p>

            <div class="otp-code">{{ $otpCode }}</div>

            <div class="validity-info">
                ⏰ Ce code est valide pendant <strong>10 minutes</strong> seulement.
            </div>

            <p style="margin-top: 30px; font-size: 14px;">
                Si vous n'avez pas demandé ce code, vous pouvez ignorer cet email en toute sécurité.
            </p>
        </div>

        <div class="footer">
            © 2024 Workbridge. Tous droits réservés.<br>
            Cet email a été envoyé automatiquement, merci de ne pas y répondre.
        </div>
    </div>
</body>

</html>
