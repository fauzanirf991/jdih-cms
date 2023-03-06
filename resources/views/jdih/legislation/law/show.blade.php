@extends('jdih.layouts.app')

@section('title', $legislation->shortTitle . ' | ' . strip_tags($appName))
@section('content')

<!-- Page title -->
<section class="bg-dark bg-opacity-3 mb-4">
    <div class="page-content container py-3 px-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="page-header page-header-content d-lg-flex">
                    <div class="breadcrumb">
                        <a href="{{ route('homepage') }}" class="breadcrumb-item text-body"><i class="ph-house"></i></a>
                        <a href="{{ route('legislation.index') }}" class="breadcrumb-item text-body">Produk Hukum</a>
                        <a href="{{ route('legislation.law.index') }}" class="breadcrumb-item text-body">Peraturan Perundang-undangan</a>
                        <a href="{{ route('legislation.law.category', ['category' => $legislation->category->slug]) }}" class="breadcrumb-item text-body">{{ $legislation->category->name }}</a>
                        <span class="breadcrumb-item active text-truncate d-inline-block w-25" title="{{ $legislation->shortTitle }}">{{ $legislation->shortTitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- Page container -->
<div class="page-content container">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <main class="content">

            <div class="row pb-5">
                <div class="col-xl-6 m-auto">
                    @isset($legislation->masterDocumentSource)
                        <figure id="adobe-dc-view" data-file="{{ $legislation->masterDocumentSource }}" data-name="{{ $legislation->masterDocument()->media->name }}" class="rounded shadow-lg" style="height: 720px;">
                        </figure>
                        <script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
                        <script type="text/javascript">
                            document.addEventListener("adobe_dc_view_sdk.ready", function(){
                                var adobeDCView = new AdobeDC.View({clientId: "{{ $adobeKey }}", divId: "adobe-dc-view"});
                                const article = document.querySelector("#adobe-dc-view");
                                adobeDCView.previewFile({
                                    content:{ location:
                                    { url: article.dataset.file }},
                                    metaData:{fileName: article.dataset.name}
                                },
                                {
                                    embedMode: "SIZED_CONTAINER",
                                    showDownloadPDF: false,
                                    showPrintPDF: false
                                });
                            });
                        </script>
                    @else
                        <figure class="rounded shadow-lg">
                            <img src="{{ asset('assets/jdih/images/placeholders/cover.jpg') }}" class="img-fluid rounded">
                        </figure>
                    @endisset

                    <div class="d-flex mt-4">
                        <div class="flex-grow-1">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-danger btn-lg lift w-100 fw-bold p-3 @empty($legislation->masterDocumentSource) disabled @endempty">Dokumen<i class="ph-download ms-2"></i></button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-danger btn-lg lift w-100 fw-bold p-3 @empty($legislation->abstractDocumentSource) disabled @endempty">Abstrak<i class="ph-download ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <button class="btn w-100 btn-pink btn-icon btn-lg lift p-3"><i class="ph-heart"></i></button>
                        </div>
                    </div>

                    <div class="row gx-4 mt-4">
                        <div class="col-xl-6 p-4 text-center">
                            {!! QrCode::size(230)->margin(2)->generate(url()->current()); !!}
                        </div>
                        <div class="col-xl-6">
                            <h6 class="d-block fw-bold">Bagikan:</h6>
                            <ul class="list-inline mb-0">
                                @foreach ($shares as $share)
                                    <li class="list-inline-item me-1 mb-2">
                                        <a href="{{ $share['url'] }}" target="_blank" class="btn btn-{{ $share['color'] }} rounded-pill p-2 lift" title="Bagikan ke {{ $share['title'] }}" data-bs-popup="tooltip">
                                            <i class="{{ $share['icon'] }} m-1"></i>
                                        </a>
                                    </li>
                                @endforeach
                                <li class="list-inline-item">
                                    <button type="button" data-url="{{ url()->current() }}" class="copy-link btn btn-light rounded-pill p-2 lift" title="Salin URL" data-bs-popup="tooltip">
                                        <i class="ph-link m-1"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-xl-5 offset-xl-1">
                    <h2 class="d-block display-6 fw-bold mb-2">{{ $legislation->shortTitle }}</h2>
                    <ul class="post-meta list-inline list-inline-bullet text-muted mb-4 fs-lg">
                        <li class="list-inline-item"><i class="ph-calendar-blank me-2"></i>{{ $legislation->dateFormatted($legislation->published_at) }}</li>
                        <li class="list-inline-item"><i class="ph-user me-2"></i>{{ $legislation->user->name }}</li>
                        <li class="list-inline-item"><i class="ph-eye me-2"></i>{{ $legislation->view }}</li>
                        <li class="list-inline-item"><i class="ph-download me-2"></i>{{ $legislation->documents->sum('download') }}</li>
                    </ul>

                    <!-- Meta data -->
                    <div class="fs-lg">
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Jenis Dokumen</h4>
                                    <p class="mb-0"><a href="{{ route('legislation.law.category', ['category' => $legislation->category->slug]) }}" class="text-body"> {{ $legislation->category->name }}</a></p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Nomor</h4>
                                    <p class="mb-0">{{ $legislation->code_number }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="flex-fill">
                                <h4 class="mb-1 fw-bold">Judul</h4>
                                <p class="mb-0">{{ $legislation->title }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Tgl. Penetapan</h4>
                                    <p class="mb-0">{{ $legislation->dateFormatted($legislation->approved) }}</p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Tgl. Pengundangan</h4>
                                    <p class="mb-0">{{ $legislation->dateFormatted($legislation->published) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Singkatan Jenis</h4>
                                    <p class="mb-0">
                                        <a href="{{ route('legislation.law.category', ['category' => $legislation->category->slug]) }}" class="text-body">{{ $legislation->category->abbrev }}</a>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">T.E.U. Badan</h4>
                                    <p class="mb-0">{{ $legislation->author }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Sumber</h4>
                                    <p class="mb-0">{{ $legislation->source }}</p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Tempat Terbit</h4>
                                    <p class="mb-0">{{ $legislation->place }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Subjek</h4>
                                    <p class="mb-0">{{ $legislation->subject }}</p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Status</h4>
                                    <p class="mb-0">
                                        <a href="{{ route('legislation.law.index', ['status' => $legislation->status]) }}" class="text-body">{!! $legislation->statusBadge !!}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Bidang Hukum</h4>
                                    <p class="mb-0">
                                        <a href="{{ route('legislation.law.index', ['field' => $legislation->field->slug]) }}" class="text-body">{{ $legislation->field->name }}</a>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Bahasa</h4>
                                    <p class="mb-0">{{ $legislation->language }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Pemrakarsa</h4>
                                    <p class="mb-0">
                                        <a href="{{ route('legislation.law.index', ['institute' => $legislation->institute->slug]) }}" class="text-body">{{ $legislation->institute->name }}</a>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Urusan Pemerintahan</h4>
                                    @if($legislation->matters->count() > 0)
                                        <ul class="list-inline mb-0">
                                            @foreach ($legislation->matters as $matter)
                                                <li class="list-inline-item me-1 mb-1"><a href="{{ route('legislation.law.index', ['matter' => $matter->slug]) }}" class="badge bg-purple bg-opacity-20 text-purple">{{ $matter->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
                                    <i class="ph-check"></i>
                                </div>
                            </div>
                            <div class="row flex-fill">
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Lokasi</h4>
                                    <p class="mb-0">{{ $legislation->location }}</p>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-1 fw-bold">Penandatangan</h4>
                                    <p class="mb-0">{{ $legislation->signer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /meta data -->

                    <!-- Legislation relationships -->
                    <div class="card shadow-lg mt-5">
                        <div class="card-header p-0 border-bottom-0">
                            <div class="navbar navbar-expand-lg rounded-top">
                                <div class="container-fluid">
                                    <ul class="nav navbar-nav flex-row flex-fill" role="tablist">
                                        <li class="nav-item me-1" role="presentation">
                                            <a href="#status" data-bs-toggle="tab" role="tab" class="navbar-nav-link rounded active @if ($statusRelationships->count() === 0) disabled @endif">
                                                <div class="d-flex align-items-center">
                                                    <span class="d-none d-lg-inline-block">Keterangan Status</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a href="#legislation" data-bs-toggle="tab" role="tab" class="navbar-nav-link @if ($lawRelationships->count() === 0) disabled @endif rounded">
                                                <div class="d-flex align-items-center">
                                                    <span class="d-none d-lg-inline-block">Peraturan Terkait</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a href="#document" data-bs-toggle="tab" role="tab" class="navbar-nav-link rounded @if ($documentRelationships->count() === 0) disabled @endif">
                                                <div class="d-flex align-items-center">
                                                    <span class="d-none d-lg-inline-block">Dokumen Terkait</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /legislation relationships -->

                        <div class="card-body tab-content pb-0">
                            <div class="tab-pane fade active show" id="status" role="tabpanel">
                                <ol class="list mb-0">
                                    @forelse ($statusRelationships as $relation)
                                        <li class="mb-3"><span class="fw-bold">{{ Str::ucfirst($relation->statusPhrase) }}</span> <a href="{{ route('admin.legislation.law.show', $relation->related_to) }}" target="_blank" class="text-body">{{ $relation->relatedTo->title }}</a> {{ $relation->note }}</li>
                                    @empty
                                        <span class="d-block mb-3 text-muted">Tidak ada data</span>
                                    @endforelse
                                </ol>
                            </div>

                            <div class="tab-pane fade" id="legislation" role="tabpanel">
                                <ol class="list mb-0">
                                    @forelse ($lawRelationships as $relation)
                                        <li class="mb-3"><span class="fw-bold">{{ Str::ucfirst($relation->statusPhrase) }}</span> <a href="{{ route('admin.legislation.law.show', $relation->related_to) }}" target="_blank" class="text-body">{{ $relation->relatedTo->title }}</a> {{ $relation-> note }}</li>
                                    @empty
                                        <span class="d-block mb-3 text-muted">Tidak ada data</span>
                                    @endforelse
                                </ol>
                            </div>

                            <div class="tab-pane fade" id="document" role="tabpanel">
                                <ol class="list mb-0">
                                    @forelse ($documentRelationships as $relation)
                                        <li class="mb-3"><span class="fw-bold">{{ Str::ucfirst($relation->statusPhrase) }}</span> <a href="{{ route('admin.legislation.law.show', $relation->related_to) }}" target="_blank" class="text-body">{{ $relation->relatedTo->title }}</a> {{ $relation-> note }}</li>
                                    @empty
                                        <span class="d-block mb-3 text-muted">Tidak ada data</span>
                                    @endforelse
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($otherLegislations) AND $otherLegislations->count() > 0)
                    <!-- Latest laws -->
                    <section class="latest-legislation pt-5">
                        <div class="d-flex pb-4">
                            <h2 class="fw-bold me-xl-auto section-title mb-0">Peraturan Lainnya</h2>
                            <a href="{{ route('legislation.law.category', ['category' => $legislation->category->slug]) }}" class="btn btn-dark lift px-3 fw-semibold">Lihat semua Peraturan<i class="ph-arrow-right ms-2"></i></a>
                        </div>
                        <div class="row gx-5">
                            @foreach ($otherLegislations as $law)
                                <div class="col-xl-4 my-3">
                                    <div class="card lift shadow-lg h-100">
                                        <a href="{{ route('legislation.law.show', ['category' => $law->category->slug, 'legislation' => $law->slug])}}" class="text-body link-danger">
                                            <div class="card-header border-0 pb-0">
                                                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill mb-2">{{ $law->category->name }}</span>
                                                <h4 class="fw-bold mb-0">{{ $law->shortTitle }}</h4>
                                            </div>
                                            <div class="card-body fs-lg pb-0">
                                                <p class="mb-0 text-body">{{ $law->title }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- /latest laws -->
                @endif

            </div>

        </main>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page container -->

@endsection

@section('script')
    @include('jdih.legislation.script')
@endsection
