<x-template.layout>
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

                            <form class="row g-3" method="POST" action="{{ route('contactus.updatetitle') }}">
                                @csrf
                                @method('PUT')

                                <!-- Navigation Tabs -->
                                <div class="col-12">
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
                                </div>

                                <!-- Tab Content -->
                                <div class="col-12">
                                    <div class="tab-content">
                                        <!-- Indonesian Tab -->
                                        <div class="tab-pane fade show active" id="indonesian" role="tabpanel">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="texttitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="texttitle"
                                                        value="{{ old('texttitle', $contacttitle->texttitle) }}">

                                                    @error('texttitle')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="textsubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="textsubtitle"
                                                        value="{{ old('textsubtitle', $contacttitle->textsubtitle) }}">

                                                    @error('textsubtitle')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- <div class="col-md-12">
                                                    <label for="textdeskripsi" class="form-label">Description</label>
                                                    <textarea class="form-control" name="textdeskripsi" rows="4">{{ old('textdeskripsi', $contacttitle->textdeskripsi) }}</textarea>
                                                    @error('textdeskripsi')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>

                                        <!-- English Tab -->
                                        <div class="tab-pane fade" id="english" role="tabpanel">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="texttitle_eng" class="form-label">Title
                                                        (English)</label>
                                                    <input type="text" class="form-control" name="texttitle_eng"
                                                        value="{{ old('texttitle_eng', $contacttitle->texttitle_eng) }}">

                                                    @error('texttitle_eng')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="textsubtitle_eng" class="form-label">Subtitle
                                                        (English)</label>
                                                    <input type="text" class="form-control" name="textsubtitle_eng"
                                                        value="{{ old('textsubtitle_eng', $contacttitle->textsubtitle_eng) }}">

                                                    @error('textsubtitle_eng')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- <div class="col-md-12">
                                                    <label for="textdeskripsi_eng" class="form-label">Description
                                                        (English)</label>
                                                    <textarea class="form-control" name="textdeskripsi_eng" rows="4">{{ old('textdeskripsi_eng', $contacttitle->textdeskripsi_eng) }}</textarea>
                                                    @error('textdeskripsi_eng')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</x-template.layout>
