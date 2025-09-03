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
                            <form method="POST" action="{{ route('about.about_update') }}"
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
                                                <label for="sub_headline" class="form-label">Headline</label>
                                                <input type="text" class="form-control" id="sub_headline"
                                                    name="sub_headline"
                                                    value="{{ old('sub_headline', $about->sub_headline) }}">
                                                @error('sub_headline')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="image" class="form-label">Image Kiri</label>
                                                <input type="file" class="form-control" id="image"
                                                    name="image">
                                                @error('image')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <small class="form-text"
                                                    style="color: rgb(22, 150, 54); font-size: 13px;">
                                                    Image Dimension: 2070 x 1380 pixels. Max size: 5 MB
                                                </small>

                                                @if ($about->image_url)
                                                <div class="mt-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title mb-0">Current Image</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <img src="{{ $about->image_url }}" alt="Current Image"
                                                                style="max-width: 100%; height: auto; max-height: 200px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description">{{ $about->description }}</textarea>
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
                                                <label for="sub_headline_eng" class="form-label">Headline</label>
                                                <input type="text" class="form-control" id="sub_headline_eng"
                                                    name="sub_headline_eng"
                                                    value="{{ old('sub_headline_eng', $about->sub_headline_eng) }}">
                                                @error('sub_headline_eng')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description_eng" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description_eng">{{ $about->description_eng }}</textarea>
                                                @error('description_eng')
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
                                        <i class="ri-save-line me-1"></i>Update About
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div>
    </div>

    <!-- TinyMCE Initialization for About Form -->

</x-template.layout>