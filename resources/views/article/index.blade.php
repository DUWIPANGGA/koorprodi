@extends('layouts.dashboard')

@section('title', 'Create a Post')

@section('content')
    <div class="container-fluid h-100">
        <div class="row">
            <div class="col-12" style="overflow-x: auto; height: 92vh; padding-bottom: 5rem;">
                <div class="container h-100 w-100" style="padding-bottom: 5rem;">
                    <!-- Title Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>Data Artikel</h1>
                        <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm">Buat Artikel Baru</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <!-- Table Container -->
                    <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($articles as $article)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $article->judul }}</td>
                                            <td>{{ Str::limit(strip_tags($article->content), 50) }}</td>
                                            <td>
                                                @if ($article->picture_article)
                                                    <img src="{{ asset('storage/' . $article->picture_article) }}" alt="Picture" style="width: 100px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('article.update', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada artikel ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
