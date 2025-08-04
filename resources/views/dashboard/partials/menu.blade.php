<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Conditionnelle</title>
    <!-- Linking Google Fonts for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(#F1F3FF, #ffffff);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            width: 270px;
            height: 100vh;
            background: #151A2D;
            transition: all 0.4s ease;
        }

        .sidebar.collapsed {
            width: 85px;
        }

        .sidebar .sidebar-header {
            display: flex;
            position: relative;
            padding: 25px 20px;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-header .header-logo img {
            width: 46px;
            height: 46px;
            display: block;
            object-fit: contain;
            border-radius: 50%;
        }

        .sidebar-header .sidebar-toggler,
        .sidebar-menu-button {
            position: absolute;
            right: 20px;
            height: 35px;
            width: 35px;
            color: #151A2D;
            border: none;
            cursor: pointer;
            display: flex;
            background: #EEF2FF;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.4s ease;
        }

        .sidebar.collapsed .sidebar-header .sidebar-toggler {
            transform: translate(-4px, 65px);
        }

        .sidebar-header .sidebar-toggler span,
        .sidebar-menu-button span {
            font-size: 1.75rem;
            transition: 0.4s ease;
        }

        .sidebar.collapsed .sidebar-header .sidebar-toggler span {
            transform: rotate(180deg);
        }

        .sidebar-header .sidebar-toggler:hover {
            background: #d9e1fd;
        }

        .sidebar-nav .nav-list {
            list-style: none;
            display: flex;
            gap: 4px;
            padding: 0 15px;
            flex-direction: column;
            transform: translateY(15px);
            transition: 0.4s ease;
        }

        .sidebar .sidebar-nav .primary-nav {
            overflow-y: auto;
            scrollbar-width: thin;
            padding-bottom: 20px;
            height: calc(100vh - 227px);
            scrollbar-color: transparent transparent;
        }

        .sidebar .sidebar-nav .primary-nav:hover {
            scrollbar-color: #EEF2FF transparent;
        }

        .sidebar.collapsed .sidebar-nav .primary-nav {
            overflow: unset;
            transform: translateY(65px);
        }

        .sidebar-nav .nav-item .nav-link {
            color: #fff;
            display: flex;
            gap: 12px;
            white-space: nowrap;
            border-radius: 8px;
            padding: 11px 15px;
            align-items: center;
            text-decoration: none;
            border: 1px solid #151A2D;
            transition: 0.4s ease;
        }

        .sidebar-nav .nav-item:is(:hover, .open)>.nav-link:not(.dropdown-title) {
            color: #151A2D;
            background: #EEF2FF;
        }

        .sidebar .nav-link .nav-label {
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .nav-link :where(.nav-label, .dropdown-icon) {
            opacity: 0;
            pointer-events: none;
        }

        .sidebar.collapsed .nav-link .dropdown-icon {
            transition: opacity 0.3s 0s ease;
        }

        .sidebar-nav .secondary-nav {
            position: absolute;
            bottom: 35px;
            width: 100%;
            background: #151A2D;
        }

        .sidebar-nav .nav-item {
            position: relative;
        }

        /* Dropdown Stylings */
        .sidebar-nav .dropdown-container .dropdown-icon {
            margin: 0 -4px 0 auto;
            transition: transform 0.4s ease, opacity 0.3s 0.2s ease;
        }

        .sidebar-nav .dropdown-container.open .dropdown-icon {
            transform: rotate(180deg);
        }

        .sidebar-nav .dropdown-menu {
            height: 0;
            overflow-y: hidden;
            list-style: none;
            padding-left: 15px;
            transition: height 0.4s ease;
        }

        .sidebar.collapsed .dropdown-menu {
            position: absolute;
            top: -10px;
            left: 100%;
            opacity: 0;
            height: auto !important;
            padding-right: 10px;
            overflow-y: unset;
            pointer-events: none;
            border-radius: 0 10px 10px 0;
            background: #151A2D;
            transition: 0s;
        }

        .sidebar.collapsed .dropdown-menu:has(.dropdown-link) {
            padding: 7px 10px 7px 24px;
        }

        .sidebar.sidebar.collapsed .nav-item:hover>.dropdown-menu {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(12px);
            transition: all 0.4s ease;
        }

        .sidebar.sidebar.collapsed .nav-item:hover>.dropdown-menu:has(.dropdown-link) {
            transform: translateY(10px);
        }

        .dropdown-menu .nav-item .nav-link {
            color: #F1F4FF;
            padding: 9px 15px;
        }

        .sidebar.collapsed .dropdown-menu .nav-link {
            padding: 7px 15px;
        }

        .dropdown-menu .nav-item .nav-link.dropdown-title {
            display: none;
            color: #fff;
            padding: 9px 15px;
        }

        .dropdown-menu:has(.dropdown-link) .nav-item .dropdown-title {
            font-weight: 500;
            padding: 7px 15px;
        }

        .sidebar.collapsed .dropdown-menu .nav-item .dropdown-title {
            display: block;
        }

        .sidebar-menu-button {
            display: none;
        }

        /* Responsive media query code for small screens */
        @media (max-width: 768px) {
            .sidebar-menu-button {
                position: fixed;
                left: 20px;
                top: 20px;
                height: 40px;
                width: 42px;
                display: flex;
                color: #F1F4FF;
                background: #151A2D;
            }

            .sidebar.collapsed {
                width: 270px;
                left: -270px;
            }

            .sidebar.collapsed .sidebar-header .sidebar-toggler {
                transform: none;
            }

            .sidebar.collapsed .sidebar-nav .primary-nav {
                transform: translateY(15px);
            }
        }
    </style>
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
                                <li class="nav-item"><a href="#" class="nav-link dropdown-link">Créer une offre</a>
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

    <!-- Script -->
    <script>
        // Toggle the visibility of a dropdown menu
        const toggleDropdown = (dropdown, menu, isOpen) => {
            dropdown.classList.toggle("open", isOpen);
            menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
        };
        // Close all open dropdowns
        const closeAllDropdowns = () => {
            document.querySelectorAll(".dropdown-container.open").forEach((openDropdown) => {
                toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
            });
        };
        // Attach click event to all dropdown toggles
        document.querySelectorAll(".dropdown-toggle").forEach((dropdownToggle) => {
            dropdownToggle.addEventListener("click", (e) => {
                e.preventDefault();
                const dropdown = dropdownToggle.closest(".dropdown-container");
                const menu = dropdown.querySelector(".dropdown-menu");
                const isOpen = dropdown.classList.contains("open");
                closeAllDropdowns(); // Close all open dropdowns
                toggleDropdown(dropdown, menu, !isOpen); // Toggle current dropdown visibility
            });
        });
        // Attach click event to sidebar toggle buttons
        document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach((button) => {
            button.addEventListener("click", () => {
                closeAllDropdowns(); // Close all open dropdowns
                document.querySelector(".sidebar").classList.toggle(
                    "collapsed"); // Toggle collapsed class on sidebar
            });
        });
        // Collapse sidebar by default on small screens
        if (window.innerWidth <= 1024) document.querySelector(".sidebar").classList.add("collapsed");
    </script>
</body>

</html>
