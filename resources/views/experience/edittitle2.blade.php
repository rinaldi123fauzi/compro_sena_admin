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
                            <form class="row g-3" method="POST" action="{{ route('experience.updatesection2') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="texttitle" name="texttitle"
                                        value="{{ old('texttitle', $titles->texttitle) }}">
                                    @error('texttitle')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="textsubtitle"
                                        value="{{ old('textsubtitle', $titles->textsubtitle) }}">
                                    @error('textsubtitle')
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
                                                            class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="texttitle_eng"
                                                            name="texttitle_eng"
                                                            value="{{ old('texttitle_eng', $titles->texttitle_eng) }}">
                                                        @error('texttitle_eng')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationDefault01"
                                                            class="form-label">Subtitle</label>
                                                        <input type="text" class="form-control" id="subtitle_eng"
                                                            name="textsubtitle_eng"
                                                            value="{{ old('textsubtitle_eng', $titles->textsubtitle_eng) }}">
                                                        @error('textsubtitle_eng')
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

                                {{-- <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="textdeskripsi">{{ old('textdeskripsi', $titles->textdeskripsi) }}</textarea>

                                    @error('textsubtitle')
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
