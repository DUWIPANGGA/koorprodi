@extends('layouts.dashboard')

@section('title', 'Redirect Links')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Redirect Links</h4>
                    <a href="{{ route('redirect-links.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create New
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Short URL</th>
                                    <th>Destination URL</th>
                                    <th>Title</th>
                                    <th>Clicks</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($links as $link)
                                    <tr>
                                        <td>
                                            <a href="{{ route('redirect', $link->short_url) }}" target="_blank">
                                                {{ config('app.url') }}/{{ $link->short_url }}
                                            </a>
                                        </td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $link->destination_url }}
                                        </td>
                                        <td>{{ $link->title }}</td>
                                        <td>{{ $link->clicks }}</td>
                                        <td>
                                            @if($link->isValid())
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('redirect-links.edit', $link->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('redirect-links.destroy', $link->id) }}" 
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No links found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $links->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection