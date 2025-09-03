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
                        {{-- <div class="card-footer align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Browser defaults</h4>
                        </div>  --}}
                        @if (session('message'))
                            <div class="alert alert-success" role="alert" style="margin-bottom:15px;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('footer.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Nama Perusahaan</label>
                                    <input name="nama_pt" type="text" class="form-control"
                                        value="{{ $footer->nama_pt }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Alamat PT</label>
                                    <input name="alamat_pt" type="text" class="form-control"
                                        value="{{ $footer->alamat_pt }}">
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image Member Of</label>
                                    <input type="file" class="form-control" id="image_member_of"
                                        name="image_member_of"
                                        value="{{ old('image_member_of', $footer->image_member_of) }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 414 x 122
                                        pixels, Max size : 5 MB </label>
                                    <br>
                                    @error('image_member_of')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    @if ($footer->image_member_of_url)
                                        <img src="{{ $footer->image_member_of_url }}" alt=""
                                            style="height: 50px; ">
                                    @elseif ($footer->image_member_of)
                                        <img src="{{ asset('upload/image/' . $footer->image_member_of) }}"
                                            alt="" style="height: 50px; ">
                                    @endif
                                    <br>
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image Subsidiary Of</label>
                                    <input type="file" class="form-control" id="image_subsidiary_of"
                                        name="image_subsidiary_of"
                                        value="{{ old('image_subsidiary_of', $footer->image_subsidiary_of) }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1200 x 237
                                        pixels, Max size : 5 MB </label>
                                    <br>
                                    @error('image_subsidiary_of')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    @if ($footer->image_subsidiary_of_url)
                                        <img src="{{ $footer->image_subsidiary_of_url }}" alt=""
                                            style="height: 50px; ">
                                    @elseif ($footer->image_subsidiary_of)
                                        <img src="{{ asset('upload/image/' . $footer->image_subsidiary_of) }}"
                                            alt="" style="height: 50px; ">
                                    @endif
                                    <br>
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Image Footer</label>
                                    <input type="file" class="form-control" id="image_footer" name="image_footer"
                                        value="{{ old('image_footer', $footer->image_footer) }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1100 x 550
                                        pixels, Max size : 5 MB </label>
                                    <br>
                                    @error('image_footer')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    @if ($footer->image_footer_url)
                                        <img src="{{ $footer->image_footer_url }}" alt=""
                                            style="height: 200px; ">
                                    @elseif ($footer->image_footer)
                                        <img src="{{ asset('upload/image/' . $footer->image_footer) }}" alt=""
                                            style="height: 200px; ">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Logo Footer</label>
                                    <input type="file" class="form-control" id="logo_footer" name="logo_footer"
                                        value="{{ old('logo_footer', $footer->logo_footer) }}">
                                    <label for="validationDefault01" class="form-label"
                                        style="color: rgb(22, 150, 54);font-size:13px;">Image Dimensions : 1100 x 550
                                        pixels, Max size : 5 MB </label>
                                    <br>
                                    @error('logo_footer')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    @if ($footer->logo_footer_url)
                                        <img src="{{ $footer->logo_footer_url }}" alt=""
                                            style="height: 50px; ">
                                    @elseif ($footer->logo_footer)
                                        <img src="{{ asset('upload/image/' . $footer->logo_footer) }}" alt=""
                                            style="height: 50px; ">
                                    @endif
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Copy Right</label>
                                    <input name="copyright" type="text" class="form-control"
                                        value="{{ $footer->copyright }}">
                                </div>


                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Instagram Link</label>
                                    <input name="instagram_link" type="text" class="form-control"
                                        value="{{ $footer->instagram_link }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Facebook Link</label>
                                    <input name="facebook_link" type="text" class="form-control"
                                        value="{{ $footer->facebook_link }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Twitter Link</label>
                                    <input name="twitter_link" type="text" class="form-control"
                                        value="{{ $footer->twitter_link }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Linkedin Link</label>
                                    <input name="linkedin_link" type="text" class="form-control"
                                        value="{{ $footer->linkedin_link }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Youtube Link</label>
                                    <input name="youtube_link" type="text" class="form-control"
                                        value="{{ $footer->youtube_link }}">
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
