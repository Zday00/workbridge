<body>
    @include('layouts.header')



    <main>

        <h2>Choisissez votre rôle</h2>

        <a href="{{ route('show.register.applicant') }}">
            <button>Je suis un postulant</button>
        </a>

        <a href="{{ route('show.register.recruiter') }}">
            <button>Je suis un recruteur</button>
        </a>

    </main>




    @include('layouts.footer')
</body>
