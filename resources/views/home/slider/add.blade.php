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
                            <form class="row g-3" method="POST" action="{{ route('home.slider_store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Sub Text</label>
                                    <input type="text" class="form-control" id="sub_text" name="sub_text"
                                        value="{{ old('sub_text') }}">

                                    @error('sub_text')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Primary Text</label>
                                    <input type="text" class="form-control" id="primary_text" name="primary_text"
                                        value="{{ old('primary_text') }}">
                                    @error('primary_text')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image') }}">
                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image
                                        Dimensions : 1920 x 1280
                                        pixels, Max size : 5 MB </label>
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" id="button_text" name="button_text"
                                        value="{{ old('button_text') }}">
                                    @error('button_text')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Button Link</label>
                                    <input type="text" class="form-control" id="button_link" name="button_link"
                                        value="{{ old('button_link') }}" placeholder="#">
                                    @error('button_link')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="engversion">
                                    <!-- Base Example -->
                                    <div class="accordion" id="default-accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    English Version
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne"
                                                data-bs-parent="#default-accordion-example">
                                                <div class="accordion-body">

                                                    {{--  <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Sub Text
                                                            (English)</label>
                                                        <input type="text" class="form-control" id="sub_text_eng"
                                                            name="sub_text_eng" value="{{ old('sub_text_eng') }}">

                                                        @error('sub_text_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div> --}}

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Primary Text
                                                            (English)</label>
                                                        <input type="text" class="form-control" id="primary_text_eng"
                                                            name="primary_text_eng"
                                                            value="{{ old('primary_text_eng') }}">
                                                        @error('primary_text_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Button
                                                            Text
                                                            (English)</label>
                                                        <input type="text" class="form-control" id="button_text_eng"
                                                            name="button_text_eng"
                                                            value="{{ old('button_text_eng') }}">
                                                        @error('button_text_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
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
                </div> <!-- end col -->
            </div>


        </div>
    </div>
</x-template.layout>
