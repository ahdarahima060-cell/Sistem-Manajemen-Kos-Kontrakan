@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-16 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <span class="inline-flex rounded-full bg-[#FEF3C7] px-3 py-1 text-sm font-semibold text-[#92400E]">Aplikasi Manajemen Properti</span>
                    <h1 class="text-4xl font-semibold tracking-tight text-[#111827] sm:text-5xl">Kelola kos, penyewa, dan tagihan dengan lebih mudah.</h1>
                    <p class="max-w-2xl text-base leading-8 text-[#475569]">Dashboard sederhana ini dirancang untuk pemilik kos. Tambahkan kamar, simpan data penyewa, buat invoice, dan verifikasi bukti pembayaran.</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('login') }}" class="rounded-3xl bg-[#1B1B18] px-6 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#111827]">Login Pemilik</a>
                    <a href="{{ route('invoices.index') }}" class="rounded-3xl border border-[#E5E7EB] bg-white px-6 py-4 text-center text-sm font-semibold text-[#1B1B18] transition hover:border-[#1B1B18] hover:text-[#1B1B18]">Demo Tagihan</a>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl bg-[#EFF6FF] p-6 shadow-sm ring-1 ring-[#DBEAFE]">
                        <p class="text-sm font-semibold text-[#1E3A8A]">Kelola Kamar</p>
                        <p class="mt-2 text-sm text-[#475569]">Atur tipe, harga, dan status kamar dengan cepat.</p>
                    </div>
                    <div class="rounded-3xl bg-[#ECFDF5] p-6 shadow-sm ring-1 ring-[#D1FAE5]">
                        <p class="text-sm font-semibold text-[#065F46]">Kelola Penyewa</p>
                        <p class="mt-2 text-sm text-[#475569]">Simpan kontak dan histori penyewa tanpa ribet.</p>
                    </div>
                    <div class="rounded-3xl bg-[#FEE2E2] p-6 shadow-sm ring-1 ring-[#FECACA]">
                        <p class="text-sm font-semibold text-[#B91C1C]">Invoice & Verifikasi</p>
                        <p class="mt-2 text-sm text-[#475569]">Buat tagihan dan verifikasi bukti transfer dengan mudah.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[32px] bg-[#FEF3F2] p-8 shadow-sm ring-1 ring-[#FECACA]/70">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#B91C1C]">Fitur Utama</p>
                <div class="mt-8 space-y-6">
                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <p class="font-semibold text-[#111827]">Akses cepat ke data</p>
                        <p class="mt-2 text-sm text-[#475569]">Lihat ringkasan kamar, penyewa, dan tagihan dalam satu halaman.</p>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <p class="font-semibold text-[#111827]">User-friendly</p>
                        <p class="mt-2 text-sm text-[#475569]">Form input yang simpel dan tampilan yang mudah dibaca.</p>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <p class="font-semibold text-[#111827]">Rapi & Modern</p>
                        <p class="mt-2 text-sm text-[#475569]">Antarmuka yang konsisten mempercepat pekerjaan pemilik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
