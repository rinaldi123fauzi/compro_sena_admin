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

                            <form class="row g-3" method="POST"
                                action="{{ url('') }}/project/update/{{ $project->id }}"
                                enctype="multipart/form-data">
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
                                                    <label for="validationDefault01" class="form-label">Nama
                                                        Project</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $project->name) }}">

                                                    @error('name')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationDefault01"
                                                        class="form-label">Description</label>
                                                    <textarea id="description" class="form-control" name="description">{{ old('description', $project->description) }}</textarea>
                                                    @error('description')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- English Tab -->
                                        <div class="tab-pane fade" id="english" role="tabpanel">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Project Name
                                                        (English)</label>
                                                    <input type="text" class="form-control" name="name_eng"
                                                        value="{{ old('name_eng', $project->name_eng) }}">

                                                    @error('name_eng')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Description
                                                        (English)</label>
                                                    <textarea id="description_eng" name="description_eng">{{ old('description_eng', $project->description_eng) }}</textarea>
                                                    @error('description_eng')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Common Fields -->
                                <!-- Common Fields -->
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Client</label>
                                    <input type="text" class="form-control" name="client"
                                        value="{{ old('client', $project->client) }}">

                                    @error('client')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location"
                                        value="{{ old('location', $project->location) }}">

                                    @error('location')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" name="year"
                                        value="{{ old('year', $project->year) }}">

                                    @error('year')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image (Ukuran foto : 1920 x
                                        1282)</label>
                                    <input type="file" class="form-control" name="image"
                                        value="{{ old('image') }}">
                                    @if (!empty($project->image_url))
                                        <div style="margin-top:15px;">
                                            <img src="{{ $project->image_url }}" alt="Project Image" width="200px"
                                                class="img-thumbnail">
                                            <p class="text-muted mt-2">Current Image</p>
                                        </div>
                                    @endif
                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Type</label>
                                    <select class="form-select" name="type">
                                        <option value=""> -- Silahkan Pilih -- </option>
                                        <option value="engineering" @if ($project->type == 'engineering') selected @endif>
                                            Engineering</option>
                                        <option value="consultant" @if ($project->type == 'consultant') selected @endif>
                                            Consultant</option>
                                        <option value="inspection" @if ($project->type == 'inspection') selected @endif>
                                            Inspection</option>
                                        <option value="survey" @if ($project->type == 'survey') selected @endif>
                                            Survey</option>
                                    </select>
                                    @error('type')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="sector" class="form-label">Sektor</label>
                                    <select class="form-select" name="sector" id="sector">
                                        <option value=""> -- Silahkan Pilih -- </option>
                                        <option value="downstream"
                                            {{ old('sector', $project->sektor) == 'downstream' ? 'selected' : '' }}>
                                            Downstream</option>
                                        <option value="refinery & petrochemical"
                                            {{ old('sector', $project->sektor) == 'refinery & petrochemical' ? 'selected' : '' }}>
                                            Refinery & Petrochemical</option>
                                        <option value="upstream"
                                            {{ old('sector', $project->sektor) == 'upstream' ? 'selected' : '' }}>
                                            Upstream</option>
                                    </select>
                                    @error('sector')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
