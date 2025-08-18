@extends('dashboard.layouts.app')

@section('content')
    <style>
        .offers-container {
            padding: 24px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 2px solid #e2e8f0;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .offers-count {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .filters-section {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .filters-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .filter-select {
            padding: 10px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.875rem;
            background-color: white;
            cursor: pointer;
            transition: border-color 0.2s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #667eea;
        }

        .filter-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .filter-btn:hover {
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .empty-icon {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 16px;
        }

        .empty-message {
            font-size: 1.25rem;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .empty-description {
            color: #718096;
            font-size: 1rem;
        }

        .offers-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .offer-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: fit-content;
        }

        .offer-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .offer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .company-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .company-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .company-details h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin: 0 0 4px 0;
        }

        .company-details p {
            font-size: 0.75rem;
            color: #6b7280;
            margin: 0;
        }

        .offer-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .offer-description {
            color: #4a5568;
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .offer-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 16px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
        }

        .meta-icon {
            font-size: 1rem;
            color: #667eea;
        }

        .meta-value {
            color: #4a5568;
            font-weight: 500;
        }

        .offer-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }

        .tag {
            padding: 4px 8px;
            background-color: #f3f4f6;
            color: #374151;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .tag.salary {
            background-color: #fef3c7;
            color: #d97706;
        }

        .tag.category {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .offer-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .deadline-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
        }

        .deadline-urgent {
            color: #dc2626;
            font-weight: 600;
        }

        .deadline-normal {
            color: #6b7280;
        }

        .offer-actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        .posted-date {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(255, 255, 255, 0.9);
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            color: #6b7280;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .offers-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .offers-container {
                padding: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .filters-row {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .offer-meta {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .offer-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>

    <div class="offers-container">
        <div class="page-header">
            <h1 class="page-title">Offres d'emploi</h1>
            @if (!$missions->isEmpty())
                <div class="offers-count">
                    {{ $missions->count() }} offre{{ $missions->count() > 1 ? 's' : '' }}
                    disponible{{ $missions->count() > 1 ? 's' : '' }}
                </div>
            @endif
        </div>

        <!-- Filtres -->
        <div class="filters-section">
            <div class="filters-row">
                <div class="filter-group">
                    <label class="filter-label">Catégorie</label>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">Toutes les catégories</option>
                        <option value="informatique">Informatique</option>
                        <option value="marketing">Marketing</option>
                        <option value="education">Éducation</option>
                        <option value="sante">Santé</option>
                        <option value="ingenierie">Ingénierie</option>
                        <option value="finance">Finance</option>
                        <option value="art_design">Art et Design</option>
                        <option value="droit">Droit</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Lieu</label>
                    <select class="filter-select" id="locationFilter">
                        <option value="">Tous les lieux</option>
                        <option value="remote">Télétravail</option>
                        <option value="paris">Paris</option>
                        <option value="lyon">Lyon</option>
                        <option value="marseille">Marseille</option>
                        <option value="toulouse">Toulouse</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Recherche</label>
                    <input type="text" class="filter-select" placeholder="Rechercher une offre..." id="searchInput">
                </div>
                <div class="filter-group">
                    <button type="button" class="filter-btn">
                        <span class="material-symbols-rounded" style="font-size: 1rem;">search</span>
                        Filtrer
                    </button>
                </div>
            </div>
        </div>

        @if ($missions->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-rounded">work_off</span>
                </div>
                <h2 class="empty-message">Aucune offre disponible</h2>
                <p class="empty-description">
                    Il n'y a actuellement aucune offre d'emploi disponible. Revenez bientôt pour découvrir de nouvelles
                    opportunités !
                </p>
            </div>
        @else
            <div class="offers-grid">
                @foreach ($missions as $mission)
                    <div class="offer-card">
                        <div class="posted-date">
                            {{ \Carbon\Carbon::parse($mission->created_at)->locale('fr')->diffForHumans() }}
                        </div>

                        <div class="company-info">
                            <div class="company-avatar">
                                {{ strtoupper(substr($mission->recruiter->company_name, 0, 2)) }}
                            </div>
                            <div class="company-details">
                                <h4>{{ $mission->recruiter->company_name }}</h4>
                                <p>{{ ucfirst($mission->recruiter->industry) }}</p>
                            </div>
                        </div>

                        <h3 class="offer-title">{{ $mission->title }}</h3>

                        <p class="offer-description">
                            {{ $mission->description }}
                        </p>

                        <div class="offer-meta">
                            <div class="meta-item">
                                <span class="material-symbols-rounded meta-icon">location_on</span>
                                <span class="meta-value">{{ $mission->location ?: 'Non spécifié' }}</span>
                            </div>

                            <div class="meta-item">
                                <span class="material-symbols-rounded meta-icon">schedule</span>
                                <span class="meta-value">
                                    {{ $mission->deadline ? \Carbon\Carbon::parse($mission->deadline)->locale('fr')->format('d/m/Y') : 'Non définie' }}
                                </span>
                            </div>
                        </div>

                        <div class="offer-tags">
                            @if ($mission->salary_range)
                                <span class="tag salary">{{ $mission->salary_range }}</span>
                            @endif
                            @if ($mission->category)
                                <span class="tag category">{{ ucfirst($mission->category->name) }}</span>
                            @endif
                        </div>

                        <div class="offer-footer">
                            <div class="deadline-info">
                                @if ($mission->deadline)
                                    @php
                                        $deadline = \Carbon\Carbon::parse($mission->deadline);
                                        $isUrgent = $deadline->diffInDays(now()) <= 7;
                                    @endphp
                                    <span
                                        class="material-symbols-rounded {{ $isUrgent ? 'deadline-urgent' : 'deadline-normal' }}">
                                        {{ $isUrgent ? 'warning' : 'schedule' }}
                                    </span>
                                    <span class="{{ $isUrgent ? 'deadline-urgent' : 'deadline-normal' }}">
                                        @if ($deadline->isPast())
                                            Date limite dépassée
                                        @else
                                            {{ $deadline->locale('fr')->diffForHumans() }}
                                        @endif
                                    </span>
                                @endif
                            </div>

                            <div class="offer-actions">
                                <a href="{{ route('candidate.show', $mission) }}" class="action-btn btn-outline">
                                    <span class="material-symbols-rounded" style="font-size: 1rem;">visibility</span>
                                    Voir détails
                                </a>
                                <a href="{{ route('candidate.apply', $mission) }}" class="action-btn btn-primary">
                                    <span class="material-symbols-rounded" style="font-size: 1rem;">send</span>
                                    Postuler
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        // Script simple pour les filtres (optionnel)
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtn = document.querySelector('.filter-btn');
            const categoryFilter = document.getElementById('categoryFilter');
            const locationFilter = document.getElementById('locationFilter');
            const searchInput = document.getElementById('searchInput');

            if (filterBtn) {
                filterBtn.addEventListener('click', function() {
                    // Ici vous pouvez ajouter la logique de filtrage
                    console.log('Filtres appliqués:', {
                        category: categoryFilter.value,
                        location: locationFilter.value,
                        search: searchInput.value
                    });
                });
            }
        });
    </script>
@endsection
