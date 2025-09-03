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

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif

                        <div class="card-body">
                            <form class="row g-3" method="POST"
                                action="{{ url('') }}/regional/update/{{ $regional->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $regional->id }}">

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Nama regional</label>
                                    <input type="text" class="form-control" id="namaregional" name="namaregional"
                                        value="{{ old('namaregional', $regional->namaregional) }}" required>

                                    @error('namaregional')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Kode regional</label>
                                    <input type="text" class="form-control" id="koderegional" name="koderegional"
                                        value="{{ old('koderegional', $regional->koderegional) }}" required>
                                    @error('koderegional')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</x-template.layout>
