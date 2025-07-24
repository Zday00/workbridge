<header class="header">
    <div class="header-container">
        <div class="logo">
            <a href="/home">Ma Société</a>
        </div>
        <nav class="nav-links">
            <a href="/home">Accueil</a>
            <a href="{{ route('show.register.choice') }}">Inscription</a>

            <a href="/Connexion">Connexion</a>

        </nav>
    </div>
</header>

<style>
    .header {
        background-color: #333;
        color: white;
        padding: 15px 20px;
        font-family: Arial, sans-serif;
        width: 100%;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* Conteneur principal */
    .header-container {
        display: flex;
        justify-content: space-between;
        /* Sépare logo (gauche) et nav (droite) */
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Logo forcé à gauche */
    .logo {
        margin-right: auto;
        /* Pousse tout le reste à droite */
        padding: 0;
    }

    .logo a {
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        /* Évite les décalages */
    }

    /* Navigation à droite */
    .nav-links {
        margin-left: auto;
        /* Force à droite */
    }

    .nav-links a {
        color: #ddd;
        text-decoration: none;
        margin: 0 15px;
    }

    @media (max-width: 600px) {
        .header-container {
            flex-direction: column;
            gap: 10px;
        }

        .logo,
        .nav-links {
            margin: 0;
            /* Réinitialise les marges en mobile */
            width: 100%;
            text-align: center;
        }
    }
</style>
