@extends('dashboard.layouts.app')

@section('content')
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --dark: #1f2937;
            --light: #f9fafb;
            --gray: #6b7280;
            --gray-light: #f3f4f6;
        }

        /* Conteneur principal */
        .mission-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 30px;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* En-tête de page */
        .mission-header {
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 20px;
        }

        .mission-header::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 2px;
        }

        .mission-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .mission-status {
            display: inline-block;
            background-color: var(--gray-light);
            color: var(--dark);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        /* Grille d'informations */
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .mission-section {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .mission-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title svg {
            width: 20px;
            height: 20px;
        }

        .section-content {
            color: var(--dark);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        /* Description pleine largeur */
        .mission-description {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            margin-bottom: 40px;
        }

        /* Actions */
        .mission-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            padding-top: 30px;
            border-top: 1px solid var(--gray-light);
        }

        .mission-btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back {
            background-color: var(--gray-light);
            color: var(--dark);
        }

        .btn-back:hover {
            background-color: #e5e7eb;
        }

        .btn-edit {
            background-color: var(--primary);
            color: white;
        }

        .btn-edit:hover {
            background-color: var(--primary-light);
        }

        /* Message flash */
        .alert-success {
            background: linear-gradient(90deg, #ecfdf5, #d1fae5);
            border-left: 4px solid #10b981;
            color: #065f46;
            padding: 16px 25px;
            border-radius: 8px;
            margin-bottom: 40px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.5s ease-out;
        }

        .alert-success::before {
            content: "✓";
            font-weight: bold;
            font-size: 1.2rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mission-container {
                padding: 0 20px;
            }

            .mission-grid {
                grid-template-columns: 1fr;
            }

            .mission-title {
                font-size: 1.8rem;
            }

            .mission-actions {
                flex-direction: column;
            }

            .mission-btn {
                justify-content: center;
            }
        }
    </style>

    <div class="mission-container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mission-header">
            <h1 class="mission-title">{{ $mission->title }}</h1>
            <span class="mission-status">{{ ucfirst($mission->status) }}</span>
        </div>

        <div class="mission-description">
            <h2 class="section-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Description de la mission
            </h2>
            <div class="section-content">
                {{ $mission->description }}
            </div>
        </div>

        <div class="mission-grid">
            <div class="mission-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Lieu
                </h2>
                <div class="section-content">
                    {{ $mission->location }}
                </div>
            </div>

            <div class="mission-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Salaire
                </h2>
                <div class="section-content">
                    {{ $mission->salary_range }}
                </div>
            </div>

            <div class="mission-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Date limite
                </h2>
                <div class="section-content">
                    {{ ucfirst(\Carbon\Carbon::parse($mission->deadline)->locale('fr')->isoFormat('dddd D MMMM YYYY')) }}
                </div>
            </div>
        </div>

        <div class="mission-actions">
            <a href="{{ route('recruiter.index') }}" class="mission-btn btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Retour à la liste
            </a>
            <a href="{{ route('recruiter.edit', $mission->id) }}" class="mission-btn btn-edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Modifier la mission
            </a>
        </div>
    </div>

    <script>
        // Disparition du message flash après 5 secondes
        setTimeout(() => {
            const alert = document.querySelector('.alert-success');
            if (alert) {
                alert.style.transition = 'all 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endsection
