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
                            <form class="row g-3" method="POST"
                                action="{{ url('') }}/project/update/{{ $project->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Nama Project</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $project->name) }}">

                                    @error('name')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image') }}">
                                    @if (!empty($project->image))
                                        <img src="{{ asset('upload/image/' . $project->image) }}" alt="image"
                                            width="200px" style="margin-top:15px;">
                                    @endif
                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Description</label>
                                    <textarea id="editor" name="description">{{ $project->description }}</textarea>
                                    @error('description')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" name="year"
                                        value="{{ old('year', $project->year) }}">

                                    @error('year')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Type</label>
                                    <select class="form-select" name="type">
                                        <option value=""> -- Silahkan Pilih -- </option>

                                        <option value="upstream" @if ($project->type == 'upstream') selected @endif>
                                            Upstream</option>
                                        <option value="refinery" @if ($project->type == 'refinery') selected @endif>
                                            Refinery</option>
                                        <option value="downstream" @if ($project->type == 'downstream') selected @endif>
                                            Downstream</option>
                                        <option value="other" @if ($project->type == 'other') selected @endif>
                                            Other</option>


                                    </select>
                                    @error('type')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" name="lat"
                                        value="{{ old('lat', $project->lat) }}">

                                    @error('lat')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Longtitude</label>
                                    <input type="text" class="form-control" name="lng"
                                        value="{{ old('lng', $project->lng) }}">

                                    @error('lng')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
