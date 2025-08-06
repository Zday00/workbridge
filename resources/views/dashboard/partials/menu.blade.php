<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Conditionnelle</title>
    <!-- Linking Google Fonts for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

</head>

<body>
    <!-- Mobile Sidebar Menu Button -->
    <button class="sidebar-menu-button">
        <span class="material-symbols-rounded">menu</span>
    </button>

    @auth
        @if (auth()->user()->role === 'candidat')
            <aside class="sidebar">
                <!-- Sidebar Header -->
                <header class="sidebar-header">
                    <a href="#" class="header-logo">
                        <img src="logo.png" alt="Logo" />
                    </a>
                    <button class="sidebar-toggler">
                        <span class="material-symbols-rounded">chevron_left</span>
                    </button>
                </header>
                <nav class="sidebar-nav">
                    <!-- Primary Top Nav -->
                    <ul class="nav-list primary-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">dashboard</span>
                                <span class="nav-label">Dashboard</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Dashboard</a></li>
                            </ul>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">work</span>
                                <span class="nav-label">Recherche d'emploi</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Recherche d'emploi</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Toutes les offres</a>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Recherche avancée</a>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Alertes emploi</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">assignment</span>
                                <span class="nav-label">Mes candidatures</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Mes candidatures</a></li>
                            </ul>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">person</span>
                                <span class="nav-label">Mon profil</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Mon profil</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Informations
                                        personnelles</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Mon CV</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Mes compétences</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">favorite</span>
                                <span class="nav-label">Favoris</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Favoris</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Offres
                                        sauvegardées</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Entreprises
                                        suivies</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">notifications</span>
                                <span class="nav-label">Notifications</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Notifications</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">settings</span>
                                <span class="nav-label">Paramètres</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Paramètres</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Secondary Bottom Nav -->
                    <ul class="nav-list secondary-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">help</span>
                                <span class="nav-label">Support</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Support</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="material-symbols-rounded">logout</span>
                                <span class="nav-label">Déconnexion</span>
                            </a>
                            <form action="/logout" id="logout-form" method="POST" style="display:none;">
                                @csrf
                            </form>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>
        @elseif (auth()->user()->role === 'recruteur')
            <aside class="sidebar">
                <!-- Sidebar Header -->
                <header class="sidebar-header">
                    <a href="#" class="header-logo">
                        <img src="logo.png" alt="Logo" />
                    </a>
                    <button class="sidebar-toggler">
                        <span class="material-symbols-rounded">chevron_left</span>
                    </button>
                </header>
                <nav class="sidebar-nav">
                    <!-- Primary Top Nav -->
                    <ul class="nav-list primary-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">dashboard</span>
                                <span class="nav-label">Dashboard</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Dashboard</a></li>
                            </ul>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">work</span>
                                <span class="nav-label">Gestion des offres</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Gestion des offres</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Mes offres</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link"
                                        data-url="{{ route('recruiter.create') }}">Créer une
                                        offre</a>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Offres
                                        archivées</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">assignment</span>
                                <span class="nav-label">Candidatures reçues</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Candidatures reçues</a></li>
                            </ul>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">business</span>
                                <span class="nav-label">Profil entreprise</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Profil entreprise</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Informations
                                        générales</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Logo et images</a>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Description</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">bar_chart</span>
                                <span class="nav-label">Statistiques</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Statistiques</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">notifications</span>
                                <span class="nav-label">Notifications</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Notifications</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">settings</span>
                                <span class="nav-label">Paramètres</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Paramètres</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Secondary Bottom Nav -->
                    <ul class="nav-list secondary-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">help</span>
                                <span class="nav-label">Support</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Support</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="material-symbols-rounded">logout</span>
                                <span class="nav-label">Déconnexion</span>
                            </a>
                            <form action="/logout" id="logout-form" method="POST" style="display:none;">
                                @csrf
                            </form>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>
        @endif
    @endauth
    <div id="main-content" style="margin-left: 270px; padding: 20px;">
        <h1>Bienvenue</h1>
        <p>Voici le contenu de la page.</p>
    </div>






























    <!-- Script -->
    <script src="{{ asset('js/sidebar.js') }}" defer></script>

</body>

</html>
