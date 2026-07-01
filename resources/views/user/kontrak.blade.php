@extends('layouts.app')

@section('title','Data Sewa')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">
                Data Sewa Penyewa
            </h2>

            <p class="text-secondary">
                Informasi penyewa dan masa sewa kamar.
            </p>
        </div>
        @if(Auth::user()->role === 'admin')
            <div class="col text-end">
                <a href="{{ route('kontrak.create') }}" class="btn btn-pink">Tambah Kontrak</a>
            </div>
        @endif
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Kamar</th>
                            <th>Tanggal Mulai</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($sewa as $index => $item)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                <b>{{ $item->tenant_name }}</b>
                            </td>

                            <td>
                                {{ $item->room->room_code ?? '-' }}
                            </td>

                            <td>
                                {{ $item->contract_start }}
                            </td>

                            <td>
                                <span class="text-danger fw-bold">
                                    {{ $item->contract_end }}
                                </span>
                            </td>

                            <td>

                                @if($item->payment_status == 'Aktif')

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    {{ $item->payment_status }}
                                </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('penyewa.detail', $item->id) }}"
                                    class="btn btn-primary btn-sm">

                                    <i class="fas fa-eye"></i>
                                    Detail

                                </a>

                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('kontrak.edit', $item->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                @endif

                                @if(Auth::user()->role === 'admin' || Auth::id() === $item->user_id)
                                    <form action="{{ route('penyewa.notif', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        <button type="submit"
                                            class="btn btn-warning btn-sm">

                                            <i class="fas fa-bell"></i>
                                            Kirim Notifikasi

                                        </button>

                                    </form>
                                @endif

                                @if(Auth::user()->role === 'admin')
                                    <form action="{{ route('kontrak.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data sewa ini?');">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>

                                    </form>
                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada data kontrak.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection