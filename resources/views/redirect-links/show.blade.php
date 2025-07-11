@extends('layouts.dashboard')

@section('title', 'Redirect Link Details')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Redirect Link Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Short URL:</label>
                        <div class="col-sm-9">
                            <a href="{{ route('redirect', $redirectLink->short_url) }}" target="_blank" class="form-control-plaintext">
                                {{ config('app.url') }}/{{ $redirectLink->short_url }}
                            </a>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Destination URL:</label>
                        <div class="col-sm-9">
                            <a href="{{ $redirectLink->destination_url }}" target="_blank" class="form-control-plaintext">
                                {{ $redirectLink->destination_url }}
                            </a>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $redirectLink->title ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $redirectLink->description ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Clicks:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $redirectLink->clicks }}</p>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Status:</label>
                        <div class="col-sm-9">
                            @if($redirectLink->isValid())
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Expires At:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">
                                {{ $redirectLink->expires_at ? $redirectLink->expires_at->format('Y-m-d H:i') : 'Never' }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Created At:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">
                                {{ $redirectLink->created_at->format('Y-m-d H:i') }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('redirect-links.edit', $redirectLink->id) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('redirect-links.destroy', $redirectLink->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection