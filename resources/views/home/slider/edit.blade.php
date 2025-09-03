<x-template.layout>
    <style>
        /* Custom Tab Styling for Corporate Color */
        .nav-tabs .nav-link.active {
            background-color: #31666f !important;
            border-color: #31666f #31666f #fff !important;
            color: #fff !important;
        }

        .nav-tabs .nav-link:hover {
            border-color: #31666f #31666f #dee2e6 !important;
            color: #31666f !important;
        }

        .nav-tabs .nav-link {
            color: #495057;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
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

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong> Error! </strong> {{ session('error') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('home-slider.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Navigation Tabs -->
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
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#video" role="tab"
                                            aria-selected="false">
                                            <i class="ri-video-line me-1"></i>Video
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Indonesian Tab -->
                                    <div class="tab-pane active" id="indonesian" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="primary_text" class="form-label">Primary Text</label>
                                                <textarea class="form-control" id="primary_text" name="primary_text" rows="3">{{ old('primary_text', $slider->primary_text) }}</textarea>
                                                @error('primary_text')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $slider->description) }}</textarea>
                                                @error('description')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Tab -->
                                    <div class="tab-pane" id="english" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="primary_text_eng" class="form-label">Primary Text</label>
                                                <textarea class="form-control" id="primary_text_eng" name="primary_text_eng" rows="3">{{ old('primary_text_eng', $slider->primary_text_eng) }}</textarea>
                                                @error('primary_text_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description_eng" class="form-label">Description</label>
                                                <textarea class="form-control" id="description_eng" name="description_eng" rows="4">{{ old('description_eng', $slider->description_eng) }}</textarea>
                                                @error('description_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Video Tab -->
                                    <div class="tab-pane" id="video" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="file_video" class="form-label">Video File</label>
                                                <input type="file" class="form-control" id="file_video"
                                                    name="file_video" accept="video/*">
                                                @if ($slider->file_video)
                                                    <small class="form-text text-muted">Current video:
                                                        {{ $slider->file_video }}</small>
                                                @endif
                                                @error('file_video')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <small class="form-text"
                                                    style="color: rgb(22, 150, 54); font-size: 13px;">
                                                    Video formats: MP4, AVI, MOV, WMV, FLV, Max size: 80 MB
                                                </small>
                                            </div>

                                            @if ($slider->url_video)
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title mb-0">Current Video Preview</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <video controls
                                                                style="max-width: 100%; height: auto; max-height: 300px;">
                                                                <source src="{{ $slider->url_video }}"
                                                                    type="video/mp4">
                                                                <source src="{{ $slider->url_video }}"
                                                                    type="video/webm">
                                                                <source src="{{ $slider->url_video }}"
                                                                    type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <div class="mt-2">
                                                                <a href="{{ $slider->url_video }}" target="_blank"
                                                                    class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-external-link-alt"></i> Open in
                                                                    New Tab
                                                                </a>
                                                                <small class="form-text text-muted d-block mt-1">
                                                                    Video URL: {{ $slider->url_video }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end mt-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line me-1"></i>Update Slider
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</x-template.layout>
