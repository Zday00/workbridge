<footer class="footer">
    <div class="footer-links">
        <a href="/home">Accueil</a>
        <a href="/about">À propos</a>
        <a href="/services">Services</a>
        <a href="/contact">Contact</a>
    </div>
    <p>© {{ date('Y') }} Ma Société. Tous droits réservés.</p>
</footer>

<style>
    /* Solution pour coller le footer */
    html,
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
        /* Pousse le footer vers le bas */
    }

    /* Styles existants du footer */
    .footer {
        background-color: #333;
        color: white;
        padding: 20px;
        text-align: center;
        width: 100%;
    }

    .footer-links a {
        color: #ddd;
        text-decoration: none;
        margin: 0 15px;
    }

    .footer-links a:hover {
        color: #fff;
        text-decoration: underline;
    }

    .footer p {
        margin-top: 10px;
        font-size: 14px;
    }

    @media (max-width: 600px) {
        .footer {
            padding: 15px;
        }

        .footer-links a {
            display: block;
            margin: 5px 0;
        }
    }
</style>
