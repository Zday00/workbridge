@extends('dashboard.layouts.app')

@section('content')
    <style>
        .edit-container {
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

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #f7fafc;
            color: #4a5568;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
            transform: translateX(-2px);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group.row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
            margin-left: 4px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #ffffff;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-textarea {
            width: 100%;
            min-height: 120px;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #ffffff;
            resize: vertical;
            font-family: inherit;
            line-height: 1.5;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
            appearance: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            padding-top: 24px;
            border-top: 1px solid #f1f5f9;
            margin-top: 32px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            box-sizing: border-box;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #f7fafc;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-list li {
            margin-bottom: 4px;
        }

        .input-error {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important;
        }

        @media (max-width: 768px) {
            .edit-container {
                padding: 16px;
            }

            .form-card {
                padding: 20px;
            }

            .form-group.row {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="edit-container">
        <div class="page-header">
            <h1 class="page-title">Modifier la mission</h1>
            <a href="{{ route('recruiter.index') }}" class="back-btn">
                <span class="material-symbols-rounded" style="font-size: 1.125rem;">arrow_back</span>
                Retour à la liste
            </a>
        </div>

        <!-- Messages de succès -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erreurs détectées :</strong>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('recruiter.update', $mission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Titre -->
                <div class="form-group">
                    <label for="title" class="form-label">
                        Titre de la mission
                        <span class="required">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $mission->title) }}"
                        class="form-input {{ $errors->has('title') ? 'input-error' : '' }}"
                        placeholder="Ex: Développeur Web Full Stack" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="form-label">
                        Description
                        <span class="required">*</span>
                    </label>
                    <textarea id="description" name="description"
                        class="form-textarea {{ $errors->has('description') ? 'input-error' : '' }}"
                        placeholder="Décrivez en détail la mission, les responsabilités, les compétences requises..." required>{{ old('description', $mission->description) }}</textarea>
                </div>

                <!-- Lieu et Salaire -->
                <div class="form-group row">
                    <div>
                        <label for="location" class="form-label">
                            Lieu
                            <span class="required">*</span>
                        </label>
                        <input type="text" id="location" name="location"
                            value="{{ old('location', $mission->location) }}"
                            class="form-input {{ $errors->has('location') ? 'input-error' : '' }}"
                            placeholder="Ex: Paris, Remote, Lyon..." required>
                    </div>
                    <div>
                        <label for="salary_range" class="form-label">
                            Fourchette salariale
                            <span class="required">*</span>
                        </label>
                        <input type="text" id="salary_range" name="salary_range"
                            value="{{ old('salary_range', $mission->salary_range) }}"
                            class="form-input {{ $errors->has('salary_range') ? 'input-error' : '' }}"
                            placeholder="Ex: 45 000€ - 55 000€" required>
                    </div>
                </div>

                <!-- Date limite et Statut -->
                <div class="form-group row">
                    <div>
                        <label for="deadline" class="form-label">
                            Date limite
                            <span class="required">*</span>
                        </label>
                        <input type="date" id="deadline" name="deadline"
                            value="{{ old('deadline', $mission->deadline ? \Carbon\Carbon::parse($mission->deadline)->format('Y-m-d') : '') }}"
                            class="form-input {{ $errors->has('deadline') ? 'input-error' : '' }}" required>
                    </div>
                    <div>
                        <label for="status" class="form-label">
                            Statut de la mission
                            <span class="required">*</span>
                        </label>
                        <select id="status" name="status"
                            class="form-select {{ $errors->has('status') ? 'input-error' : '' }}" required>
                            <option value="">-- Choisir un statut --</option>
                            <option value="open" {{ old('status', $mission->status) == 'open' ? 'selected' : '' }}>
                                Ouverte</option>
                            <option value="closed" {{ old('status', $mission->status) == 'closed' ? 'selected' : '' }}>
                                Fermée</option>
                            <option value="paused" {{ old('status', $mission->status) == 'paused' ? 'selected' : '' }}>En
                                pause</option>
                            <option value="filled" {{ old('status', $mission->status) == 'filled' ? 'selected' : '' }}>
                                Pourvue</option>
                            <option value="expired" {{ old('status', $mission->status) == 'expired' ? 'selected' : '' }}>
                                Expirée</option>
                        </select>
                    </div>
                </div>

                <!-- Catégorie -->
                <div class="form-group">
                    <label for="category" class="form-label">
                        Catégorie
                        <span class="required">*</span>
                    </label>
                    <select id="category" name="category"
                        class="form-select {{ $errors->has('category') ? 'input-error' : '' }}" required>
                        <option value="">-- Choisir une catégorie --</option>
                        <option value="informatique"
                            {{ old('category', $mission->category) == 'informatique' ? 'selected' : '' }}>Informatique
                        </option>
                        <option value="marketing"
                            {{ old('category', $mission->category) == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="education"
                            {{ old('category', $mission->category) == 'education' ? 'selected' : '' }}>Éducation</option>
                        <option value="sante" {{ old('category', $mission->category) == 'sante' ? 'selected' : '' }}>Santé
                        </option>
                        <option value="ingenierie"
                            {{ old('category', $mission->category) == 'ingenierie' ? 'selected' : '' }}>Ingénierie</option>
                        <option value="finance" {{ old('category', $mission->category) == 'finance' ? 'selected' : '' }}>
                            Finance</option>
                        <option value="art_design"
                            {{ old('category', $mission->category) == 'art_design' ? 'selected' : '' }}>Art et Design
                        </option>
                        <option value="droit" {{ old('category', $mission->category) == 'droit' ? 'selected' : '' }}>Droit
                        </option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('recruiter.index') }}" class="btn btn-secondary">
                        <span class="material-symbols-rounded" style="font-size: 1.125rem;">cancel</span>
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-rounded" style="font-size: 1.125rem;">save</span>
                        Sauvegarder les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
