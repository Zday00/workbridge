<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
            background-color: #fff;
        }

        /* Header */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            width: 100%;
            background-color: #ffffff;
            gap: 20px;
        }

        .logo-container {
            display: flex;
        }

        .logo-workbridge {
            width: 70px;
            height: auto;
            max-width: 100%;
            border-radius: 8px;
        }

        .search-bar-container {
            flex-grow: 1;
            max-width: 500px;
            min-width: 150px;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-input:focus {
            border-color: #4169E1;
            box-shadow: 0 0 0 3px rgba(65, 105, 225, 0.2);
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-inscription {
            padding: 10px 20px;
            background-color: transparent;
            color: #4169E1;
            border: 2px solid #4169E1;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-inscription:hover {
            background-color: rgba(65, 105, 225, 0.1);
            border-color: #4169E1;
        }

        .btn-connexion {
            padding: 10px 20px;
            background-color: #4169E1;
            color: white;
            border: 2px solid #4169E1;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-connexion:hover {
            background-color: #365bb8;
            border-color: #365bb8;
        }

        /* Main Content */
        .main-content {
            display: flex;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding: 20px;
            background-color: white;
            max-width: 100vw;
            overflow: hidden;
        }

        .content-left {
            flex: 1;
            padding-right: 20px;
            min-width: 0;
            padding-left: 40px;
        }

        .image-right {
            flex: 1.5;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-width: 0;
        }

        .flat-icon {
            width: 100%;
            max-width: 550px;
            height: auto;
            object-fit: contain;
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            justify-content: space-between;
            padding: 60px 100px;
            background-color: #f8f9fa;
        }

        .stat-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px 20px;
            flex: 1;
            margin: 0 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .icon-container {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 100px;
        }

        .icon-container img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .stat-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-text h2 {
            font-size: 2.5rem;
            color: #4169E1;
            margin-bottom: 8px;
            font-weight: 700;
            line-height: 1;
        }

        .stat-text p {
            font-size: 1.1rem;
            color: #333;
            margin: 0;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-wrap: wrap;
                justify-content: center;
                padding: 15px;
                gap: 15px;
            }

            .logo-container {
                flex-basis: 100%;
                text-align: center;
                margin-bottom: 10px;
            }

            .logo-workbridge {
                width: 60px;
            }

            .search-bar-container {
                order: 3;
                flex-basis: 90%;
                margin-top: 10px;
            }

            .auth-buttons {
                order: 2;
                flex-basis: auto;
                width: 100%;
                justify-content: center;
                gap: 10px;
            }

            .btn-inscription,
            .btn-connexion {
                padding: 8px 15px;
                font-size: 0.9rem;
            }

            .main-content {
                flex-direction: column;
                padding: 30px 20px;
                text-align: center;
            }

            .content-left {
                padding-right: 0;
                margin-bottom: 30px;
            }

            .content-left h1 {
                font-size: 2rem !important;
                margin-bottom: 15px !important;
            }

            .content-left p {
                font-size: 1rem !important;
                text-align: justify;

            }

            .flat-icon {
                max-width: 400px;
                margin-top: 20px;
            }

            .stats-section {
                flex-direction: column;
                padding: 40px 20px;
            }

            .stat-card {
                margin: 15px 0;
                width: 80%;
            }
        }

        @media (max-width: 480px) {
            .logo-workbridge {
                width: 50px;
            }

            .auth-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .btn-inscription,
            .btn-connexion {
                width: 100%;
                text-align: center;
            }

            .main-content {
                padding: 20px 15px;
            }

            .flat-icon {
                max-width: 300px;
            }
        }

        .categories {
            padding: 60px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .categories .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .categories .title {
            font-size: 2rem;
            margin-bottom: 40px;
            color: #333;
        }

        .categories .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .category {
            background-color: white;
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .category-left img {
            width: 40px;
            /* image plus petite */
            height: auto;
            margin-right: 20px;
        }

        .category-right {
            flex: 1;
            text-align: right;
        }


        .category-right h3 {
            font-size: 1.2rem;
            color: #333;
            margin: 0;
            text-align: right;
        }

        /* Section Testimonials */
        .testimonials {
            padding: 80px 20px;
            background-color: #ffffff;
            text-align: center;
        }

        .testimonials .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonials .title {
            font-size: 2.5rem;
            margin-bottom: 50px;
            color: #333;
            font-weight: 700;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .testimonial-card {
            background-color: #f8f9fa;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .stars {
            margin-bottom: 20px;
            text-align: center;
        }

        .star {
            color: #FFD700;
            font-size: 1.5rem;
            margin: 0 2px;
        }

        .testimonial-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 25px;
            font-style: italic;
            text-align: left;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background-color: #4169E1;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .author-info h4 {
            margin: 0;
            font-size: 1.1rem;
            color: #333;
            font-weight: 600;
            line-height: 1.2;
        }

        .author-info span {
            font-size: 0.9rem;
            color: #666;
            margin-top: 2px;
        }

        /* Responsive pour testimonials */
        @media (max-width: 768px) {
            .testimonials {
                padding: 60px 20px;
            }

            .testimonials .title {
                font-size: 2rem;
                margin-bottom: 40px;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .testimonial-card {
                padding: 25px;
            }

            .testimonial-text {
                font-size: 1rem;
                text-align: left;
            }
        }

        /*Footer */
        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 60px 0 0;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h4 {
            color: #4169E1;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-column h5 {
            color: #4169E1;
            font-size: 1rem;
            margin-bottom: 15px;
            margin-top: 25px;
            font-weight: 600;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .footer-logo-img {
            width: 40px;
            height: auto;
            border-radius: 6px;
        }

        .footer-logo h3 {
            color: #4169E1;
            font-size: 1.5rem;
            margin: 0;
            font-weight: 700;
        }

        .footer-description {
            line-height: 1.6;
            margin-bottom: 25px;
            color: #bdc3c7;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background-color: #34495e;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: #4169E1;
            transform: translateY(-3px);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: #4169E1;
        }

        .contact-info p {
            margin-bottom: 10px;
            color: #bdc3c7;
            font-size: 0.95rem;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .newsletter-input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #34495e;
            border-radius: 6px;
            background-color: #34495e;
            color: #ecf0f1;
            font-size: 0.9rem;
            outline: none;
        }

        .newsletter-input::placeholder {
            color: #95a5a6;
        }

        .newsletter-input:focus {
            border-color: #4169E1;
        }

        .newsletter-btn {
            padding: 10px 15px;
            background-color: #4169E1;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .newsletter-btn:hover {
            background-color: #365bb8;
        }

        .footer-divider {
            height: 1px;
            background-color: #34495e;
            margin: 40px 0 30px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom-left p {
            margin: 0;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .footer-bottom-right {
            display: flex;
            gap: 25px;
        }

        .footer-bottom-right a {
            color: #95a5a6;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-right a:hover {
            color: #4169E1;
        }

        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer {
                padding: 40px 0 0;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .footer-bottom-right {
                flex-direction: column;
                gap: 10px;
            }

            .newsletter-form {
                flex-direction: column;
                gap: 10px;
            }

            .newsletter-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="header-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo-workbridge.png') }}" alt="Logo Workbridge" class="logo-workbridge" />
        </div>

        <div class="search-bar-container">
            <input type="search" placeholder="Rechercher un poste, un profil ou une entreprise…"
                class="search-input" />
        </div>

        <div class="auth-buttons">
            <a href="{{ route('show.register.choice') }}" class="btn-inscription">S'inscrire</a>
            <a href="{{ route('login') }}" class="btn-connexion">Se connecter</a>
        </div>
    </header>

    <main class="main-content">
        <div class="content-left">
            <h1 style="color: #333; font-size: 3rem; margin-bottom: 20px;">
                Trouvez l’emploi qui vous révèle.
            </h1>
            <p style="color: #666; font-size: 1.2rem; line-height: 1.6;">
                Découvrez des offres qui correspondent à vos compétences et vos aspirations.
                Trouvez le poste qui vous permettra de grandir et de vous épanouir.
            </p>
        </div>

        <div class="image-right">
            <img src="{{ asset('images/flat_work_1.svg') }}" alt="Flat Icon" class="flat-icon" />
        </div>
    </main>

    <section class="stats-section">
        <div class="stat-card">
            <div class="icon-container">
                <img src="{{ asset('images/icon-user.png') }}" alt="Icône utilisateur" />
            </div>
            <div class="stat-text">
                <h2>+12 500</h2>
                <p>Candidats</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-container">
                <img src="{{ asset('images/icon-company.png') }}" alt="Icône entreprise" />
            </div>
            <div class="stat-text">
                <h2>+850</h2>
                <p>Entreprises</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-container">
                <img src="{{ asset('images/icon-job.png') }}" alt="Icône offres d'emploi" />
            </div>
            <div class="stat-text">
                <h2>+2 300</h2>
                <p>Offres d'emploi</p>
            </div>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <h2 class="title">Catégories populaires</h2>

            <div class="grid">
                <!-- Bloc 1 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/tech.png') }}" alt="Informatique">
                    </div>
                    <div class="category-right">
                        <h3>Informatique</h3>
                    </div>
                </div>

                <!-- Bloc 2 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/sante.png') }}" alt="Santé">
                    </div>
                    <div class="category-right">
                        <h3>Santé</h3>
                    </div>
                </div>

                <!-- Bloc 3 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/education.png') }}" alt="Éducation">
                    </div>
                    <div class="category-right">
                        <h3>Éducation</h3>
                    </div>
                </div>

                <!-- Bloc 4 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/tourisme.png') }}" alt="Tourisme">
                    </div>
                    <div class="category-right">
                        <h3>Tourisme</h3>
                    </div>
                </div>

                <!-- Bloc 5 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/commerce.png') }}" alt="Commerce">
                    </div>
                    <div class="category-right">
                        <h3>Commerce</h3>
                    </div>
                </div>

                <!-- Bloc 6 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/finance.png') }}" alt="Finance">
                    </div>
                    <div class="category-right">
                        <h3>Finance</h3>
                    </div>
                </div>

                <!-- Bloc 7 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/communication.png') }}" alt="Communication">
                    </div>
                    <div class="category-right">
                        <h3>Communication</h3>
                    </div>
                </div>

                <!-- Bloc 8 -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/transport.png') }}" alt="Transport">
                    </div>
                    <div class="category-right">
                        <h3>Transport</h3>
                    </div>
                </div>

                <!-- Bloc  -->
                <div class="category">
                    <div class="category-left">
                        <img src="{{ asset('images/juridique.png') }}" alt="Juridique">
                    </div>
                    <div class="category-right">
                        <h3>Juridique</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->

    <section class="testimonials">
        <div class="container">
            <h2 class="title">Ce que disent nos utilisateurs</h2>

            <div class="testimonials-grid">
                <!-- Témoignage 1 -->
                <div class="testimonial-card">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">
                        "Grâce à Workbridge, j'ai trouvé mon job idéal en moins de 2 semaines. L'interface est
                        intuitive, les offres sont de qualité et le suivi m’a aidé à réussir. Je recommande vivement !"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">A</div>
                        <div class="author-info">
                            <h4>Nana.Z Abdouraouf </h4>
                            <span>Développeuse Web</span>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="testimonial-card">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">
                        "En tant que recruteur, Workbridge m'a permis de trouver des candidats exceptionnels. La
                        plateforme facilite vraiment les rencontres entre talents et entreprises."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">M</div>
                        <div class="author-info">
                            <h4>Moussa Traoré</h4>
                            <span>RH Manager</span>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="testimonial-card">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">
                        "Une plateforme moderne et efficace. J'ai pu postuler facilement à plusieurs offres et décrocher
                        un entretien rapidement. L'expérience utilisateur est au top !"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">F</div>
                        <div class="author-info">
                            <h4>Nabilatou Ado</h4>
                            <span>Marketing Specialist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <!-- Section principale du footer -->
            <div class="footer-content">
                <!-- Colonne 1 - Logo et description -->
                <div class="footer-column">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo-workbridge.png') }}" alt="Logo Workbridge"
                            class="footer-logo-img" />
                        <h3>Workbridge</h3>
                    </div>
                    <p class="footer-description">
                        La plateforme qui connecte les talents aux opportunités. Trouvez l'emploi qui vous révèle.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">📘</a>
                        <a href="#" class="social-link">🐦</a>
                        <a href="#" class="social-link">💼</a>
                        <a href="#" class="social-link">📷</a>
                    </div>
                </div>

                <!-- Colonne 2 - Liens rapides -->
                <div class="footer-column">
                    <h4>Liens rapides</h4>
                    <ul class="footer-links">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Offres d'emploi</a></li>
                        <li><a href="#">Entreprises</a></li>
                        <li><a href="#">Candidats</a></li>
                        <li><a href="#">À propos</a></li>
                    </ul>
                </div>

                <!-- Colonne 3 - Catégories -->
                <div class="footer-column">
                    <h4>Catégories</h4>
                    <ul class="footer-links">
                        <li><a href="#">Informatique</a></li>
                        <li><a href="#">Santé</a></li>
                        <li><a href="#">Éducation</a></li>
                        <li><a href="#">Finance</a></li>
                        <li><a href="#">Commerce</a></li>
                    </ul>
                </div>

                <!-- Colonne 4 - Contact -->
                <div class="footer-column">
                    <h4>Contact</h4>
                    <div class="contact-info">
                        <p>📧 contact@workbridge.ne</p>
                        <p>📞 +227 20 XX XX XX</p>
                        <p>📍 Niamey, Niger</p>
                    </div>
                    <div class="newsletter">
                        <h5>Newsletter</h5>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Votre email" class="newsletter-input">
                            <button class="newsletter-btn">S'abonner</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ligne de séparation -->
            <div class="footer-divider"></div>

            <!-- Section copyright -->
            <div class="footer-bottom">
                <div class="footer-bottom-left">
                    <p>&copy; 2025 Workbridge. Tous droits réservés.</p>
                </div>
                <div class="footer-bottom-right">
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Conditions d'utilisation</a>
                    <a href="#">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>
