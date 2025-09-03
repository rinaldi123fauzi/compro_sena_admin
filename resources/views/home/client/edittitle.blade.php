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
                            <form class="row g-3" method="POST" action="{{ url('') }}/home/updateclienttitle"
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

                                <!-- Language Tab Navigation -->
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
                                    <div class="tab-pane active show" id="indonesian" role="tabpanel">
                                        <div class="col-md-12 mb-3">
                                            <label for="texttitle" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="texttitle" name="texttitle"
                                                value="{{ old('texttitle', $titles->texttitle ?? '') }}">
                                            @error('texttitle')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="textsubtitle" class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" id="textsubtitle"
                                                name="textsubtitle"
                                                value="{{ old('textsubtitle', $titles->textsubtitle ?? '') }}">
                                            @error('textsubtitle')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-md-12 mb-3">
                                            <label for="textdeskripsi" class="form-label">Description</label>
                                            <textarea class="form-control" id="textdeskripsi" name="textdeskripsi" rows="4">{{ old('textdeskripsi', $titles->textdeskripsi ?? '') }}</textarea>
                                            @error('textdeskripsi')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                    </div>

                                    <!-- English Tab -->
                                    <div class="tab-pane" id="english" role="tabpanel">
                                        <div class="col-md-12 mb-3">
                                            <label for="texttitle_eng" class="form-label">Title (English)</label>
                                            <input type="text" class="form-control" id="texttitle_eng"
                                                name="texttitle_eng"
                                                value="{{ old('texttitle_eng', $titles->texttitle_eng ?? '') }}">
                                            @error('texttitle_eng')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="textsubtitle_eng" class="form-label">Subtitle (English)</label>
                                            <input type="text" class="form-control" id="textsubtitle_eng"
                                                name="textsubtitle_eng"
                                                value="{{ old('textsubtitle_eng', $titles->textsubtitle_eng ?? '') }}">
                                            @error('textsubtitle_eng')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-md-12 mb-3">
                                            <label for="textdeskripsi_eng" class="form-label">Description
                                                (English)</label>
                                            <textarea class="form-control" id="textdeskripsi_eng" name="textdeskripsi_eng" rows="4">{{ old('textdeskripsi_eng', $titles->textdeskripsi_eng ?? '') }}</textarea>
                                            @error('textdeskripsi_eng')
                                                <div class="error-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ url('home/client_list') }}" class="btn btn-secondary">Back to Client
                                        List</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.layout>
