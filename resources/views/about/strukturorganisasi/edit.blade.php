<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('about.strukturorganisasi_update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <style>
                                    /* Custom Tab Styling for Corporate Color */
                                    .nav-tabs .nav-link.active {
                                        background-color: #31666f !important;
                                        border-color: #31666f #31666f #fff !important;
                                        color: #fff !important;
                                    }

                                    .nav-tabs .nav-link:hover {
                                        border-color: #31666f #31666f #dee2e6 !important;
                                    }

                                    .nav-tabs .nav-link {
                                        color: #495057;
                                        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
                                    }
                                </style>

                                <!-- Language Tabs -->
                                <ul class="nav nav-tabs nav-justified nav-corporate mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#indonesian"
                                            role="tab" aria-selected="true">
                                            <i class="ri-flag-line me-1"></i>Indonesian
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#english" role="tab"
                                            aria-selected="false">
                                            <i class="ri-global-line me-1"></i>English
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Indonesian Tab -->
                                    <div class="tab-pane fade show active" id="indonesian" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="title" class="form-label">Title (Indonesian)</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ old('title', $strukturorganisasi->title) }}"
                                                    placeholder="Enter Indonesian title">
                                                @error('title')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description
                                                    (Indonesian)</label>
                                                <textarea class="form-control" id="description" name="description" rows="5"
                                                    placeholder="Enter Indonesian description">{{ old('description', $strukturorganisasi->description) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="image" class="form-label">Image (Indonesian)</label>
                                                <input type="file" class="form-control" id="image"
                                                    name="image">
                                                @error('image')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-success" style="font-size: 13px;">
                                                    Image Dimensions: 1920 x 1080 pixels, Max size: 2 MB
                                                </small>

                                                @if (!empty($strukturorganisasi->image_url))
                                                    <div class="mt-2">
                                                        <img src="{{ $strukturorganisasi->image_url }}"
                                                            alt="Struktur Organisasi" class="img-thumbnail"
                                                            style="height: 200px;">
                                                    </div>
                                                @elseif (!empty($strukturorganisasi->image))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/struktur-organisasi/' . $strukturorganisasi->image) }}"
                                                            alt="Struktur Organisasi" class="img-thumbnail"
                                                            style="height: 200px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Tab -->
                                    <div class="tab-pane fade" id="english" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="title_eng" class="form-label">Title (English)</label>
                                                <input type="text" class="form-control" id="title_eng"
                                                    name="title_eng"
                                                    value="{{ old('title_eng', $strukturorganisasi->title_eng) }}"
                                                    placeholder="Enter English title">
                                                @error('title_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description_eng" class="form-label">Description
                                                    (English)</label>
                                                <textarea class="form-control" id="description_eng" name="description_eng" rows="5"
                                                    placeholder="Enter English description">{{ old('description_eng', $strukturorganisasi->description_eng) }}</textarea>
                                                @error('description_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="image_eng" class="form-label">Image (English)</label>
                                                <input type="file" class="form-control" id="image_eng"
                                                    name="image_eng">
                                                @error('image_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-success" style="font-size: 13px;">
                                                    Image Dimensions: 1920 x 1080 pixels, Max size: 2 MB
                                                </small>

                                                @if (!empty($strukturorganisasi->image_eng_url))
                                                    <div class="mt-2">
                                                        <img src="{{ $strukturorganisasi->image_eng_url }}"
                                                            alt="Organizational Structure" class="img-thumbnail"
                                                            style="height: 200px;">
                                                    </div>
                                                @elseif (!empty($strukturorganisasi->image_eng))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/struktur-organisasi/' . $strukturorganisasi->image_eng) }}"
                                                            alt="Organizational Structure" class="img-thumbnail"
                                                            style="height: 200px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line me-1"></i> Update Struktur Organisasi
                                    </button>
                                    <a href="{{ route('about.strukturorganisasi') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line me-1"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</x-template.layout>
