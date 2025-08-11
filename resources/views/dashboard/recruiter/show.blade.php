@extends('dashboard.layouts.app')
@section('content')
    <style>
        /* Conteneur principal */
        .conteneur {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Message flash */
        .message-flash {
            background-color: #e6ffed;
            border: 1px solid #34d399;
            color: #047857;
            padding: 16px 24px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            font-size: 1rem;
            animation: apparition 0.5s ease-in-out;
        }

        @keyframes apparition {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Carte mission */
        .carte-mission {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .carte-mission:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        /* En-tête de la carte */
        .entete-mission {
            background: linear-gradient(to right, #3b82f6, #4f46e5);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .entete-mission h1 {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .statut-mission {
            background-color: #ffffff;
            color: #374151;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        /* Corps de la carte en grille 2 colonnes */
        .corps-mission {
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px 40px;
            /* 30px vertical, 40px horizontal */
        }

        /* Sections informations */
        .section-mission {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .section-mission h2 {
            color: #374151;
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
            min-width: 120px;
            flex-shrink: 0;
        }

        .section-mission p {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
            flex: 1;
        }

        /* Pied de carte */
        .pied-mission {
            background-color: #f9fafb;
            padding: 20px 30px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            flex-wrap: wrap;
        }

        .pied-mission a {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .pied-mission a.retour {
            background-color: #d1d5db;
            color: #1f2937;
        }

        .pied-mission a.retour:hover {
            background-color: #9ca3af;
            transform: translateY(-2px);
        }

        .pied-mission a.modifier {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .pied-mission a.modifier:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        /* Responsivité : une seule colonne sur mobile */
        @media (max-width: 768px) {
            .conteneur {
                margin: 20px auto;
                padding: 0 15px;
            }

            .corps-mission {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .section-mission h2 {
                min-width: auto;
                margin-bottom: 8px;
            }

            .entete-mission {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .entete-mission h1 {
                font-size: 1.5rem;
            }

            .pied-mission {
                justify-content: center;
            }
        }
    </style>

    <div class="conteneur">
        {{-- Message flash --}}
        @if (session('success'))
            <div id="message-flash" class="message-flash">
                {{ session('success') }}
            </div>
        @endif

        {{-- Carte mission --}}
        <div class="carte-mission">
            {{-- En-tête --}}
            <div class="entete-mission">
                <h1>{{ $mission->title }}</h1>
                <span class="statut-mission">{{ ucfirst($mission->status) }}</span>
            </div>

            {{-- Corps --}}
            <div class="corps-mission">
                <div class="section-mission">
                    <h2>Description</h2>
                    <p>{{ $mission->description }}</p>
                </div>

                <div class="section-mission">
                    <h2>Lieu</h2>
                    <p>{{ $mission->location }}</p>
                </div>

                <div class="section-mission">
                    <h2>Salaire</h2>
                    <p>{{ $mission->salary_range }}</p>
                </div>

                <div class="section-mission">
                    <h2>Date limite</h2>
                    <p>
                        {{ ucfirst(\Carbon\Carbon::parse($mission->deadline)->locale('fr')->isoFormat('dddd D MMMM YYYY')) }}
                    </p>
                </div>
            </div>

            {{-- Pied de carte --}}
            <div class="pied-mission">
                <a href="{{ route('recruiter.index') }}" class="retour">Retour</a>
                <a href="{{ route('recruiter.edit', $mission->id) }}" class="modifier">Modifier</a>
            </div>
        </div>
    </div>
@endsection
