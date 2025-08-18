@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <div class="breadcrumb">
                <a href="{{ route('candidate.index') }}">Missions</a>
                <span class="separator">/</span>
                <a href="{{ route('candidate.show', $mission) }}">{{ $mission->title }}</a>
                <span class="separator">/</span>
                <span class="current">Postuler</span>
            </div>
            <h1 class="page-title">Postuler à la mission</h1>
            <a href="{{ route('candidate.show', $mission) }}" class="btn-back">← Retour</a>
        </div>

        @if (session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('applications.store', $mission->id) }}" method="POST" class="application-form">
            @csrf
            <input type="hidden" name="mission_id" value="{{ $mission->id }}">

            <label for="cover_letter">Lettre de motivation *</label>
            <textarea name="cover_letter" id="cover_letter" rows="12" required>{{ old('cover_letter') }}</textarea>
            @error('cover_letter')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-submit">Envoyer ma candidature</button>
        </form>
    </div>

    <style>
        /* Container */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Breadcrumb */
        .breadcrumb {
            font-size: 14px;
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
            margin: 0 5px;
        }

        .current {
            color: #555;
        }

        /* Header */
        .page-title {
            font-size: 28px;
            margin: 0 0 20px 0;
        }

        .btn-back {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .btn-back:hover {
            text-decoration: underline;
        }

        /* Alerts */
        .alert {
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert.error {
            background: #f8d7da;
            color: #721c24;
        }

        .alert.success {
            background: #d4edda;
            color: #155724;
        }

        /* Form */
        .application-form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: inherit;
            font-size: 14px;
            margin-bottom: 15px;
            resize: vertical;
        }

        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .error {
            color: #d9534f;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Submit button */
        .btn-submit {
            padding: 12px 20px;
            border: none;
            background: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-submit:hover {
            background: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>
@endsection
