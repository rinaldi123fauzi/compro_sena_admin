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
                            <div class="alert alert-success" role="alert" style="margin-bottom:15px;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('home.updatecapabilitiestitle') }}"
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
                                                <label for="texttitle" class="form-label">Title</label>
                                                <textarea class="form-control" id="description" name="texttitle">{{ old('texttitle', $titles->texttitle) }}</textarea>
                                                @error('texttitle')
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
                                                <label for="texttitle_eng" class="form-label">Title</label>
                                                <textarea class="form-control" id="description" name="texttitle_eng">{{ old('texttitle_eng', $titles->texttitle_eng) }}</textarea>
                                                @error('texttitle_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden Fields -->
                                <input type="hidden" name="textsubtitle" value="">
                                <input type="hidden" name="textsubtitle_eng" value="">

                                <!-- Submit Button -->
                                <div class="text-end mt-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line me-1"></i>Update Capability Title
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
