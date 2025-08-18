@extends('dashboard.layouts.app')

@section('content')
    <style>
        .cv-builder-container {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .form-section {
            flex: 1;
            background: white;
            padding: 30px;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            max-height: 100vh;
        }

        .cv-preview {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
            overflow-y: auto;
            max-height: 100vh;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .section-title {
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }

        .experience-item,
        .education-item {
            background: #f8f9fa;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .col-half {
            flex: 1;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-outline {
            background-color: transparent;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .btn-outline:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-remove {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            float: right;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        /* CV Styles */
        .cv-document {
            background: white;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .cv-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .cv-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .cv-title {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .cv-contact {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 14px;
        }

        .cv-body {
            padding: 30px;
        }

        .cv-section {
            margin-bottom: 30px;
        }

        .cv-section-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #667eea;
        }

        .cv-profile {
            line-height: 1.6;
            color: #555;
            text-align: justify;
        }

        .cv-experience-item,
        .cv-education-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .cv-experience-header,
        .cv-education-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .cv-experience-title,
        .cv-education-title {
            font-weight: bold;
            color: #333;
        }

        .cv-experience-company,
        .cv-education-school {
            color: #666;
            font-style: italic;
        }

        .cv-experience-dates,
        .cv-education-dates {
            color: #888;
            font-size: 14px;
        }

        .cv-experience-description,
        .cv-education-description {
            margin-top: 8px;
            line-height: 1.5;
            color: #555;
        }

        .cv-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .cv-skill-item {
            background: #e9f4ff;
            color: #0066cc;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .empty-state {
            color: #999;
            font-style: italic;
            text-align: center;
            padding: 20px;
        }
    </style>

    <div class="cv-builder-container">
        <!-- Formulaire à gauche -->
        <div class="form-section">
            <h2 class="section-title">Créateur de CV</h2>

            <form id="cvForm">
                <!-- Informations personnelles -->
                <div class="form-section-group">
                    <h3 class="section-title">Informations personnelles</h3>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" data-target="cv-prenom"
                            placeholder="Votre prénom">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" data-target="cv-nom"
                            placeholder="Votre nom">
                    </div>

                    <div class="form-group">
                        <label for="titre">Titre/Poste recherché</label>
                        <input type="text" class="form-control" id="titre" data-target="cv-titre"
                            placeholder="Ex: Développeur Full Stack">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" data-target="cv-email"
                            placeholder="votre.email@exemple.com">
                    </div>

                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" class="form-control" id="telephone" data-target="cv-telephone"
                            placeholder="+33 1 23 45 67 89">
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" data-target="cv-adresse"
                            placeholder="Ville, Pays">
                    </div>
                </div>

                <!-- Profil -->
                <div class="form-section-group">
                    <h3 class="section-title">Profil professionnel</h3>
                    <div class="form-group">
                        <label for="profil">Résumé professionnel</label>
                        <textarea class="form-control" id="profil" data-target="cv-profil" rows="4"
                            placeholder="Décrivez votre profil professionnel en quelques lignes..."></textarea>
                    </div>
                </div>

                <!-- Expériences -->
                <div class="form-section-group">
                    <h3 class="section-title">Expériences professionnelles</h3>
                    <div id="experiences-container">
                        <div class="experience-item" data-index="0">
                            <button type="button" class="btn btn-remove" onclick="removeExperience(0)">×</button>
                            <div class="row">
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Poste</label>
                                        <input type="text" class="form-control" data-target="exp-poste-0"
                                            placeholder="Intitulé du poste">
                                    </div>
                                </div>
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Entreprise</label>
                                        <input type="text" class="form-control" data-target="exp-entreprise-0"
                                            placeholder="Nom de l'entreprise">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Date début</label>
                                        <input type="text" class="form-control" data-target="exp-debut-0"
                                            placeholder="01/2020">
                                    </div>
                                </div>
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Date fin</label>
                                        <input type="text" class="form-control" data-target="exp-fin-0"
                                            placeholder="12/2022 ou Actuel">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" data-target="exp-description-0" rows="3"
                                    placeholder="Décrivez vos missions et réalisations..."></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline" onclick="addExperience()">+ Ajouter une
                        expérience</button>
                </div>

                <!-- Formation -->
                <div class="form-section-group">
                    <h3 class="section-title">Formation</h3>
                    <div id="education-container">
                        <div class="education-item" data-index="0">
                            <button type="button" class="btn btn-remove" onclick="removeEducation(0)">×</button>
                            <div class="row">
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Diplôme</label>
                                        <input type="text" class="form-control" data-target="edu-diplome-0"
                                            placeholder="Master, Licence, BTS...">
                                    </div>
                                </div>
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>École/Université</label>
                                        <input type="text" class="form-control" data-target="edu-ecole-0"
                                            placeholder="Nom de l'établissement">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Année</label>
                                        <input type="text" class="form-control" data-target="edu-annee-0"
                                            placeholder="2022">
                                    </div>
                                </div>
                                <div class="col-half">
                                    <div class="form-group">
                                        <label>Mention (optionnel)</label>
                                        <input type="text" class="form-control" data-target="edu-mention-0"
                                            placeholder="Très bien, Bien...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline" onclick="addEducation()">+ Ajouter une
                        formation</button>
                </div>

                <!-- Compétences -->
                <div class="form-section-group">
                    <h3 class="section-title">Compétences</h3>
                    <div class="form-group">
                        <label for="competences">Compétences (séparées par des virgules)</label>
                        <textarea class="form-control" id="competences" data-target="cv-competences" rows="3"
                            placeholder="JavaScript, PHP, Laravel, React, MySQL, Git..."></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Aperçu CV à droite -->
        <div class="cv-preview">
            <div class="cv-document">
                <!-- En-tête -->
                <div class="cv-header">
                    <div class="cv-name">
                        <span id="cv-prenom">Prénom</span> <span id="cv-nom">NOM</span>
                    </div>
                    <div class="cv-title" id="cv-titre">Titre du poste</div>
                    <div class="cv-contact">
                        <span id="cv-email">email@exemple.com</span>
                        <span id="cv-telephone">+33 1 23 45 67 89</span>
                        <span id="cv-adresse">Ville, Pays</span>
                    </div>
                </div>

                <!-- Corps du CV -->
                <div class="cv-body">
                    <!-- Profil -->
                    <div class="cv-section">
                        <div class="cv-section-title">Profil</div>
                        <div class="cv-profile" id="cv-profil">
                            <div class="empty-state">Ajoutez votre résumé professionnel...</div>
                        </div>
                    </div>

                    <!-- Expériences -->
                    <div class="cv-section">
                        <div class="cv-section-title">Expériences professionnelles</div>
                        <div id="cv-experiences">
                            <div class="cv-experience-item" id="cv-exp-0">
                                <div class="cv-experience-header">
                                    <div>
                                        <div class="cv-experience-title" id="exp-poste-0">Poste</div>
                                        <div class="cv-experience-company" id="exp-entreprise-0">Entreprise</div>
                                    </div>
                                    <div class="cv-experience-dates">
                                        <span id="exp-debut-0">Date début</span> - <span id="exp-fin-0">Date fin</span>
                                    </div>
                                </div>
                                <div class="cv-experience-description" id="exp-description-0">Description de
                                    l'expérience...</div>
                            </div>
                        </div>
                    </div>

                    <!-- Formation -->
                    <div class="cv-section">
                        <div class="cv-section-title">Formation</div>
                        <div id="cv-education">
                            <div class="cv-education-item" id="cv-edu-0">
                                <div class="cv-education-header">
                                    <div>
                                        <div class="cv-education-title" id="edu-diplome-0">Diplôme</div>
                                        <div class="cv-education-school" id="edu-ecole-0">École/Université</div>
                                    </div>
                                    <div class="cv-education-dates">
                                        <span id="edu-annee-0">Année</span>
                                        <span id="edu-mention-0" style="font-style: italic; margin-left: 10px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Compétences -->
                    <div class="cv-section">
                        <div class="cv-section-title">Compétences</div>
                        <div class="cv-skills" id="cv-competences">
                            <div class="empty-state">Ajoutez vos compétences...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let experienceCount = 1;
        let educationCount = 1;
        let debounceTimeout;

        // Fonction debounce pour optimiser les performances
        function debounce(func, wait) {
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(debounceTimeout);
                    func(...args);
                };
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(later, wait);
            };
        }

        // Fonction pour mettre à jour le CV en temps réel
        function updateCV(input) {
            const target = input.getAttribute('data-target');
            const value = input.value;
            const targetElement = document.getElementById(target);

            if (targetElement) {
                if (target === 'cv-competences') {
                    updateSkills(value);
                } else if (target === 'cv-profil' && value.trim() === '') {
                    targetElement.innerHTML = '<div class="empty-state">Ajoutez votre résumé professionnel...</div>';
                } else {
                    targetElement.textContent = value || getPlaceholder(target);
                }
            }
        }

        // Fonction pour obtenir le placeholder par défaut
        function getPlaceholder(target) {
            const placeholders = {
                'cv-prenom': 'Prénom',
                'cv-nom': 'NOM',
                'cv-titre': 'Titre du poste',
                'cv-email': 'email@exemple.com',
                'cv-telephone': '+33 1 23 45 67 89',
                'cv-adresse': 'Ville, Pays'
            };
            return placeholders[target] || '';
        }

        // Fonction pour mettre à jour les compétences
        function updateSkills(skillsText) {
            const skillsContainer = document.getElementById('cv-competences');
            if (!skillsText.trim()) {
                skillsContainer.innerHTML = '<div class="empty-state">Ajoutez vos compétences...</div>';
                return;
            }

            const skills = skillsText.split(',').map(skill => skill.trim()).filter(skill => skill);
            const skillsHTML = skills.map(skill => `<span class="cv-skill-item">${skill}</span>`).join('');
            skillsContainer.innerHTML = skillsHTML;
        }

        // Fonction pour ajouter une expérience
        function addExperience() {
            const container = document.getElementById('experiences-container');
            const experienceHTML = `
        <div class="experience-item" data-index="${experienceCount}">
            <button type="button" class="btn btn-remove" onclick="removeExperience(${experienceCount})">×</button>
            <div class="row">
                <div class="col-half">
                    <div class="form-group">
                        <label>Poste</label>
                        <input type="text" class="form-control" data-target="exp-poste-${experienceCount}" placeholder="Intitulé du poste">
                    </div>
                </div>
                <div class="col-half">
                    <div class="form-group">
                        <label>Entreprise</label>
                        <input type="text" class="form-control" data-target="exp-entreprise-${experienceCount}" placeholder="Nom de l'entreprise">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-half">
                    <div class="form-group">
                        <label>Date début</label>
                        <input type="text" class="form-control" data-target="exp-debut-${experienceCount}" placeholder="01/2020">
                    </div>
                </div>
                <div class="col-half">
                    <div class="form-group">
                        <label>Date fin</label>
                        <input type="text" class="form-control" data-target="exp-fin-${experienceCount}" placeholder="12/2022 ou Actuel">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" data-target="exp-description-${experienceCount}" rows="3" placeholder="Décrivez vos missions et réalisations..."></textarea>
            </div>
        </div>
    `;

            container.insertAdjacentHTML('beforeend', experienceHTML);

            // Ajouter l'expérience dans le CV
            const cvExperiences = document.getElementById('cv-experiences');
            const cvExpHTML = `
        <div class="cv-experience-item" id="cv-exp-${experienceCount}">
            <div class="cv-experience-header">
                <div>
                    <div class="cv-experience-title" id="exp-poste-${experienceCount}">Poste</div>
                    <div class="cv-experience-company" id="exp-entreprise-${experienceCount}">Entreprise</div>
                </div>
                <div class="cv-experience-dates">
                    <span id="exp-debut-${experienceCount}">Date début</span> - <span id="exp-fin-${experienceCount}">Date fin</span>
                </div>
            </div>
            <div class="cv-experience-description" id="exp-description-${experienceCount}">Description de l'expérience...</div>
        </div>
    `;

            cvExperiences.insertAdjacentHTML('beforeend', cvExpHTML);
            experienceCount++;

            // Réattacher les événements
            attachEvents();
        }

        // Fonction pour supprimer une expérience
        function removeExperience(index) {
            const formExp = document.querySelector(`[data-index="${index}"]`);
            const cvExp = document.getElementById(`cv-exp-${index}`);

            if (formExp) formExp.remove();
            if (cvExp) cvExp.remove();
        }

        // Fonction pour ajouter une formation
        function addEducation() {
            const container = document.getElementById('education-container');
            const educationHTML = `
        <div class="education-item" data-index="${educationCount}">
            <button type="button" class="btn btn-remove" onclick="removeEducation(${educationCount})">×</button>
            <div class="row">
                <div class="col-half">
                    <div class="form-group">
                        <label>Diplôme</label>
                        <input type="text" class="form-control" data-target="edu-diplome-${educationCount}" placeholder="Master, Licence, BTS...">
                    </div>
                </div>
                <div class="col-half">
                    <div class="form-group">
                        <label>École/Université</label>
                        <input type="text" class="form-control" data-target="edu-ecole-${educationCount}" placeholder="Nom de l'établissement">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-half">
                    <div class="form-group">
                        <label>Année</label>
                        <input type="text" class="form-control" data-target="edu-annee-${educationCount}" placeholder="2022">
                    </div>
                </div>
                <div class="col-half">
                    <div class="form-group">
                        <label>Mention (optionnel)</label>
                        <input type="text" class="form-control" data-target="edu-mention-${educationCount}" placeholder="Très bien, Bien...">
                    </div>
                </div>
            </div>
        </div>
    `;

            container.insertAdjacentHTML('beforeend', educationHTML);

            // Ajouter la formation dans le CV
            const cvEducation = document.getElementById('cv-education');
            const cvEduHTML = `
        <div class="cv-education-item" id="cv-edu-${educationCount}">
            <div class="cv-education-header">
                <div>
                    <div class="cv-education-title" id="edu-diplome-${educationCount}">Diplôme</div>
                    <div class="cv-education-school" id="edu-ecole-${educationCount}">École/Université</div>
                </div>
                <div class="cv-education-dates">
                    <span id="edu-annee-${educationCount}">Année</span>
                    <span id="edu-mention-${educationCount}" style="font-style: italic; margin-left: 10px;"></span>
                </div>
            </div>
        </div>
    `;

            cvEducation.insertAdjacentHTML('beforeend', cvEduHTML);
            educationCount++;

            // Réattacher les événements
            attachEvents();
        }

        // Fonction pour supprimer une formation
        function removeEducation(index) {
            const formEdu = document.querySelector(`#education-container [data-index="${index}"]`);
            const cvEdu = document.getElementById(`cv-edu-${index}`);

            if (formEdu) formEdu.remove();
            if (cvEdu) cvEdu.remove();
        }

        // Fonction pour attacher les événements aux champs de formulaire
        function attachEvents() {
            const debouncedUpdate = debounce(updateCV, 300);

            document.querySelectorAll('[data-target]').forEach(input => {
                // Supprimer les anciens événements pour éviter les doublons
                input.removeEventListener('input', handleInput);
                input.addEventListener('input', handleInput);
            });

            function handleInput(e) {
                debouncedUpdate(e.target);
            }
        }

        // Initialiser les événements au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            attachEvents();

            // Empêcher la soumission du formulaire
            document.getElementById('cvForm').addEventListener('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
@endsection
