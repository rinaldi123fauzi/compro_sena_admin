<x-template.layout>
    <div class="page-content">

        <form method="POST" action="{{ url('') }}/contact-us/update/1" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                                    <label for="validationDefault01" class="form-label">Kota</label>
                                    <input type="text" class="form-control" id="ho_city" name="ho_city"
                                        value="{{ old('ho_city', $contactus->ho_city) }}" required>

                                    @error('ho_city')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="ho_address" name="ho_address"
                                        value="{{ old('ho_address', $contactus->ho_address) }}" required>

                                    @error('ho_address')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Telephone</label>
                                    <input type="text" class="form-control" id="ho_phone" name="ho_phone"
                                        value="{{ old('ho_phone', $contactus->ho_phone) }}" required>

                                    @error('ho_phone')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="ho_email" name="ho_email"
                                        value="{{ old('ho_email', $contactus->ho_email) }}" required>

                                    @error('ho_email')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Link Map</label>
                                    <input type="text" class="form-control" id="ho_linkmap" name="ho_linkmap"
                                        value="{{ old('ho_linkmap', $contactus->ho_linkmap) }}" required>

                                    @error('ho_linkmap')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Link Map</label>
                                    <textarea class="form-control" id="map" name="map" required rows="10">{{ old('map', $contactus->map) }}</textarea>
                                    @error('map')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        {{-- <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Featured Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="featured_image"
                                        name="featured_image">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1280 x 854
                                        pixels, Max size : 5 MB </label>
                                    @if ($contactus->featured_image)
                                        <img style="margin-top:20px;"
                                            src="{{ asset('upload/image/' . $contactus->featured_image) }}"
                                            alt="image" width="100%">
                                    @endif
                                </div>
                            </div>

                        </div> --}}

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Publish</h4>
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
