@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <div class="header-content">
                <div class="breadcrumb">
                    <a href="{{ route('candidate.index') }}">Missions</a>
                    <span class="separator">/</span>
                    <span class="current">Postuler à {{ $mission->title }}</span>
                </div>
                <h1 class="page-title">Postuler à la mission</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('candidate.index') }}" class="btn btn-secondary">
                    <span class="material-symbols-rounded">arrow_back</span>
                    Retour
                </a>
            </div>
        </div>

        <!-- Formulaire -->
        <div class="application-layout">
            <div class="main-content">
                <form action="{{ route('candidate.storeApply', $mission->id) }}" method="POST" class="application-form">
                    @csrf
                    <input type="hidden" name="mission_id" value="{{ $mission->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Lettre de motivation</h2>
                            <p class="card-subtitle">Expliquez pourquoi vous êtes le candidat idéal</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="cover_letter" class="form-label">Votre lettre de motivation <span
                                        class="required">*</span></label>
                                <textarea id="cover_letter" name="cover_letter" rows="12" placeholder="Écrivez votre lettre..." required>{{ old('cover_letter') }}</textarea>

                                @error('cover_letter')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span class="material-symbols-rounded">send</span>
                            Envoyer ma candidature
                        </button>
                    </div>
                </form>
            </div>

            <div class="info-sidebar">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mission</h3>
                    </div>
                    <div class="card-body">
                        <h4>{{ $mission->title }}</h4>
                        <p>{{ $mission->company->name ?? 'Entreprise' }}</p>
                        @if ($mission->location)
                            <p>📍 {{ $mission->location }}</p>
                        @endif
                        @if ($mission->contract_type)
                            <p>💼 {{ $mission->contract_type }}</p>
                        @endif
                        @if ($mission->salary)
                            <p>💰 {{ $mission->salary }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Conteneur principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 1px solid #e1e5e9;
            padding-bottom: 20px;
        }

        .breadcrumb {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 8px;
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
            margin: 0;
        }

        /* Layout formulaire + sidebar */
        .application-layout {
            display: flex;
            gap: 30px;
        }

        .main-content {
            flex: 2;
        }

        .info-sidebar {
            flex: 1;
        }

        /* Cards */
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #e1e5e9;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        .card-subtitle {
            color: #6c757d;
            margin-top: 4px;
        }

        .card-body {
            padding: 20px;
        }

        /* Formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            resize: vertical;
        }

        textarea:focus {
            outline: none;
            border-color: #007bff;
        }

        .error-message {
            color: #dc3545;
            margin-top: 5px;
        }

        /* Boutons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .application-layout {
                flex-direction: column;
            }
        }
    </style>
@endsection
