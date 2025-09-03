<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Capability</a></li>
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
                            <div class="alert alert-success" role="alert" style="margin-bottom:15px;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('capability.updatesoftwaretitle') }}"
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
                                    <!-- Indonesian Content Tab -->
                                    <div class="tab-pane fade show active" id="indonesian" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="texttitle" class="form-label">Title (Indonesian)</label>
                                                <input type="text" class="form-control" id="texttitle"
                                                    name="texttitle" value="{{ old('texttitle', $titles->texttitle) }}"
                                                    placeholder="Enter Indonesian title">
                                                @error('texttitle')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <label for="textsubtitle" class="form-label">Subtitle
                                                    (Indonesian)</label>
                                                <input type="text" class="form-control" id="textsubtitle"
                                                    name="textsubtitle"
                                                    value="{{ old('textsubtitle', $titles->textsubtitle) }}"
                                                    placeholder="Enter Indonesian subtitle">
                                                @error('textsubtitle')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                            <div class="col-md-12">
                                                <label for="textdeskripsi" class="form-label">Description
                                                    (Indonesian)</label>
                                                <textarea class="form-control" id="textdeskripsi" name="textdeskripsi" rows="4"
                                                    placeholder="Enter Indonesian description">{{ old('textdeskripsi', $titles->textdeskripsi) }}</textarea>
                                                @error('textdeskripsi')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Content Tab -->
                                    <div class="tab-pane fade" id="english" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="texttitle_eng" class="form-label">Title (English)</label>
                                                <input type="text" class="form-control" id="texttitle_eng"
                                                    name="texttitle_eng"
                                                    value="{{ old('texttitle_eng', $titles->texttitle_eng) }}"
                                                    placeholder="Enter English title">
                                                @error('texttitle_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <label for="textsubtitle_eng" class="form-label">Subtitle
                                                    (English)</label>
                                                <input type="text" class="form-control" id="textsubtitle_eng"
                                                    name="textsubtitle_eng"
                                                    value="{{ old('textsubtitle_eng', $titles->textsubtitle_eng) }}"
                                                    placeholder="Enter English subtitle">
                                                @error('textsubtitle_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                            <div class="col-md-12">
                                                <label for="textdeskripsi_eng" class="form-label">Description
                                                    (English)</label>
                                                <textarea class="form-control" id="textdeskripsi_eng" name="textdeskripsi_eng" rows="4"
                                                    placeholder="Enter English description">{{ old('textdeskripsi_eng', $titles->textdeskripsi_eng) }}</textarea>
                                                @error('textdeskripsi_eng')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line me-1"></i> Update Software Title
                                    </button>
                                    <a href="{{ route('capability.index') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line me-1"></i> Back to Capabilities
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.layout>
