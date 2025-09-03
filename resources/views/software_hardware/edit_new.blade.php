<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Software & Equipment</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('software_hardware.index') }}">Software &
                                        Equipment</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST"
                                action="{{ route('software_hardware.update', $softwareHardware) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $softwareHardware->title) }}" required>
                                    @error('title')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="type" class="form-label">Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">-- Silahkan Pilih --</option>
                                        <option value="software"
                                            {{ old('type', $softwareHardware->type) == 'software' ? 'selected' : '' }}>
                                            Software</option>
                                        <option value="hardware"
                                            {{ old('type', $softwareHardware->type) == 'hardware' ? 'selected' : '' }}>
                                            Equipment</option>
                                    </select>
                                    @error('type')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @if ($softwareHardware->image_url)
                                    <div class="col-md-12">
                                        <label class="form-label">Current Image:</label><br>
                                        <img src="{{ $softwareHardware->image_url }}"
                                            alt="{{ $softwareHardware->title }}" class="img-thumbnail mb-2"
                                            style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label for="image"
                                        class="form-label">{{ $softwareHardware->image_url ? 'Change Image' : 'Image' }}</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept="image/*">
                                    <small class="form-text text-muted">
                                        Accepted formats: JPEG, PNG, JPG, GIF. Maximum size: 2MB.
                                        {{ $softwareHardware->image_url ? 'Leave empty to keep current image.' : '' }}
                                    </small>
                                    @error('image')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" id="image-preview" style="display: none;">
                                    <label class="form-label">New Image Preview:</label><br>
                                    <img id="preview-img" src="#" alt="Preview" class="img-thumbnail"
                                        style="max-width: 200px; max-height: 200px;">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-save-line align-middle me-1"></i> Update
                                    </button>
                                    <a href="{{ route('software_hardware.index') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line align-middle me-1"></i> Back
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
        document.getElementById('image').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('image-preview').style.display = 'none';
            }
        });
    </script>
</x-template.layout>
