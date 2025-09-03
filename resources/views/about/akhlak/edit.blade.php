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
                                action="{{ url('') }}/about/akhlak_update/{{ $akhlakdetail->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $akhlakdetail->id }}">

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image Akhlak</label>
                                    <input type="file" class="form-control" id="image1" name="image1"
                                        value="{{ old('image1') }}">

                                    @if (!empty($akhlakdetail->image1))
                                        <img src="{{ $akhlakdetail->image1_url }}" alt="image1" height="200px"
                                            style="margin-top:15px;">
                                    @endif

                                    @error('image1')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 300 x 500
                                        pixels, Max size : 5 MB </label>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image Hover</label>
                                    <input type="file" class="form-control" id="image2" name="image2"
                                        value="{{ old('image2') }}">

                                    @if (!empty($akhlakdetail->image2))
                                        <img src="{{ $akhlakdetail->image2_url }}" alt="image1" height="200px"
                                            style="margin-top:15px;">
                                    @endif
                                    @error('image2')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 300 x 500
                                        pixels, Max size : 5 MB </label>
                                </div>


                                <div class="col-md-13">
                                    <label for="validationDefault01" class="form-label">Image Pop Up</label>
                                    <input type="file" class="form-control" id="image3" name="image3"
                                        value="{{ old('image3') }}">

                                    @if (!empty($akhlakdetail->image3))
                                        <img src="{{ $akhlakdetail->image3_url }}" alt="image1" height="200px"
                                            style="margin-top:15px;">
                                    @endif
                                    @error('image3')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1080 x 1080
                                        pixels, Max size : 5 MB</label>
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
                            <h4 class="card-title mb-0 flex-grow-1">Data Akhlak</h4>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Image 1</th>
                                        <th data-ordering="false">Image 2</th>
                                        <th data-ordering="false">Image 3</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($akhlak as $val)
                                        <tr>

                                            <td>
                                                @if (!empty($val->image1))
                                                    <img src="{{ $val->image1_url }}" alt="image1" height="150px">
                                                @endif

                                            </td>
                                            <td>
                                                @if (!empty($val->image2))
                                                    <img src="{{ $val->image2_url }}" alt="image2" height="150px">
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($val->image3))
                                                    <img src="{{ $val->image3_url }}" alt="image3" height="150px">
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/about/akhlak_edit/{{ $val->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/about/akhlak_destroy/{{ $val->id }}">
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
    </div>
</x-template.layout>
