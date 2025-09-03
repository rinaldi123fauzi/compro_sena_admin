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

                <div class="col-lg-4">
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
                            <form class="row g-3" method="POST"
                                action="{{ url('') }}/about/direksidankomisaris_update/{{ $direksidankomisaris->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $direksidankomisaris->id }}">

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
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" class="form-control" id="image" name="image"
                                                    value="{{ old('image') }}">

                                                @if (!empty($direksidankomisaris->image))
                                                    <div class="card mt-3" style="max-width: 250px;">
                                                        <img src="{{ $direksidankomisaris->image_url }}"
                                                            class="card-img-top" alt="Current Image">
                                                        <div class="card-body p-2">
                                                            <small class="text-muted">Current Image</small>
                                                        </div>
                                                    </div>
                                                @endif

                                                @error('image')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <small class="form-text text-success">Image Dimensions: 600 x 650
                                                    pixels, Max size: 5 MB</small>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $direksidankomisaris->name) }}">

                                                @error('name')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="position" class="form-label">Posisi</label>
                                                <input type="text" class="form-control" id="position"
                                                    name="position"
                                                    value="{{ old('position', $direksidankomisaris->position) }}">

                                                @error('position')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="description" name="description">{{ old('description', $direksidankomisaris->description) }}</textarea>

                                                @error('description')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="type" class="form-label">Type</label>
                                                <select class="form-select" id="type" name="type">
                                                    <option value="direksi"
                                                        @if ($direksidankomisaris->type == 'direksi') selected @endif>
                                                        Direksi</option>
                                                    <option value="komisaris"
                                                        @if ($direksidankomisaris->type == 'komisaris') selected @endif>
                                                        Komisaris</option>
                                                </select>

                                                @error('type')
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
                                                <label for="position_eng" class="form-label">Position</label>
                                                <input type="text" class="form-control" id="position_eng"
                                                    name="position_eng"
                                                    value="{{ old('position_eng', $direksidankomisaris->position_eng) }}">

                                                @error('position_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description_eng" class="form-label">Description</label>
                                                <textarea class="form-control" id="description_eng" name="description_eng">{{ old('description_eng', $direksidankomisaris->description_eng) }}</textarea>

                                                @error('description_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <label for="experience_eng" class="form-label">Experience</label>
                                                <textarea id="editor4" name="experience_eng">{{ old('experience_eng', $direksidankomisaris->experience_eng) }}</textarea>

                                                @error('experience_eng')
                                                    <div class="error-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Data Direksi dan Komisaris</h4>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Nama </th>
                                        <th data-ordering="false">Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direksi as $val)
                                        <tr>

                                            <td>{{ $val->name }}</td>
                                            <td>{{ $val->position }}</td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/about/direksidankomisaris_edit/{{ $val->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/about/direksidankomisaris_destroy/{{ $val->id }}">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- end col -->
            </div>


        </div>
    </div>
</x-template.layout>
