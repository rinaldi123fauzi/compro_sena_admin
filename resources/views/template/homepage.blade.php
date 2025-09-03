<x-template.layout>
    <style>
        .form-control {
            margin-bottom: 10px;
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
                        {{-- <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Browser defaults</h4>
                        </div>  --}}
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-colored-home"
                                        role="tab">
                                        Slider
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-colored-about" role="tab">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-colored-capabilities"
                                        role="tab">
                                        Our Capabilities
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-colored-messages"
                                        role="tab">
                                        Latest news
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-colored-messages"
                                        role="tab">
                                        Clients
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="nav-colored-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <table id="example"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-ordering="false">Highlight</th>
                                                        <th data-ordering="false">Sub</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td>From Strategy to Implementation our business</td>
                                                        <td>Best Solution for Your Business</td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit</a></li>
                                                                    <li>
                                                                        <a class="dropdown-item remove-item-btn">
                                                                            <i
                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                            Delete
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <form class="row g-3" method="POST" action="{{ route('regional.store') }}">
                                                @csrf
                                                <div class="col-md-12">
                                                    <label for="validationDefault01"
                                                        class="form-label">Highlight</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    <label for="validationDefault01" class="form-label">Sub</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    <label for="validationDefault01" class="form-label">Button
                                                        Text</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    <label for="validationDefault01" class="form-label">Button
                                                        Url</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    <label for="validationDefault01" class="form-label">Image
                                                        Slider</label>
                                                    <input type="file" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}"
                                                        required>

                                                    @error('namaregional')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                                <div class="col-12" style="padding:20px; text-align:right;">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-colored-about" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <form class="row g-3" method="POST"
                                                action="{{ route('regional.store') }}">
                                                @csrf
                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}"
                                                        required>

                                                    <label for="validationDefault01"
                                                        class="form-label">Description</label>
                                                    <textarea class="ckeditor-classic"></textarea>

                                                    <label for="validationDefault01" class="form-label"
                                                        style="margin-top:10px;">Youtube
                                                        Url</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}"
                                                        required style="margin-bottom:10px;">

                                                    <label for="validationDefault01" class="form-label">Image
                                                        Thumbnail</label>
                                                    <input type="file" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}"
                                                        required style="margin-bottom:10px;">


                                                    <div class="row" style="margin-top:30px;">
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Counter Number</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Counter Number</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Counter Number</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Counter Number</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12" style="padding:20px; text-align:right;">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="nav-colored-capabilities" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <form class="row g-3" method="POST"
                                                action="{{ route('regional.store') }}">
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="row" style="margin-top:30px;">
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01" class="form-label">Image
                                                                Background</label>
                                                            <input type="file" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01" class="form-label">Image
                                                                Background</label>
                                                            <input type="file" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01" class="form-label">Image
                                                                Background</label>
                                                            <input type="file" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="validationDefault01"
                                                                class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01"
                                                                class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">

                                                            <label for="validationDefault01" class="form-label">Image
                                                                Background</label>
                                                            <input type="file" class="form-control"
                                                                id="namaregional" name="namaregional"
                                                                value="{{ old('namaregional') }}" required
                                                                style="margin-bottom:10px;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12" style="padding:20px; text-align:right;">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>




                </div> <!-- end col -->


            </div> <!-- end col -->
        </div>


    </div>
    </div>
</x-template.layout>
