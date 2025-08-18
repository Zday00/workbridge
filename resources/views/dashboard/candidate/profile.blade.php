@extends('dashboard.layouts.app')

@section('content')
    <style>
        .profile-container {
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

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .form-section {
            margin-bottom: 32px;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-icon {
            color: #667eea;
            font-size: 1.5rem;
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

        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            min-height: 50px;
            background-color: #f9fafb;
        }

        .skill-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .skill-remove {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            padding: 0;
            margin-left: 4px;
        }

        .skill-input-container {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }

        .skill-input {
            flex: 1;
            padding: 8px 12px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.875rem;
        }

        .skill-add-btn {
            padding: 8px 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .cv-upload-section {
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 24px;
            text-align: center;
            background-color: #f9fafb;
            transition: all 0.2s ease;
        }

        .cv-upload-section:hover {
            border-color: #667eea;
            background-color: #f0f4ff;
        }

        .cv-upload-icon {
            font-size: 3rem;
            color: #9ca3af;
            margin-bottom: 12px;
        }

        .cv-upload-text {
            font-size: 1rem;
            color: #4b5563;
            margin-bottom: 8px;
        }

        .cv-upload-subtext {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 16px;
        }

        .cv-file-input {
            display: none;
        }

        .cv-upload-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .current-cv {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .cv-icon {
            color: #059669;
            font-size: 1.5rem;
        }

        .cv-info {
            flex: 1;
        }

        .cv-name {
            font-weight: 600;
            color: #065f46;
            font-size: 0.875rem;
        }

        .cv-size {
            font-size: 0.75rem;
            color: #059669;
        }

        .cv-actions {
            display: flex;
            gap: 8px;
        }

        .cv-action-btn {
            padding: 4px 8px;
            border: none;
            border-radius: 4px;
            font-size: 0.75rem;
            cursor: pointer;
            font-weight: 500;
        }

        .cv-view-btn {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .cv-delete-btn {
            background: #fecaca;
            color: #dc2626;
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

        .input-error {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 16px;
            }

            .profile-card {
                padding: 20px;
            }

            .form-group.row {
                grid-template-columns: 1fr;
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

    <div class="profile-container">
        <div class="page-header">
            <h1 class="page-title">Mon Profil</h1>
        </div>

        <!-- Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erreurs détectées :</strong>
                <ul style="margin: 8px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="profile-card">
            <form action="{{ route('candidate.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Informations personnelles -->
                <div class="form-section">
                    <h2 class="section-title">
                        <span class="material-symbols-rounded section-icon">person</span>
                        Informations personnelles
                    </h2>

                    <div class="form-group row">
                        <div>
                            <label for="first_name" class="form-label">
                                Prénom
                                <span class="required">*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}"
                                class="form-input {{ $errors->has('first_name') ? 'input-error' : '' }}" required>
                        </div>
                        <div>
                            <label for="last_name" class="form-label">
                                Nom
                                <span class="required">*</span>
                            </label>
                            <input type="text" id="last_name" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}"
                                class="form-input {{ $errors->has('last_name') ? 'input-error' : '' }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" value="{{ $user->email }}" class="form-input" disabled
                            style="background-color: #f3f4f6; color: #6b7280;">
                        <small style="color: #6b7280; font-size: 0.75rem;">L'email ne peut pas être modifié</small>
                    </div>
                </div>

                <!-- Bio -->
                <div class="form-section">
                    <h2 class="section-title">
                        <span class="material-symbols-rounded section-icon">description</span>
                        Présentation
                    </h2>

                    <div class="form-group">
                        <label for="bio" class="form-label">Biographie</label>
                        <textarea id="bio" name="bio" class="form-textarea {{ $errors->has('bio') ? 'input-error' : '' }}"
                            placeholder="Présentez-vous en quelques lignes : votre parcours, vos objectifs, ce qui vous motive...">{{ old('bio', $candidate->bio ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Compétences -->
                <div class="form-section">
                    <h2 class="section-title">
                        <span class="material-symbols-rounded section-icon">psychology</span>
                        Compétences
                    </h2>

                    <div class="form-group">
                        <label class="form-label">Mes compétences</label>
                        <div class="skills-container" id="skillsContainer">
                            @php
                                $skills = $candidate && $candidate->skills ? $candidate->skills : [];
                            @endphp
                            @foreach ($skills as $skill)
                                <div class="skill-tag">
                                    {{ $skill }}
                                    <button type="button" class="skill-remove" onclick="removeSkill(this)">
                                        <span class="material-symbols-rounded" style="font-size: 0.875rem;">close</span>
                                    </button>
                                    <input type="hidden" name="skills[]" value="{{ $skill }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="skill-input-container">
                            <input type="text" id="skillInput" class="skill-input"
                                placeholder="Ajouter une compétence...">
                            <button type="button" class="skill-add-btn" onclick="addSkill()">
                                <span class="material-symbols-rounded" style="font-size: 1rem;">add</span>
                                Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CV -->
                <div class="form-section">
                    <h2 class="section-title">
                        <span class="material-symbols-rounded section-icon">description</span>
                        Curriculum Vitae
                    </h2>

                    @if ($candidate && $candidate->cv_path)
                        <div class="current-cv">
                            <span class="material-symbols-rounded cv-icon">picture_as_pdf</span>
                            <div class="cv-info">
                                <div class="cv-name">{{ basename($candidate->cv_path) }}</div>
                                <div class="cv-size">PDF • Téléchargé
                                    {{ $candidate->updated_at->locale('fr')->diffForHumans() }}</div>
                            </div>
                            <div class="cv-actions">
                                <a href="{{ asset('storage/' . $candidate->cv_path) }}" target="_blank"
                                    class="cv-action-btn cv-view-btn">
                                    Voir
                                </a>
                                <button type="button" class="cv-action-btn cv-delete-btn" onclick="deleteCV()">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="cv-upload-section">
                        <div class="cv-upload-icon">
                            <span class="material-symbols-rounded">upload_file</span>
                        </div>
                        <div class="cv-upload-text">
                            {{ $candidate && $candidate->cv_path ? 'Remplacer mon CV' : 'Télécharger mon CV' }}
                        </div>
                        <div class="cv-upload-subtext">
                            Format PDF uniquement, taille maximum 5MB
                        </div>
                        <input type="file" id="cv_file" name="cv_file" accept=".pdf" class="cv-file-input">
                        <button type="button" class="cv-upload-btn"
                            onclick="document.getElementById('cv_file').click()">
                            <span class="material-symbols-rounded">attach_file</span>
                            Choisir un fichier
                        </button>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="window.location.reload()">
                        <span class="material-symbols-rounded">refresh</span>
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-rounded">save</span>
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Gestion des compétences
        function addSkill() {
            const input = document.getElementById('skillInput');
            const skill = input.value.trim();

            if (skill === '') return;

            // Vérifier si la compétence n'existe pas déjà
            const existingSkills = Array.from(document.querySelectorAll('input[name="skills[]"]')).map(input => input
                .value);
            if (existingSkills.includes(skill)) {
                alert('Cette compétence est déjà ajoutée.');
                return;
            }

            const container = document.getElementById('skillsContainer');
            const skillTag = document.createElement('div');
            skillTag.className = 'skill-tag';
            skillTag.innerHTML = `
            ${skill}
            <button type="button" class="skill-remove" onclick="removeSkill(this)">
                <span class="material-symbols-rounded" style="font-size: 0.875rem;">close</span>
            </button>
            <input type="hidden" name="skills[]" value="${skill}">
        `;

            container.appendChild(skillTag);
            input.value = '';
        }

        function removeSkill(button) {
            button.closest('.skill-tag').remove();
        }

        // Ajouter une compétence avec Enter
        document.getElementById('skillInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addSkill();
            }
        });

        // Gestion du fichier CV
        document.getElementById('cv_file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const uploadText = document.querySelector('.cv-upload-text');
                uploadText.textContent = `Fichier sélectionné: ${file.name}`;
            }
        });

        // Fonction pour supprimer le CV (à implémenter côté serveur)
        function deleteCV() {
            if (confirm('Êtes-vous sûr de vouloir supprimer votre CV ?')) {
                // Implémentation de la suppression via AJAX ou formulaire
                console.log('Suppression du CV');
            }
        }
    </script>
@endsection
