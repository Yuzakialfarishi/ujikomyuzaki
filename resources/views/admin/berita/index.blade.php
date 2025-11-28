@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Berita</h1>

    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($berita as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>

                <td>
                    @php
                        $imgUrl = asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg'); // default fallback

                        if (!empty($item->gambar)) {
                            // Normalize backslashes to forward slashes (Windows paths)
                            $candidate = str_replace('\\', '/', $item->gambar);
                            $candidate = ltrim($candidate, '/');

                            // If the file exists under public path, use asset() to generate URL
                            if (file_exists(public_path($candidate))) {
                                $imgUrl = asset($candidate);
                            }
                        }
                    @endphp

                    <img src="{{ $imgUrl }}" width="80" class="img-thumbnail" alt="Gambar Berita">
                </td>

                <td>
                    <a href="{{ route('admin.berita.edit', $item->id) }}"
                       class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.berita.destroy', $item->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus berita ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
