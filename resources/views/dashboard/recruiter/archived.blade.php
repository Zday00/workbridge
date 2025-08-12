@extends('dashboard.layouts.app')

@section('content')
    <style>
        .missions-container {
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

        .missions-count {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
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

        .missions-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        }

        .mission-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .mission-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .mission-title {
            font-size: 1.375rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .mission-description {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .mission-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
        }

        .meta-icon {
            font-size: 1.125rem;
            color: #667eea;
        }

        .meta-value {
            color: #4a5568;
        }

        .mission-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-filled {
            background-color: #e0f2fe;
            /* bleu clair */
            color: #0284c7;
            /* bleu foncé */
        }

        .status-expired {
            background-color: #fee2e2;
            /* rouge clair */
            color: #dc2626;
            /* rouge foncé */
        }

        .mission-footer {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 12px;
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
            color: #4a5568;
            background: #f7fafc;
        }

        .action-btn:hover {
            background: #edf2f7;
            color: #1a202c;
        }

        @media (max-width: 768px) {
            .missions-container {
                padding: 16px;
            }

            .missions-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>

    <div class="missions-container">
        <div class="page-header">
            <h1 class="page-title">Offres Archivées</h1>
            @if (!$missions->isEmpty())
                <div class="missions-count">
                    {{ $missions->count() }} offre{{ $missions->count() > 1 ? 's' : '' }}
                </div>
            @endif
        </div>

        @if ($missions->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-rounded">archive</span>
                </div>
                <h2 class="empty-message">Aucune offre archivée trouvée</h2>
                <p class="empty-description">
                    Vous n'avez aucune mission avec le statut "pourvue" ou "expirée".
                </p>
            </div>
        @else
            <div class="missions-grid">
                @foreach ($missions as $mission)
                    <div class="mission-card">
                        <h3 class="mission-title">{{ $mission->title }}</h3>
                        <p class="mission-description">{{ $mission->description }}</p>

                        <div class="mission-meta">
                            <div class="meta-item">
                                <span class="material-symbols-rounded meta-icon">location_on</span>
                                <span class="meta-value">{{ $mission->location ?: 'Non spécifié' }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="material-symbols-rounded meta-icon">schedule</span>
                                <span class="meta-value">
                                    {{ $mission->deadline ? \Carbon\Carbon::parse($mission->deadline)->format('d/m/Y') : 'Non définie' }}
                                </span>
                            </div>
                        </div>

                        <div
                            class="mission-status
                            @if ($mission->status === 'filled') status-filled
                            @elseif($mission->status === 'expired') status-expired @endif">
                            {{ ucfirst($mission->status) }}
                        </div>

                        <div class="mission-footer">
                            <a href="{{ route('recruiter.show', $mission) }}" class="action-btn">
                                <span class="material-symbols-rounded" style="font-size: 1rem;">visibility</span>
                                Voir
                            </a>
                            <a href="{{ route('recruiter.edit', $mission) }}" class="action-btn">
                                <span class="material-symbols-rounded" style="font-size: 1rem;">edit</span>
                                Modifier
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
