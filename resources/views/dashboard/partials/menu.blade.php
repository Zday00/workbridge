<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <!-- Linking Google Fonts for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <!-- Mobile Sidebar Menu Button  -->
    <button class="sidebar-menu-button">
        <span class="material-symbols-rounded">menu</span>
    </button>

    @auth
        @if (auth()->user()->role === 'recruteur')
            <!-- Sidebar pour RECRUTEUR -->
            <aside class="sidebar">
                <!-- Sidebar Header -->
                <header class="sidebar-header">
                    <a href="#" class="header-logo">
                        <img src="logo.png" alt="CodingNepal" />
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

                        <!-- Gestion des offres -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">work</span>
                                <span class="nav-label">Gestion des offres</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Gestion des offres</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Mes offres</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Créer une offre</a>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Offres archivées</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Candidatures reçues -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">group</span>
                                <span class="nav-label">Candidatures reçues</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Candidatures reçues</a></li>
                            </ul>
                        </li>

                        <!-- Profil entreprise -->
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
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Description</a></li>
                            </ul>
                        </li>

                        <!-- Statistiques -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">analytics</span>
                                <span class="nav-label">Statistiques</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Statistiques</a></li>
                            </ul>
                        </li>

                        <!-- Notifications -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">notifications</span>
                                <span class="nav-label">Notifications</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Notifications</a></li>
                            </ul>
                        </li>

                        <!-- Paramètres -->
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
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">logout</span>
                                <span class="nav-label">Déconnexion</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>
        @elseif (auth()->user()->role === 'candidat')
            <!-- Sidebar pour CANDIDAT -->
            <aside class="sidebar">
                <!-- Sidebar Header -->
                <header class="sidebar-header">
                    <a href="#" class="header-logo">
                        <img src="logo.png" alt="CodingNepal" />
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

                        <!-- Recherche d'emploi -->
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link dropdown-toggle">
                                <span class="material-symbols-rounded">search</span>
                                <span class="nav-label">Recherche d'emploi</span>
                                <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Recherche d'emploi</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Toutes les
                                        offres</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Recherche
                                        avancée</a></li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Alertes emploi</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Mes candidatures -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">assignment</span>
                                <span class="nav-label">Mes candidatures</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Mes candidatures</a></li>
                            </ul>
                        </li>

                        <!-- Mon profil -->
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

                        <!-- Favoris -->
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

                        <!-- Notifications -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">notifications</span>
                                <span class="nav-label">Notifications</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Notifications</a></li>
                            </ul>
                        </li>

                        <!-- Paramètres -->
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
                            <a href="#" class="nav-link">
                                <span class="material-symbols-rounded">logout</span>
                                <span class="nav-label">Déconnexion</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-title">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>
        @else
            <!-- Rôle non reconnu -->
            <div>Rôle utilisateur non reconnu: {{ auth()->user()->role }}</div>
        @endif
    @else
        <!-- Utilisateur non connecté -->
        <div>Vous devez être connecté pour voir le menu</div>
    @endauth

    <!-- Script -->
    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>
