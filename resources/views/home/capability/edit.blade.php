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

                        <div class="card-body">
                            <form method="POST"
                                action="{{ url('') }}/home/capability_update/{{ $capability->id }}"
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
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Indonesian Tab -->
                                    <div class="tab-pane active" id="indonesian" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ old('title', $capability->title) }}">
                                                @error('title')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" class="form-control" id="image"
                                                    name="image">
                                                @error('image')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <small class="form-text"
                                                    style="color: rgb(22, 150, 54); font-size: 13px;">
                                                    Image Dimension: 1226 x 432 pixels. Max size: 5 MB
                                                </small>

                                                @if ($capability->image)
                                                    <div class="mt-2">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h6 class="card-title mb-0">Current Image</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <img src="{{ $capability->image_url }}"
                                                                    alt="Current Image"
                                                                    style="max-width: 100%; height: auto; max-height: 200px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Tab -->
                                    <div class="tab-pane" id="english" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="title_eng" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title_eng"
                                                    name="title_eng"
                                                    value="{{ old('title_eng', $capability->title_eng) }}">
                                                @error('title_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end mt-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line me-1"></i>Update Capability
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
