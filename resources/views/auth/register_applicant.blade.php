<style>
    .form-container {
        max-width: 500px;
        margin: 30px auto;
        background-color: #fefefe;
        padding: 20px 25px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 1.5rem;
        color: #4169E1;
        font-weight: 700;
    }

    .form-container form ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .form-container li {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
    }

    .form-container label {
        font-weight: 500;
        margin-bottom: 5px;
        color: #333;
        font-size: 0.9rem;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container input[type="file"],
    .form-container select {
        width: 100%;
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 0.9rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-container input:focus,
    .form-container select:focus {
        border-color: #4169E1;
        box-shadow: 0 0 0 2px rgba(65, 105, 225, 0.15);
        outline: none;
    }

    .skills-container {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .skills-container input {
        width: 100%;
    }

    .form-container button[type="submit"] {
        background-color: #4169E1;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .form-container button:hover {
        background-color: #365bb8;
    }
</style>

<div class="form-container">
    <h2>Inscription Postulant</h2>

    @if ($errors->any())
        <div
            style="background-color: #ffe5e5; border-left: 3px solid #ff4d4d; padding: 10px; margin-bottom: 15px; border-radius: 8px;">
            <ul style="list-style-type: disc; padding-left: 15px; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li style="color: #cc0000; font-size: 0.85rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.applicant') }}" enctype="multipart/form-data">
        @csrf
        <ul>
            <div class="form-row">
                <li>
                    <label>Prénom :</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                </li>
                <li>
                    <label>Nom :</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required>
                </li>
            </div>

            <li>
                <label>Email :</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </li>

            <li>
                <label for="cv">Télécharger votre CV :</label>
                <input type="file" id="cv" name="cv" required>
            </li>

            <li>
                <label for="biography">Biographie :</label>
                <input type="text" name="biography" value="{{ old('biography') }}" required>
            </li>

            <li>
                <label for="skills">Compétences</label>
                <div class="skills-container">
                    <input type="text" name="skills[]" value="{{ old('skills.0') }}" placeholder="Compétence 1"
                        required />
                    <input type="text" name="skills[]" value="{{ old('skills.1') }}" placeholder="Compétence 2"
                        required />
                    <input type="text" name="skills[]" value="{{ old('skills.2') }}" placeholder="Compétence 3" />
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
