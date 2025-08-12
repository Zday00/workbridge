@extends('dashboard.layouts.app')

@section('content')
    <div class="page-container">
        <div class="page-wrapper">
            <!-- Header avec animation -->
            <div class="header text-center">
                <div class="header-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <h1 class="title">Informations de l'entreprise</h1>
                <p class="subtitle">Gérez et modifiez les détails de votre entreprise</p>
            </div>

            @if (session('success'))
                <div class="success-message">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>{{ $recruiter->company_name }}</h2>
                        <p>Profil de l'entreprise</p>
                    </div>
                    <div class="card-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="card-content">
                    <div class="item">
                        <div class="icon company-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div class="item-content">
                            <h3>Nom de l'entreprise</h3>
                            <p>{{ $recruiter->company_name }}</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon industry-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <div class="item-content">
                            <h3>Secteur d'activité</h3>
                            <p>{{ $recruiter->industry }}</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon website-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9m0 9c-5 0-9-4-9-9s4-9 9-9">
                                </path>
                            </svg>
                        </div>
                        <div class="item-content">
                            <h3>Site web</h3>
                            @if ($recruiter->website)
                                <a href="{{ $recruiter->website }}" target="_blank"
                                    rel="noopener noreferrer">{{ $recruiter->website }}</a>
                            @else
                                <p class="no-website">Non renseigné</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="updated-at">Dernière mise à jour: {{ now()->format('d/m/Y') }}</div>
                    <a href="{{ route('recruiter.company.edit') }}" class="btn-edit">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Modifier les informations
                    </a>
                </div>
            </div>

            <div class="stats">
                <div class="stat-item">
                    <div>
                        <p>Profil</p>
                        <p class="stat-value">Complet</p>
                    </div>
                    <div class="stat-icon green">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="stat-item">
                    <div>
                        <p>Visibilité</p>
                        <p class="stat-value">Active</p>
                    </div>
                    <div class="stat-icon blue">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="stat-item">
                    <div>
                        <p>Performance</p>
                        <p class="stat-value">Excellente</p>
                    </div>
                    <div class="stat-icon purple">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Container */
        .page-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc, #dbeafe, #c7d2fe);
            padding: 3rem 1rem;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .page-wrapper {
            max-width: 900px;
            width: 100%;
        }

        /* Header */
        .header {
            margin-bottom: 3rem;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 15px rgba(99, 102, 241, 0.5);
        }

        .header-icon svg {
            width: 40px;
            height: 40px;
            stroke: white;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #111827, #6b7280);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1.125rem;
            color: #6b7280;
        }

        /* Success message */
        .success-message {
            background: linear-gradient(90deg, #d1fae5, #14b8a6);
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            color: #065f46;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            animation: fade-in 0.6s ease-out forwards;
        }

        .success-message svg {
            width: 20px;
            height: 20px;
            margin-right: 1rem;
        }

        /* Card */
        .card {
            background: rgba(255 255 255 / 0.7);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255 255 255 / 0.2);
            overflow: hidden;
            margin-bottom: 3rem;
        }

        /* Card header */
        .card-header {
            background: linear-gradient(90deg, #4f46e5, #a855f7, #4f46e5);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .card-header p {
            opacity: 0.85;
        }

        .card-icon {
            width: 64px;
            height: 64px;
            background: rgba(255 255 255 / 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-icon svg {
            width: 32px;
            height: 32px;
            stroke: white;
        }

        /* Card content */
        .card-content {
            padding: 2rem;
        }

        .item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        /* Icon backgrounds & colors */
        .company-icon {
            background: linear-gradient(135deg, #bfdbfe, #c7d2fe);
            color: #4338ca;
        }

        .industry-icon {
            background: linear-gradient(135deg, #d1fae5, #99f6e4);
            color: #059669;
        }

        .website-icon {
            background: linear-gradient(135deg, #e0e7ff, #fbcfe8);
            color: #8b5cf6;
        }

        .icon svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        .item-content h3 {
            margin: 0 0 0.5rem 0;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #6b7280;
            letter-spacing: 0.05em;
        }

        .item-content p,
        .item-content a {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            text-decoration: none;
            word-break: break-word;
        }

        .item-content a:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        .no-website {
            font-style: italic;
            color: #9ca3af;
        }

        /* Card footer */
        .card-footer {
            background: rgba(243 244 246 / 0.5);
            padding: 1.5rem 2rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .updated-at {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .btn-edit {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(90deg, #4f46e5, #a855f7);
            color: white;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 0 10px 15px rgba(79, 70, 229, 0.4);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .btn-edit:hover {
            box-shadow: 0 15px 25px rgba(79, 70, 229, 0.6);
            transform: translateY(-3px);
        }

        .btn-edit svg {
            width: 20px;
            height: 20px;
            stroke: white;
            transition: transform 0.3s ease;
        }

        .btn-edit:hover svg {
            transform: rotate(15deg);
        }

        /* Statistiques */
        .stats {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .stat-item {
            flex: 1 1 280px;
            background: rgba(255 255 255 / 0.6);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255 255 255 / 0.3);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
        }

        .stat-item p:first-child {
            margin: 0;
            color: #6b7280;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .stat-value {
            margin: 0;
            font-weight: 700;
            font-size: 1.75rem;
            color: #111827;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        .stat-icon.green {
            background: #dcfce7;
            color: #22c55e;
        }

        .stat-icon.blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .stat-icon.purple {
            background: #ede9fe;
            color: #7c3aed;
        }

        /* Animation fade-in */
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
