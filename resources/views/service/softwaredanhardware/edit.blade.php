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
                                action="{{ url('') }}/service/softwaredanhardware_update/{{ $sh->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image </label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image') }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 800 x 800
                                        pixels, Max size : 5 MB</label>

                                    @if (!empty($sh->image))
                                        <img src="{{ asset('upload/image/' . $sh->image) }}" alt="image"
                                            height="200px" style="margin-top:15px;">
                                    @endif

                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $sh->title) }}">

                                    @error('title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Type</label>
                                    <select class="form-select" name="type">
                                        <option value="software" @if ($sh->type == 'software') selected @endif>
                                            Software</option>
                                        <option value="hardware" @if ($sh->type == 'hardware') selected @endif>
                                            Equipment</option>
                                    </select>

                                    @error('title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                            <h4 class="card-title mb-0 flex-grow-1">Data Software dan Equipment</h4>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Image </th>
                                        <th data-ordering="false">Title </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allsh as $val)
                                        <tr>

                                            <td>
                                                @if (!empty($val->image))
                                                    <img src="{{ asset('upload/image/' . $val->image) }}"
                                                        alt="{{ $val->title }}" class="avatar-md rounded">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $val->title }}
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
                                                                href="{{ url('') }}/service/softwaredanhardware_edit/{{ $val->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/service/softwaredanhardware_destroy/{{ $val->id }}">
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
