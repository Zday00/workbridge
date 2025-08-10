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

        .meta-label {
            font-weight: 600;
            color: #2d3748;
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

        .status-active {
            background-color: #def7ec;
            color: #047857;
        }

        .status-inactive {
            background-color: #fef3c7;
            color: #d97706;
        }

        .status-closed {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .status-draft {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .mission-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .deadline-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
        }

        .deadline-urgent {
            color: #dc2626;
            font-weight: 600;
        }

        .deadline-normal {
            color: #4a5568;
        }

        .mission-actions {
            display: flex;
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
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #f7fafc;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
        }

        @media (max-width: 768px) {
            .missions-container {
                padding: 16px;
            }

            .missions-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .mission-meta {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .mission-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>

    <div class="missions-container">
        <div class="page-header">
            <h1 class="page-title">Mes Missions</h1>
            @if (!$missions->isEmpty())
                <div class="missions-count">
                    {{ $missions->count() }} mission{{ $missions->count() > 1 ? 's' : '' }}
                </div>
            @endif
        </div>

        @if ($missions->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-rounded">work_off</span>
                </div>
                <h2 class="empty-message">Aucune mission trouvée</h2>
                <p class="empty-description">
                    Vous n'avez pas encore créé de missions. Commencez par créer votre première mission.
                </p>
            </div>
        @else
            @php
                $statusLabels = [
                    'open' => 'Ouverte',
                    'closed' => 'Fermée',
                    'paused' => 'En pause',
                    'filled' => 'Pourvue',
                    'expired' => 'Expirée',
                ];
            @endphp
            <div class="missions-grid">
                @foreach ($missions as $mission)
                    <div class="mission-card">
                        <h3 class="mission-title">{{ $mission->title }}</h3>

                        <p class="mission-description">
                            {{ $mission->description }}
                        </p>

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

                        <div class="mission-footer">
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
                                            Date limite dépassée il y a {{ $deadline->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ $deadline->locale('fr')->diffForHumans() }}
                                        @endif
                                    </span>
                                @endif
                            </div>

                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div
                                    class="mission-status 
                                @if ($mission->status === 'active') status-active
                                @elseif($mission->status === 'inactive') status-inactive  
                                @elseif($mission->status === 'closed') status-closed
                                @else status-draft @endif">
                                    <span class="material-symbols-rounded" style="font-size: 0.875rem;">
                                        @if ($mission->status === 'active')
                                            check_circle
                                        @elseif($mission->status === 'inactive')
                                            pause_circle
                                        @elseif($mission->status === 'closed')
                                            cancel
                                        @else
                                            edit
                                        @endif
                                    </span>
                                    {{ $statusLabels[$mission->status] ?? ucfirst($mission->status) }}

                                </div>

                                <div class="mission-actions">
                                    <a href="#" class="action-btn btn-primary">
                                        <span class="material-symbols-rounded" style="font-size: 1rem;">visibility</span>
                                        Voir
                                    </a>
                                    <a href="#" class="action-btn btn-secondary">
                                        <span class="material-symbols-rounded" style="font-size: 1rem;">edit</span>
                                        Modifier
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
