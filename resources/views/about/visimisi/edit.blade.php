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
                            <form class="row g-3" method="POST" action="{{ route('about.visimisi_update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Headline</label>
                                    <input type="text" class="form-control" id="headline" name="headline"
                                        value="{{ old('headline', $visimisi->headline) }}">

                                    @error('headline')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Visi Title</label>
                                    <input type="text" class="form-control" id="main_headline" name="visi_title"
                                        value="{{ old('visi_title', $visimisi->visi_title) }}">
                                    @error('visi_title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Visi Description</label>
                                    <textarea class="ckeditor-classic" name="visi_description"> {{ $visimisi->visi_description }} </textarea>
                                    @error('visi_description')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Misi Title</label>
                                    <input type="text" class="form-control" id="misi_title" name="misi_title"
                                        value="{{ old('misi_title', $visimisi->visi_title) }}">
                                    @error('misi_title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Misi Description</label>
                                    <textarea id="editor" name="misi_description"> {{ $visimisi->misi_description }} </textarea>
                                    @error('misi_description')
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
                                                        <label for="validationDefault01"
                                                            class="form-label">Headline</label>
                                                        <input type="text" class="form-control" id="headline_eng"
                                                            name="headline_eng"
                                                            value="{{ old('headline_eng', $visimisi->headline_eng) }}">

                                                        @error('headline_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Visi
                                                            Title</label>
                                                        <input type="text" class="form-control" id="main_headline"
                                                            name="visi_title_eng"
                                                            value="{{ old('visi_title_eng', $visimisi->visi_title_eng) }}">
                                                        @error('visi_title_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Visi
                                                            Description</label>
                                                        <textarea id="editor2" name="visi_description_eng"> {{ $visimisi->visi_description_eng }} </textarea>
                                                        @error('visi_description_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Misi
                                                            Title</label>
                                                        <input type="text" class="form-control"
                                                            id="visi_title_eng" name="visi_title_eng"
                                                            value="{{ old('visi_title_eng', $visimisi->visi_title_eng) }}">
                                                        @error('visi_title_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Misi
                                                            Description</label>
                                                        <textarea id="editor1" name="misi_description_eng"> {{ $visimisi->misi_description_eng }} </textarea>
                                                        @error('misi_description_eng')
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
