<body>
    @include('layouts.header')



    <main>

        <h2>Choisissez votre rôle</h2>

        <a href="{{ route('show.applicant.register') }}">
            <button>Je suis un postulant</button>
        </a>

        <a href="{{ route('show.recruiter.register') }}">
            <button>Je suis un recruteur</button>
        </a>

    </main>




    @include('layouts.footer')
</body>
