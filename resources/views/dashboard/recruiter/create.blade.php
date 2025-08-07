@extends('dashboard.layouts.app')
@section('content')
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 896px;
            margin: 0 auto;
            padding: 24px;
        }

        form {
            background: linear-gradient(to bottom right, #eef2ff, #dbeafe);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 24px;
        }

        .debug-info {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-family: monospace;
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #3730a3;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #a5b4fc;
            border-radius: 8px;
            background-color: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.5);
        }

        input.error-field,
        textarea.error-field,
        select.error-field {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.1) !important;
            background-color: #fef2f2 !important;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-button {
            display: flex;
            justify-content: flex-end;
            margin-top: 32px;
        }

        button {
            padding: 12px 24px;
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #4338ca;
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.5);
        }

        .error {
            color: #dc2626 !important;
            font-size: 13px !important;
            margin-top: 6px !important;
            font-weight: 600 !important;
            display: block !important;
            background-color: #fef2f2;
            padding: 4px 8px;
            border-radius: 4px;
            border-left: 3px solid #dc2626;
        }

        .alert {
            padding: 16px;
            margin-bottom: 24px;
            border-radius: 8px;
            border: 2px solid;
            font-weight: 500;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            border-color: #22c55e;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            border-color: #ef4444;
        }

        .alert ul {
            margin: 8px 0 0 20px;
            padding: 0;
        }

        .alert li {
            margin-bottom: 6px;
            font-weight: 500;
        }

        .required {
            color: #dc2626;
            font-weight: bold;
        }
    </style>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif
        <!-- Message d'erreur spécifique -->
        @if (session('error'))
            <div class="alert alert-error">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- Indicateur de validation échouée -->
        @if (session('validation_failed'))
            <div class="alert alert-error">
                ⚠️ La validation du formulaire a échoué. Veuillez corriger les erreurs ci-dessous.
            </div>
        @endif


        <form action="{{ route('recruiter.store') }}" method="POST" novalidate>
            @csrf

            <!-- Titre et Description -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Titre de la mission <span class="required">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="{{ $errors->has('title') ? 'error-field' : '' }}" required>
                    @error('title')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea name="description" id="description" rows="4"
                        class="{{ $errors->has('description') ? 'error-field' : '' }}" required>{{ old('description') }}</textarea>

                    @error('description')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Lieu et Fourchette salariale -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="location">Lieu <span class="required">*</span></label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}"
                        class="{{ $errors->has('location') ? 'error-field' : '' }}" required>

                    @error('location')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="salary_range">Fourchette salariale <span class="required">*</span></label>
                    <input type="text" name="salary_range" id="salary_range" value="{{ old('salary_range') }}"
                        class="{{ $errors->has('salary_range') ? 'error-field' : '' }}" required
                        placeholder="Ex: 35 000 - 45 000 €">
                    @error('salary_range')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Date limite et Statut -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="deadline">Date limite <span class="required">*</span></label>
                    <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                        class="{{ $errors->has('deadline') ? 'error-field' : '' }}" required>

                    @error('deadline')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Statut de la mission <span class="required">*</span></label>
                    <select id="status" name="status" class="{{ $errors->has('status') ? 'error-field' : '' }}"
                        required>
                        <option value="">-- Choisir un statut --</option>
                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Ouverte</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Fermée</option>
                        <option value="paused" {{ old('status') == 'paused' ? 'selected' : '' }}>En pause</option>
                        <option value="filled" {{ old('status') == 'filled' ? 'selected' : '' }}>Pourvue</option>
                        <option value="expired" {{ old('status') == 'expired' ? 'selected' : '' }}>Expirée</option>
                    </select>

                    @error('status')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Catégorie -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="category_id">Catégorie <span class="required">*</span></label>
                    <select name="category_id" id="category_id"
                        class="{{ $errors->has('category_id') ? 'error-field' : '' }}" required>
                        <option value="">-- Choisir une catégorie --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="error">🚨 {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Bouton -->
            <div class="form-button">
                <button type="submit">Créer la mission</button>
            </div>
        </form>
    </div>






    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la date minimum à demain
            const deadlineInput = document.getElementById('deadline');
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            deadlineInput.min = tomorrow.toISOString().split('T')[0];

            // Focus sur le premier champ avec erreur
            const firstError = document.querySelector('.error-field');
            if (firstError) {
                firstError.focus();
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }


            // Log des informations de debug
            console.log('Debug Form Info:');
            console.log('Errors count:', {{ $errors->count() }});
            console.log('Has old input:', {{ old() ? 'true' : 'false' }});
            console.log('Session validation_failed:', {{ session('validation_failed') ? 'true' : 'false' }});

            @if ($errors->any())
                console.log('Errors:');
                @foreach ($errors->all() as $error)
                    console.log('- {{ addslashes($error) }}');
                @endforeach
            @endif
        });
    </script>
@endsection
