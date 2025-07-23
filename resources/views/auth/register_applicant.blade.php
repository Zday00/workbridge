<h2>Inscription Postulant</h2>

<style>
    ul {
        list-style-type: none;
    }
</style>
<form method="POST" action="{{ route('register.applicant') }}" enctype="multipart/form-data">
    @csrf
    <ul>
        <li> <label>Prénom :</label>
            <input type="text" name="first_name" required>
        </li>

        <li><label>Nom :</label>
            <input type="text" name="last_name" required>
        </li>

        <li> <label>Email :</label>
            <input type="email" name="email" required>
        </li>

        <li> <label for="cv">Télécharger votre CV :</label>
            <input type="file" id="cv" name="cv" required>
        </li>

        <li><label>Biographie :</label>
            <input type="text" name="biographie" required>
        </li>

        <li> <label for="skills">Compétences</label>
            <input type="text" name="skills[]" placeholder="Compétence 1" />
            <input type="text" name="skills[]" placeholder="Compétence 2" />
            <input type="text" name="skills[]" placeholder="Compétence 3" />
        </li>

        <li><label>Mot de passe :</label>
            <input type="password" name="password" required>
        </li>
        <li><label>Confirmez le mot de passe :</label>
            <input type="password" name="password_confirmation" required>
        </li>

        <li> <button type="submit">S'inscrire</button></li>
    </ul>
</form>
