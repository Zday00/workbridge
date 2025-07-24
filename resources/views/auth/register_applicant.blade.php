<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-weight: 500;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e1e5e9;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.8);
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    input[type="file"] {
        padding: 10px;
        cursor: pointer;
        border-style: dashed;
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    input[type="file"]:hover {
        background: rgba(102, 126, 234, 0.1);
    }

    .skills-container input {
        margin-bottom: 10px;
    }

    .skills-container input:last-child {
        margin-bottom: 0;
    }

    button {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 10px;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(102, 126, 234, 0.3);
    }

    button:active {
        transform: translateY(0);
    }

    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-row li {
        flex: 1;
        margin-bottom: 0;
    }

    .form-container {
        animation: slideIn 0.6s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 25px;
            margin: 10px;
        }

        h2 {
            font-size: 24px;
        }

        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .form-row li {
            margin-bottom: 20px;
        }
    }
</style>

<div class="form-container">
    <h2>Inscription Postulant</h2>

    <form method="POST" action="{{ route('register.applicant') }}" enctype="multipart/form-data">
        @csrf
        <ul>
            <div class="form-row">
                <li>
                    <label>Prénom :</label>
                    <input type="text" name="first_name" required>
                </li>
                <li>
                    <label>Nom :</label>
                    <input type="text" name="last_name" required>
                </li>
            </div>

            <li>
                <label>Email :</label>
                <input type="email" name="email" required>
            </li>

            <li>
                <label for="cv">Télécharger votre CV :</label>
                <input type="file" id="cv" name="cv" required>
            </li>

            <li>
                <label for="biography">Biographie :</label>
                <input type="text" name="biography" required>
            </li>

            <li>
                <label for="skills">Compétences</label>
                <div class="skills-container">
                    <input type="text" name="skills[]" placeholder="Compétence 1" required />
                    <input type="text" name="skills[]" placeholder="Compétence 2" required />
                    <input type="text" name="skills[]" placeholder="Compétence 3" />
                </div>
            </li>

            <div class="form-row">
                <li>
                    <label>Mot de passe :</label>
                    <input type="password" name="password" required>
                </li>
                <li>
                    <label>Confirmez le mot de passe :</label>
                    <input type="password" name="password_confirmation" required>
                </li>
            </div>

            <li>
                <button type="submit">S'inscrire</button>
            </li>
        </ul>
    </form>
</div>
