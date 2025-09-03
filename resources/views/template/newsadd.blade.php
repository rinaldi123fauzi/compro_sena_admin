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
                <div class="col-lg-9">
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
                            <form class="row g-3" method="POST" action="{{ route('regional.store') }}">
                                @csrf
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="namaregional" name="namaregional"
                                        value="{{ old('namaregional') }}" required>

                                    @error('namaregional')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    {{-- <label for="validationDefault01" class="form-label">Judul</label> --}}
                                    <textarea class="ckeditor-classic"></textarea>

                                    @error('namaregional')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                                {{-- <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div> --}}
                            </form>

                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Option</h4>
                        </div>


                        <div class="card-body">
                            <div class="col-xxl-12">
                                <div class="accordion custom-accordionwithicon accordion-flush accordion-fill-secondary"
                                    id="accordionFill2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionFill2Example1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#accor_fill21" aria-expanded="true"
                                                aria-controls="accor_fill21">
                                                SEO
                                            </button>
                                        </h2>
                                        <div id="accor_fill21" class="accordion-collapse collapse show"
                                            aria-labelledby="accordionFill2Example1" data-bs-parent="#accordionFill2">
                                            <div class="accordion-body">
                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    @error('namaregional')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Meta
                                                        Description</label>
                                                    <textarea type="text" class="form-control" id="namaregional" name="namaregional" value="{{ old('namaregional') }}"
                                                        required></textarea>

                                                    @error('namaregional')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionFill2Example2">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#accor_fill22"
                                                aria-expanded="false" aria-controls="accor_fill22">
                                                Language - Eng
                                            </button>
                                        </h2>
                                        <div id="accor_fill22" class="accordion-collapse collapse"
                                            aria-labelledby="accordionFill2Example2" data-bs-parent="#accordionFill2">
                                            <div class="accordion-body">
                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="namaregional"
                                                        name="namaregional" value="{{ old('namaregional') }}" required>

                                                    @error('namaregional')
                                                        <div class="error-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationDefault01" class="form-label">Judul</label>
                                                    <textarea class="form-control"></textarea>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <input type="file" class="form-control" id="namaregional" name="namaregional"
                                    required>
                            </div>
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
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal Publish</td>
                                            <td> <input type="date" class="form-control"></td>
                                            {{-- <td> <a href="">(History)</a></td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                        <div class="col-12" style="padding:20px; text-align:right;">
                            <button class="btn btn-primary" type="submit">Save As Draft</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
    </div>
</x-template.layout>
