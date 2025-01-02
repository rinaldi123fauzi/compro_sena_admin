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
                            <form class="row g-3" method="POST" action="{{ route('home.about_update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Sub Headline</label>
                                    <input type="text" class="form-control" id="sub_headline" name="sub_headline"
                                        value="{{ old('sub_headline', $about->sub_headline) }}">

                                    @error('sub_headline')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Main Headline</label>
                                    <input type="text" class="form-control" id="main_headline" name="main_headline"
                                        value="{{ old('main_headline', $about->main_headline) }}">
                                    @error('main_headline')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image', $about->image) }}">
                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 900 x 516
                                        pixels,
                                        Max size :
                                        5 MB</label>

                                    <br>
                                    <img src="{{ asset('upload/image/' . $about->image) }}" alt=""
                                        style="height: 200px;">
                                </div> --}}


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Link Video</label>
                                    <input type="text" class="form-control" id="link_video" name="link_video"
                                        value="{{ old('link_video', $about->link_video) }}">
                                    @error('link_video')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Description</label>
                                    <textarea class="ckeditor-classic" name="description"> {{ $about->description }} </textarea>
                                    @error('description')
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

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Sub
                                                            Headline</label>
                                                        <input type="text" class="form-control" id="sub_headline_eng"
                                                            name="sub_headline_eng"
                                                            value="{{ old('sub_headline_eng', $about->sub_headline_eng) }}">

                                                        @error('sub_headline_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Main
                                                            Headline</label>
                                                        <input type="text" class="form-control"
                                                            id="main_headline_eng" name="main_headline_eng"
                                                            value="{{ old('main_headline_eng', $about->main_headline_eng) }}">
                                                        @error('main_headline_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>




                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Link
                                                            Video</label>
                                                        <input type="text" class="form-control" id="link_video_eng"
                                                            name="link_video_eng"
                                                            value="{{ old('link_video_eng', $about->link_video_eng) }}">
                                                        @error('link_video_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationDefault01"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control" name="description_eng"> {{ $about->description_eng }} </textarea>
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
