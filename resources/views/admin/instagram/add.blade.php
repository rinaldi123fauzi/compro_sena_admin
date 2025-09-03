<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Data Instagram</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('instagram.index') }}">Instagram</a></li>
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

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('instagram.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12">
                                    <label for="caption" class="form-label">Caption <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="caption" id="caption" rows="4" placeholder="Masukkan caption Instagram">{{ old('caption') }}</textarea>
                                    @error('caption')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_posting" class="form-label">Tanggal Posting <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_posting"
                                        id="tanggal_posting" value="{{ old('tanggal_posting') }}">
                                    @error('tanggal_posting')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="url" class="form-label">URL Instagram <span
                                            class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="url" id="url"
                                        placeholder="https://www.instagram.com/p/..." value="{{ old('url') }}">
                                    @error('url')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="image" class="form-label">Upload Image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        accept="image/*" required>
                                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Max: 2MB</small>
                                    @error('image')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line align-bottom me-1"></i> Simpan
                                    </button>
                                    <a href="{{ route('instagram.index') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line align-bottom me-1"></i> Kembali
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-template.layout>
