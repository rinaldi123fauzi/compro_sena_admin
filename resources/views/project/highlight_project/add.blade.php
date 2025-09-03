<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Highlight Project</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('highlight-project.index') }}">Highlight
                                        Project</a></li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('success') }}.
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('highlight-project.store') }}">
                                @csrf
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title') }}">

                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="5">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="lat" class="form-label">Latitude</label>
                                    <input type="text" class="form-control @error('lat') is-invalid @enderror"
                                        name="lat" id="lat" value="{{ old('lat') }}"
                                        placeholder="Contoh: -6.2088">

                                    @error('lat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="lng" class="form-label">Longitude</label>
                                    <input type="text" class="form-control @error('lng') is-invalid @enderror"
                                        name="lng" id="lng" value="{{ old('lng') }}"
                                        placeholder="Contoh: 106.8456">

                                    @error('lng')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line align-middle me-1"></i> Simpan
                                    </button>
                                    <a href="{{ route('highlight-project.index') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line align-middle me-1"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
</x-template.layout>
