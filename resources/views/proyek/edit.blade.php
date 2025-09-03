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
                                action="{{ url('') }}/proyek/update/{{ $proyek->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $proyek->id }}">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Vendor</label>
                                    <select class="js-example-basic-single form-control" name="vendor" required>
                                        <option value=""> -- Silahkan Pilih -- </option>

                                        @foreach ($vendor as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $proyek->vendorid == $item->id ? 'selected' : '' }}>
                                                {{ $item->namavendor }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('namavendor')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Regional</label>
                                    <select class="js-example-basic-single form-control" name="regional" required>
                                        <option value=""> -- Silahkan Pilih -- </option>

                                        @foreach ($regional as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $proyek->regionalid == $item->id ? 'selected' : '' }}>
                                                {{ $item->namaregional }}</option>
                                        @endforeach
                                    </select>

                                    @error('namavendor')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Project</label>
                                    <select class="js-example-basic-single form-control" name="project" required>
                                        <option value=""> -- Silahkan Pilih -- </option>

                                        @foreach ($project as $item)
                                            <option {{ $proyek->projectid == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->namaproject }}</option>
                                        @endforeach
                                    </select>

                                    @error('namavendor')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">OPR</label>
                                    <input type="text" class="form-control" id="proyek" name="opr"
                                        value="{{ old('opr', $proyek->opr) }}">
                                    @error('opr')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Ring</label>
                                    <input type="text" class="form-control" id="ring" name="ring"
                                        value="{{ old('ring', $proyek->ring) }}">
                                    @error('ring')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">SONUMB</label>
                                    <input type="text" class="form-control" id="sonumb" name="sonumb"
                                        value="{{ old('sonumb', $proyek->sonumb) }}">
                                    @error('sonumb')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Site ID</label>
                                    <input type="text" class="form-control" id="siteid" name="siteid"
                                        value="{{ old('siteid', $proyek->siteid) }}">
                                    @error('siteid')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="sitename" name="sitename"
                                        value="{{ old('sitename', $proyek->sitename) }}">
                                    @error('sitename')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Nomor SPK</label>
                                    <input type="text" class="form-control" id="spknomor" name="spknomor"
                                        value="{{ old('spknomor', $proyek->spknomor) }}">
                                    @error('spknomor')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">SPK Remark</label>
                                    <input type="text" class="form-control" id="spkremark" name="spkremark"
                                        value="{{ old('spkremark', $proyek->spkremark) }}">
                                    @error('spkremark')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Nomor PO</label>
                                    <input type="text" class="form-control" id="ponomor" name="ponomor"
                                        value="{{ old('ponomor', $proyek->ponomor) }}">
                                    @error('ponomor')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Tanggal PO</label>
                                    <input type="date" class="form-control" id="potanggal" name="potanggal"
                                        value="{{ old('potanggal', $proyek->potanggal) }}">
                                    @error('potanggal')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Nilai PO</label>
                                    <input type="number" class="form-control" id="nilaipo" name="nilaipo"
                                        value="{{ old('nilaipo', $proyek->nilaipo) }}">
                                    @error('nilaipo')
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
                </div> <!-- end col -->
            </div>


        </div>
    </div>
</x-template.layout>
