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
                        {{-- <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Browser defaults</h4>
                        </div>  --}}
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('about.visimisi_update') }}"
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
                                                <label for="headline" class="form-label">Headline</label>
                                                <input type="text" class="form-control" id="headline"
                                                    name="headline" value="{{ old('headline', $visimisi->headline) }}">

                                                @error('headline')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="visi_title" class="form-label">Visi Title</label>
                                                <input type="text" class="form-control" id="visi_title"
                                                    name="visi_title"
                                                    value="{{ old('visi_title', $visimisi->visi_title) }}">
                                                @error('visi_title')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="visi_description" class="form-label">Visi
                                                    Description</label>
                                                <textarea class="form-control" id="visi_description" name="visi_description">{{ $visimisi->visi_description }}</textarea>
                                                @error('visi_description')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="misi_title" class="form-label">Misi Title</label>
                                                <input type="text" class="form-control" id="misi_title"
                                                    name="misi_title"
                                                    value="{{ old('misi_title', $visimisi->misi_title) }}">
                                                @error('misi_title')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="misi_description" class="form-label">Misi
                                                    Description</label>
                                                <textarea class="form-control" id="misi_description" name="misi_description">{{ $visimisi->misi_description }}</textarea>
                                                @error('misi_description')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Content Tab -->
                                    <div class="tab-pane fade" id="english" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="headline_eng" class="form-label">Headline</label>
                                                <input type="text" class="form-control" id="headline_eng"
                                                    name="headline_eng"
                                                    value="{{ old('headline_eng', $visimisi->headline_eng) }}">

                                                @error('headline_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="visi_title_eng" class="form-label">Visi Title</label>
                                                <input type="text" class="form-control" id="visi_title_eng"
                                                    name="visi_title_eng"
                                                    value="{{ old('visi_title_eng', $visimisi->visi_title_eng) }}">
                                                @error('visi_title_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="visi_description_eng" class="form-label">Visi
                                                    Description</label>
                                                <textarea id="editor2" name="visi_description_eng">{{ $visimisi->visi_description_eng }}</textarea>
                                                @error('visi_description_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="misi_title_eng" class="form-label">Misi Title</label>
                                                <input type="text" class="form-control" id="misi_title_eng"
                                                    name="misi_title_eng"
                                                    value="{{ old('misi_title_eng', $visimisi->misi_title_eng) }}">
                                                @error('misi_title_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="misi_description_eng" class="form-label">Misi
                                                    Description</label>
                                                <textarea id="editor1" name="misi_description_eng">{{ $visimisi->misi_description_eng }}</textarea>
                                                @error('misi_description_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
