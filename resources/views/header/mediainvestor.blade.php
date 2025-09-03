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
                            <div class="alert alert-success" role="alert" style="margin-bottom:15px;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('header.mediainvestor_update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="header_mediainvestor_image"
                                        name="header_mediainvestor_image"
                                        value="{{ old('header_mediainvestor_image', $header->header_mediainvestor_image) }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimension : 2560 x 700
                                        pixels. Max size : 5 MB</label>
                                    <br>
                                    @error('header_mediainvestor_image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    @if ($header->header_mediainvestor_image_url)
                                        <img src="{{ $header->header_mediainvestor_image_url }}" alt=""
                                            style="height: 150px; ">
                                    @elseif ($header->header_mediainvestor_image)
                                        <img src="{{ asset('upload/image/' . $header->header_mediainvestor_image) }}"
                                            alt="" style="height: 150px; ">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Text</label>
                                    <input type="text" class="form-control" id="header_mediainvestor_text"
                                        name="header_mediainvestor_text"
                                        value="{{ old('header_mediainvestor_text', $header->header_mediainvestor_text) }}">
                                    @error('header_mediainvestor_text')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Text - English</label>
                                    <input type="text" class="form-control" id="header_mediainvestor_text_en"
                                        name="header_mediainvestor_text_en"
                                        value="{{ old('header_mediainvestor_text', $header->header_mediainvestor_text_en) }}">
                                    @error('header_mediainvestor_text_en')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}












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
