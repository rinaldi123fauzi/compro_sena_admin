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
                                action="{{ url('') }}/about/komitmendankebijakan_update/{{ $komitmendankebijakandetail->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $komitmendankebijakandetail->id }}">

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

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image </label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image') }}">

                                    @if (!empty($komitmendankebijakandetail->image_url))
                                        <img src="{{ $komitmendankebijakandetail->image_url }}" alt="image"
                                            height="200px" style="margin-top:15px;">
                                    @elseif (!empty($komitmendankebijakandetail->image))
                                        <img src="{{ asset('upload/image/' . $komitmendankebijakandetail->image) }}"
                                            alt="image" height="200px" style="margin-top:15px;">
                                    @endif

                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1080 x 714
                                        pixels, Max size : 5 MB </label>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" id="kategori">
                                        <option value=""> -- Silahkan Pilih -- </option>
                                        <option value="komitmen" @if ($komitmendankebijakandetail->kategori == 'komitmen') selected @endif>
                                            Komitmen
                                        </option>
                                        <option value="kebijakan" @if ($komitmendankebijakandetail->kategori == 'kebijakan') selected @endif>
                                            Kebijakan</option>
                                    </select>

                                    @error('kategori')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Language Tabs -->
                                <div class="col-md-12">
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
                                        <div class="tab-pane fade show active" id="indonesian" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title
                                                            (Indonesian)</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title"
                                                            value="{{ old('title', $komitmendankebijakandetail->title) }}"
                                                            placeholder="Enter Indonesian title">
                                                        @error('title')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- English Tab -->
                                        <div class="tab-pane fade" id="english" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="title_eng" class="form-label">Title
                                                            (English)</label>
                                                        <input type="text" class="form-control" id="title_eng"
                                                            name="title_eng"
                                                            value="{{ old('title_eng', $komitmendankebijakandetail->title_eng) }}"
                                                            placeholder="Enter English title">
                                                        @error('title_eng')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
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
                            <h4 class="card-title mb-0 flex-grow-1">Data Komitmen dan Kebijakan</h4>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Image </th>
                                        <th data-ordering="false">Kategori </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komitmendankebijakan as $val)
                                        <tr>

                                            <td>
                                                @if (!empty($val->image_url))
                                                    <img src="{{ $val->image_url }}" alt="{{ $val->title }}"
                                                        class="avatar-md rounded">
                                                @elseif (!empty($val->image))
                                                    <img src="{{ asset('upload/image/' . $val->image) }}"
                                                        alt="{{ $val->title }}" class="avatar-md rounded">
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($val->kategori))
                                                    {{ $val->kategori }}
                                                @endif
                                            </td>
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
                                                                href="{{ url('') }}/about/komitmendankebijakan_edit/{{ $val->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/about/komitmendankebijakan_destroy/{{ $val->id }}">
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
        <!-- container-fluid -->
    </div>
</x-template.layout>
