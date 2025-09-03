<x-template.layout>
    <div class="page-content">

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
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


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <textarea class="form-control" id="description" name="content"></textarea>

                                    @error('content')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                                {{-- <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div> --}}


                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Option</h4>
                            </div>


                            <div class="card-body">
                                <div class="col-xxl-12">
                                    <div class="accordion " id="default-accordion-example" style="margin-bottom:20px;">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionFill2Example1">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#accor_fill21"
                                                    aria-expanded="true" aria-controls="accor_fill21">
                                                    SEO
                                                </button>
                                            </h2>
                                            <div id="accor_fill21" class="accordion-collapse collapse show"
                                                aria-labelledby="accordionFill2Example1"
                                                data-bs-parent="#accordionFill2">
                                                <div class="accordion-body">
                                                    <div class="col-md-12">
                                                        <label for="validationDefault01"
                                                            class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="seo_title"
                                                            name="seo_title" value="{{ old('seo_title') }}">

                                                        @error('seo_title')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationDefault01" class="form-label">Meta
                                                            Description</label>
                                                        <textarea type="text" class="form-control" name="seo_description" value="{{ old('seo_description') }}"></textarea>

                                                        @error('seo_description')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                                        <input type="text" class="form-control" name="title_eng"
                                                            value="{{ old('title_eng') }}">

                                                        @error('title_en')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <label for="validationDefault01"
                                                            class="form-label">Content</label>
                                                        <textarea class="form-control" id="description_eng" name="content_eng"></textarea>

                                                    </div>




                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <label for="validationDefault01" class="form-label">SEO -
                                                            Title</label>
                                                        <input type="text" class="form-control" id="seo_title_en"
                                                            name="seo_title_eng" value="{{ old('seo_title_eng') }}">

                                                        @error('seo_title_en')
                                                            <div class="error-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <label for="validationDefault01" class="form-label">SEO - Meta
                                                            Description</label>
                                                        <textarea type="text" class="form-control" name="seo_description_eng" value="{{ old('seo_description_eng') }}"></textarea>

                                                        @error('seo_description_en')
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
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1600 x 1200
                                        pixels, Max size : 5 MB </label>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">

                                    <select class="form-select" name="jenis">
                                        <option value=""> -- Silahkan Pilih -- </option>
                                        <option value="news">News</option>
                                        <option value="investor">Investor</option>
                                        <option value="article">Article</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Featured</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <select class="form-select" name="featured">
                                        <option value="0">0 - Tidak Aktif</option>
                                        <option value="1">1 - Aktif</option>
                                    </select>
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
                                                <td>
                                                    <select class="form-select" name="status">
                                                        @if (auth()->user()->role == 'contributor')
                                                            <option value="draft">Draft</option>
                                                        @else
                                                            <option value="draft">Draft</option>
                                                            <option value="review">Review</option>
                                                            <option value="published">Publish</option>
                                                        @endif
                                                        {{-- <option value=""> -- Silahkan Pilih -- </option>
                                                        <option value="draft">Draft</option>
                                                        <option value="review">Review</option>
                                                        <option value="published">Publish</option> --}}
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium">Tanggal Publish</td>
                                                <td> <input type="date" class="form-control" name="schedule"></td>
                                                {{-- <td> <a href="">(History)</a></td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                            </div>
                            <div class="row" style="padding:20px; text-align:right;">
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
