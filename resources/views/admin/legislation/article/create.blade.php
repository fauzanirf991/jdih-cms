@extends('admin.layouts.app')

@section('title', $pageTitle)
@section('content')

    <!-- Content area -->
    <div class="content pt-0">

        @include('admin.layouts.message')

        <!-- Form -->
        <form method="POST" action="{{ route('admin.legislation.article.store') }}" novalidate enctype="multipart/form-data">
            @csrf

            <!-- Inner container -->
            <div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row">

                <!-- Left content -->
                <div class="flex-1 order-2 order-lg-1">

                    <div class="card card-body">
                        <div class="alert alert-info border-0">
                            Penjelasan dan pedoman tata cara penulisan metadata artikel dapat dilihat pada <a href="https://jdih.baliprov.go.id/produk-hukum/peraturan-perundang-undangan/permenkumham/24804">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang Standar Pengelolaan Dokumen dan Informasi Hukum</a>.
                        </div>

                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">

                                <div class="mb-3">
                                    <label class="col-form-label" for="category_id">Jenis Artikel</label>
                                    <select name="category_id" id="category_id" autofocus class="select @error('category_id') is-invalid @enderror">
                                        <option value="">Pilih Jenis</option>
                                        @foreach ($categories as $key => $value)
                                            <option value="{{ $key }}" @selected(old('category_id') == $key)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="title">Judul:</label>
                                    <textarea name="title" id="title" rows="4" spellcheck="false" class="form-control @if ($errors->get('title') OR $errors->get('slug')) is-invalid @endif">{{ old('title') }}</textarea>
                                    <div class="form-text text-muted">Format penulisan: Tuliskan sesuai dengan yang terdapat dalam artikel hukum.</div>
                                    @if ($errors->get('title') OR $errors->get('slug'))
                                        <ul class="invalid-feedback list-unstyled">
                                            @foreach ($errors->get('title') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            @foreach ($errors->get('slug') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="col-form-label">Tahun Terbit</label>
                                    <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
                                    <div class="form-text text-muted">Tahun diterbitkannya artikel.</div>
                                    @error('year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="place" class="col-form-label">Tempat Terbit</label>
                                    <input type="text" name="place" id="place" class="form-control @error('place') is-invalid @enderror" value="{{ old('place') }}">
                                    <div class="form-text text-muted">Tempat artikel diterbitkan.</div>
                                    @error('place')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="source" class="col-form-label">Sumber</label>
                                    <input type="text" name="source" id="source" class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}">
                                    <div class="form-text text-muted">Format penulisan: Nama majalah/koran - tgl/bln/tahun terbit - hlmn & kolom artikel. Contoh: MAJALAH HUKUM NASIONAL (NO.2), 2019, 29-56.</div>
                                    @error('source')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="field_id" class="col-form-label">Bidang Hukum</label>
                                    <div id="field-options" class="@error('field_id') is-invalid @enderror">
                                        <select name="field_id" id="field_id" class="select-search">
                                            <option value="">Pilih Bidang Hukum</option>
                                            @foreach ($fields as $key => $value)
                                                <option value="{{ $key }}" @selected(old('field_id') == $key)>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-text text-muted">Contoh: Hukum Adat.
                                        @cannot('isAuthor')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#create-field-modal">+ Tambah Bidang Hukum</a>
                                        @endcannot
                                    </div>
                                    @error('field_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="language" class="col-form-label">Bahasa</label>
                                    <input type="text" name="language" id="language" class="form-control @error('language') is-invalid @enderror" value="{{ old('language') }}">
                                    <div class="form-text text-muted">Bahasa yang digunakan oleh artikel. Contoh: Indonesia.</div>
                                    @error('language')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="col-form-label">Lokasi</label>
                                    <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                                    <div class="form-text text-muted">Tempat fisik artikel disimpan. Contoh: Biro Hukum Provinsi Bali.</div>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="col-form-label">T.E.U. Orang/Badan</label>
                                    <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
                                    <div class="form-text text-muted">Format penulisan: Nama pengarang (tanpa gelar dan dibalik). Contoh: THAMRIN, HUSNI.</div>
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="col-form-label">Subjek</label>
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}">
                                    <div class="form-text text-muted">Format penulisan: Topik/kata kunci dari isi artikel (ditulis dengan huruf Kapital). Contoh: HUKUM ADAT.</div>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="col-form-label">Catatan</label>
                                    <textarea name="note" id="note" rows="4" spellcheck="false" class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                                    @error('note')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <!-- /left content -->

                <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none order-1 order-lg-2 ms-lg-3 mb-3">

                    <div class="sidebar-content">

                        <div class="card">
                            <div class="sidebar-section-header border-bottom">
                                <span class="fw-semibold"><i class="ph-globe-hemisphere-east me-2"></i>Publikasi</span>
                            </div>

                            <table class="table table-borderless my-2 table-xs">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap"><i class="ph-tag me-2"></i>Status:</td>
                                        <td class="text-end"><span class="badge bg-warning bg-opacity-20 text-warning">Draf</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><i class="ph-user me-2"></i>Operator:</td>
                                        <td class="text-end">{{ Auth::guard('admin')->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><i class="ph-calendar-blank me-2"></i>Terbit:</td>
                                        <td class="text-end">
                                            <input type="text" class="form-control datetimerange-single text-end @error('published_at') is-invalid @enderror" name="published_at" value="{{ old('published_at', empty($law) ? now()->translatedFormat('d-m-Y H:i') : $law->published_at) }}">
                                            @error('published_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <button type="submit" name="draft" class="btn btn-link px-0">Simpan ke Draf</button>
                                <button type="submit" name="publish" class="btn btn-indigo">Terbit</button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="sidebar-section-header border-bottom">
                                <span class="fw-semibold"><i class="ph-image-square me-2"></i>Sampul</span>
                            </div>

                            <div class="card-img-actions mx-1 mt-1">
                                <img id="cover-image" class="card-img img-fluid" src="{{ asset('assets/admin/images/placeholders/placeholder.jpg') }}" alt="Placeholder">
                            </div>

                            <div class="card-body">
                                <input id="cover-input" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                                <div class="form-text text-muted">Format: gif, png, jpg, jpeg, bmp, svg, webp. Ukuran maks: 2Mb.</div>
                                @error('cover')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card">
                            <div class="sidebar-section-header border-bottom">
                                <span class="fw-semibold"><i class="ph-file-text me-2"></i>Dokumen</span>
                            </div>

                            <div class="card-body">
                                <label for="attachment" class="col-form-label">Lampiran</label>
                                <input type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                                <div class="form-text text-muted">Format: pdf. Ukuran maks: 2Mb.</div>
                                @error('attachment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- /sidebar content -->

                </div>
                <!-- /sidebar -->

            </div>

        </form>

    </div>
    <!-- /content area -->

@endsection

@section('modal')
    @include('admin.legislation.field.create')
@endsection

@section('script')
    @include('admin.legislation.script')
@endsection
