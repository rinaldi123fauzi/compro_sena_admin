<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Data Instagram</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('instagram.index') }}">Instagram</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                            <form class="row g-3" method="POST"
                                action="{{ route('instagram.update', $instagram->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="caption" class="form-label">Caption <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="caption" id="caption" rows="4" placeholder="Masukkan caption Instagram">{{ old('caption', $instagram->caption) }}</textarea>
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
                                        id="tanggal_posting"
                                        value="{{ old('tanggal_posting', $instagram->tanggal_posting->format('Y-m-d')) }}">
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
                                        placeholder="https://www.instagram.com/p/..."
                                        value="{{ old('url', $instagram->url) }}">
                                    @error('url')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Current Image</label>
                                    <div class="mb-3">
                                        @if (!empty($instagram->image))
                                            <img src="{{ asset('storage/instagram/' . $instagram->image) }}"
                                                alt="Current Image"
                                                style="width: 150px; height: 150px; object-fit: cover;"
                                                class="border rounded">
                                            <p class="text-muted mt-1">Current: {{ $instagram->image }}</p>
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Update Image</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="image_source"
                                            id="upload_image" value="upload">
                                        <label class="form-check-label" for="upload_image">
                                            Upload Image Baru
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="image_source"
                                            id="keep_current" value="keep" checked>
                                        <label class="form-check-label" for="keep_current">
                                            Pertahankan Image Saat Ini
                                        </label>
                                    </div>
                                    @error('image_source')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" id="image_upload_section" style="display: none;">
                                    <label for="image" class="form-label">Upload Image Baru</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Max: 2MB</small>
                                    @error('image')
                                        <div class="error-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line align-bottom me-1"></i> Update
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadRadio = document.getElementById('upload_image');
            const keepRadio = document.getElementById('keep_current');
            const uploadSection = document.getElementById('image_upload_section');

            uploadRadio.addEventListener('change', function() {
                if (this.checked) {
                    uploadSection.style.display = 'block';
                }
            });

            keepRadio.addEventListener('change', function() {
                if (this.checked) {
                    uploadSection.style.display = 'none';
                    document.getElementById('image').value = '';
                }
            });
        });
    </script>
</x-template.layout>
