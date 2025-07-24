<style>
    .alert {
        color: red;
        background: #ffe6e6;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
</style>

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.recruiter') }}">
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

            <label>Nom de l'entreprise :</label>
            <input type="text" name="company_name" required>
        </li>
        <li>
            <label>Industrie :</label>
            <input type="text" name="industry" required>
        </li>

        <li>
            <label>Site web :</label>
            <input type="text" name="website">
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
