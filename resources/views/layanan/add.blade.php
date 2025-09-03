<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Layanan - {{ $capability->title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('capability.index') }}">Capability</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('layanan.index', $capability->id) }}">Layanan</a></li>
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
                            <form class="row g-3" method="POST" action="{{ route('layanan.store', $capability->id) }}">
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
                                        rows="8">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="type" class="form-label">Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type"
                                        id="type">
                                        <option value="">Pilih Type</option>
                                        <option value="During Construction"
                                            {{ old('type') == 'During Construction' ? 'selected' : '' }}>Pre
                                            Construction</option>
                                        <option value="Post Operation"
                                            {{ old('type') == 'Post Operation' ? 'selected' : '' }}>Post Operation
                                        </option>
                                        <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>

                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line align-middle me-1"></i> Simpan
                                    </button>
                                    <a href="{{ route('layanan.index', $capability->id) }}" class="btn btn-secondary">
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
