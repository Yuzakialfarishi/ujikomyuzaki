@extends('admin.layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Data Galeri</h2>

    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">
        Tambah Foto
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="50">No</th>
                <th>Judul</th>
                <th width="180">Gambar</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($galeri as $key => $g)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $g->judul }}</td>

                <td>
                    @if ($g->gambar)
                        <img src="{{ asset('uploads/galeri/' . $g->gambar) }}" width="150" class="img-thumbnail">
                    @else
                        <span class="text-muted fst-italic">Tidak ada gambar</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.galeri.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="4" class="text-center text-muted p-3">
                    Belum ada data galeri.
                </td>
            </tr>

            @endforelse
        </tbody>
    </table>

</div>
@endsection
