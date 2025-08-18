@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <!-- Header avec navigation -->
        <div class="page-header">
            <div class="header-content">
                <div class="breadcrumb">
                    {{-- <a href="{{ route('dashboard') }}">Dashboard</a> --}}
                    <span class="separator">/</span>
                    <a href="{{ route('candidate.index') }}">Missions</a>
                    <span class="separator">/</span>
                    <span class="current">{{ $mission->title }}</span>
                </div>
                <h1 class="page-title">{{ $mission->title }}</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('candidate.index') }}" class="btn btn-secondary">
                    <span class="material-symbols-rounded">arrow_back</span>
                    Retour
                </a>
            </div>
        </div>

        <div class="mission-layout">
            <!-- Informations principales -->
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <div class="mission-header">
                            <div class="mission-info">
                                <h2 class="mission-title">{{ $mission->title }}</h2>
                                <p class="company-name">
                                    <span class="material-symbols-rounded">business</span>
                                    {{ $mission->company->name ?? 'Entreprise non spécifiée' }}
                                </p>
                            </div>
                            @if ($mission->status)
                                <div class="status-badge status-{{ $mission->status }}">
                                    {{ ucfirst($mission->status) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mission-details-grid">
                            <div class="details-section">
                                <h3 class="section-title">Détails de la mission</h3>
                                <div class="details-list">
                                    @if ($mission->location)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">location_on</span>
                                            <span class="label">Lieu :</span>
                                            <span class="value">{{ $mission->location }}</span>
                                        </div>
                                    @endif
                                    @if ($mission->contract_type)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">work</span>
                                            <span class="label">Type de contrat :</span>
                                            <span class="value">{{ $mission->contract_type }}</span>
                                        </div>
                                    @endif
                                    @if ($mission->salary)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">payments</span>
                                            <span class="label">Salaire :</span>
                                            <span class="value">{{ $mission->salary }}</span>
                                        </div>
                                    @endif
                                    @if ($mission->duration)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">schedule</span>
                                            <span class="label">Durée :</span>
                                            <span class="value">{{ $mission->duration }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="details-section">
                                <h3 class="section-title">Dates importantes</h3>
                                <div class="details-list">
                                    @if ($mission->start_date)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">event</span>
                                            <span class="label">Date de début :</span>
                                            <span class="value">{{ $mission->start_date->format('d/m/Y') }}</span>
                                        </div>
                                    @endif
                                    @if ($mission->end_date)
                                        <div class="detail-item">
                                            <span class="material-symbols-rounded">event_available</span>
                                            <span class="label">Date de fin :</span>
                                            <span class="value">{{ $mission->end_date->format('d/m/Y') }}</span>
                                        </div>
                                    @endif
                                    <div class="detail-item">
                                        <span class="material-symbols-rounded">today</span>
                                        <span class="label">Publié le :</span>
                                        <span class="value">{{ $mission->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                @if ($mission->description)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Description de la mission</h3>
                        </div>
                        <div class="card-body">
                            <div class="mission-description">
                                {!! nl2br(e($mission->description)) !!}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Compétences requises -->
                @if ($mission->skills && $mission->skills->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Compétences requises</h3>
                        </div>
                        <div class="card-body">
                            <div class="skills-list">
                                @foreach ($mission->skills as $skill)
                                    <span class="skill-tag">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Exigences -->
                @if ($mission->requirements)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exigences</h3>
                        </div>
                        <div class="card-body">
                            <div class="requirements-content">
                                {!! nl2br(e($mission->requirements)) !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="action-sidebar">
                <!-- Actions rapides -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="action-buttons">
                            <button class="btn btn-primary btn-full">
                                <span class="material-symbols-rounded">send</span>
                                Postuler
                            </button>
                            <button class="btn btn-secondary btn-full">
                                <span class="material-symbols-rounded">bookmark</span>
                                Sauvegarder
                            </button>
                            <button class="btn btn-outline btn-full">
                                <span class="material-symbols-rounded">share</span>
                                Partager
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistiques</h3>
                    </div>
                    <div class="card-body">
                        <div class="stats-list">
                            <div class="stat-item">
                                <span class="stat-label">Vues</span>
                                <span class="stat-value">{{ $mission->views_count ?? 0 }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Candidatures</span>
                                <span class="stat-value">{{ $mission->applications_count ?? 0 }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Temps restant</span>
                                <span class="stat-value">
                                    @if ($mission->end_date)
                                        {{ $mission->end_date->diffForHumans() }}
                                    @else
                                        Non spécifié
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations entreprise -->
        @if ($mission->company)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">À propos de l'entreprise</h3>
                </div>
                <div class="card-body">
                    <div class="company-info">
                        <h4 class="company-name">{{ $mission->company->name }}</h4>
                        @if ($mission->company->description)
                            <p class="company-description">{{ $mission->company->description }}</p>
                        @endif
                        @if ($mission->company->website)
                            <a href="{{ $mission->company->website }}" target="_blank" class="company-link">
                                <span class="material-symbols-rounded">link</span>
                                Site web
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e5e9;
        }

        .breadcrumb {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .separator {
            margin: 0 8px;
        }

        .current {
            color: #495057;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: #212529;
            margin: 0;
        }

        .mission-layout {
            display: block;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 20px 24px 16px;
            border-bottom: 1px solid #e1e5e9;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #212529;
            margin: 0;
        }

        .card-body {
            padding: 24px;
        }

        .mission-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .mission-title {
            font-size: 24px;
            font-weight: 600;
            color: #212529;
            margin: 0 0 8px 0;
        }

        .company-name {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6c757d;
            margin: 0;
            font-size: 16px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-closed {
            background: #f8d7da;
            color: #721c24;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .mission-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #495057;
            margin: 0 0 16px 0;
        }

        .details-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-item .material-symbols-rounded {
            font-size: 18px;
            color: #6c757d;
        }

        .label {
            font-weight: 500;
            color: #495057;
            min-width: 120px;
        }

        .value {
            color: #212529;
        }

        .mission-description {
            line-height: 1.6;
            color: #495057;
            font-size: 16px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-tag {
            background: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .requirements-content {
            line-height: 1.6;
            color: #495057;
            font-size: 16px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            border: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .btn-outline {
            background: transparent;
            color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-outline:hover {
            background: #007bff;
            color: white;
        }

        .btn-full {
            width: 100%;
            justify-content: center;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .company-info .company-name {
            font-size: 18px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 12px;
        }

        .company-description {
            color: #6c757d;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .company-link {
            color: #007bff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .company-link:hover {
            text-decoration: underline;
        }

        .stats-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-label {
            color: #6c757d;
            font-weight: 500;
        }

        .stat-value {
            color: #212529;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .mission-layout {
                flex-direction: column;
                gap: 20px;
            }

            .action-sidebar {
                width: 100%;
            }

            .mission-details-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
@endsection
