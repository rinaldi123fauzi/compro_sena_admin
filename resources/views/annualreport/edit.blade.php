<x-template.layout>
    <div class="page-content">

        <form method="POST" action="{{ url('') }}/annualreport/update/{{ $annualreport->id }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                    <div class="col-lg-9">
                        <div class="card">
                            {{-- <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Browser defaults</h4>
                        </div>  --}}
                            @if (session('message'))
                                <div class="alert alert-success" role="alert" style="margin-bottom:20px;">
                                    <strong> Sukses! </strong> {{ session('message') }}.
                                </div>
                            @endif

                            <div class="card-body">


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $annualreport->title) }}" required>

                                    @error('title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <textarea class="ckeditor-classic" name="description"> {{ $annualreport->description }}</textarea>

                                    @error('content')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun"
                                        value="{{ old('tahun', $annualreport->tahun) }}" required>

                                    @error('tahun')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div> <!-- end col -->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Featured Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                @if ($annualreport->image_url)
                                    <img src="{{ $annualreport->image_url }}" alt="image"
                                        style="width:100%; margin-top:20px;">
                                @elseif ($annualreport->image)
                                    <img src="{{ asset('upload/image/' . $annualreport->image) }}" alt="image"
                                        style="width:100%; margin-top:20px;">
                                @endif
                                <label for="validationDefault01" class="form-label"
                                    style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 500 x 708
                                    pixels, Max size : 5 MB</label>

                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">File</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>

                                @if ($annualreport->file_url)
                                    <a href="{{ $annualreport->file_url }}" class="btn btn-success"
                                        style="margin-top:20px;" download>
                                        Download File
                                    </a>
                                @elseif ($annualreport->file)
                                    <a href="{{ asset('upload/file/' . $annualreport->file) }}" class="btn btn-success"
                                        style="margin-top:20px;" download>
                                        Download File
                                    </a>
                                @endif
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Publish</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-card">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="fw-medium">Status</td>
                                                <td>
                                                    <select class="form-select" name="is_active">
                                                        <option value=""> -- Silahkan Pilih -- </option>
                                                        <option value="1"
                                                            {{ $annualreport->is_active == 1 ? 'selected' : '' }}>
                                                            Active</option>
                                                        <option value="0"
                                                            {{ $annualreport->is_active == 0 ? 'selected' : '' }}>Tidak
                                                            Aktif</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                            </div>
                            <div class="col-12" style="padding:20px; text-align:right;">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </form>


    </div>
    </div>
</x-template.layout>
