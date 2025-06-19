@extends('layouts.dashboard')

@section('title', 'Edit Redirect Link')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Edit Redirect Link</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('redirect-links.update', $redirectLink->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="destination_url" class="form-label">Destination URL</label>
                            <input type="url" class="form-control @error('destination_url') is-invalid @enderror" 
                                   id="destination_url" name="destination_url" 
                                   value="{{ old('destination_url', $redirectLink->destination_url) }}" required>
                            @error('destination_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_url" class="form-label">Short URL</label>
                            <div class="input-group">
                                <span class="input-group-text">{{ config('app.url') }}/</span>
                                <input type="text" class="form-control @error('short_url') is-invalid @enderror" 
                                       id="short_url" name="short_url" 
                                       value="{{ old('short_url', $redirectLink->short_url) }}">
                            </div>
                            @error('short_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $redirectLink->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description', $redirectLink->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="expires_at" class="form-label">Expiration Date</label>
                            <input type="datetime-local" class="form-control @error('expires_at') is-invalid @enderror" 
                                   id="expires_at" name="expires_at" 
                                   value="{{ old('expires_at', optional($redirectLink->expires_at)->format('Y-m-d\TH:i') }}">
                            @error('expires_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', $redirectLink->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('redirect-links.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection