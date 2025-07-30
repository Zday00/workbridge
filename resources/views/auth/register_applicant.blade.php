<div class="form-container">
    <h2>Inscription Postulant</h2>

    {{-- Bloc d'affichage des erreurs --}}
    @if ($errors->any())
        <div
            style="background-color: #ffe5e5; border-left: 4px solid #ff4d4d; padding: 15px; margin-bottom: 20px; border-radius: 10px;">
            <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li style="color: #cc0000;">{{ $error }}</li>
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
