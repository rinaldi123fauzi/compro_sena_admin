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
                                action="{{ url('') }}/user/update/{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Nomor Induk Pegawai</label>
                                    <input type="number" class="form-control" id="nip" name="nip"
                                        value="{{ old('nip', $user->nip) }}" required>
                                    @error('nip')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Ulangi Password</label>
                                    <input type="text" class="form-control" id="password" name="password2"
                                        value="{{ old('password2') }}">
                                    @error('password2')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Role</label>

                                    <select class="form-control" id="role" name="role" required>
                                        <option value=""> -- Pilih Role -- </option>
                                        {{-- <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin
                                        </option>
                                        <option {{ $user->role == 'project' ? 'selected' : '' }} value="project">
                                            Project</option>
                                        <option {{ $user->role == 'engineering' ? 'selected' : '' }}
                                            value="engineering">Engineering</option>
                                        <option {{ $user->role == 'logistic' ? 'selected' : '' }} value="logistic">
                                            Logistic</option> --}}

                                        <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin
                                        </option>
                                        <option {{ $user->role == 'humas' ? 'selected' : '' }} value="humas">Humas
                                        </option>
                                        <option {{ $user->role == 'contributor' ? 'selected' : '' }}
                                            value="contributor">Contributor</option>

                                        {{-- <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Super
                                            Admin</option>
                                        <option {{ $user->role == 'Project Administrator' ? 'selected' : '' }}
                                            value="Project Administrator">Project Administrator</option>
                                        <option {{ $user->role == 'Billing Administrator' ? 'selected' : '' }}
                                            value="Billing Administrator">Billing Administrator</option>
                                        <option {{ $user->role == 'Drafter' ? 'selected' : '' }} value="Drafter">
                                            Drafter</option>
                                        <option {{ $user->role == 'Logistic Administrator' ? 'selected' : '' }}
                                            value="Logistic Administrator">Logistic Administrator</option>
                                        <option {{ $user->role == 'Supervisor' ? 'selected' : '' }} value="Supervisor">
                                            Supervisor</option>
                                        <option {{ $user->role == 'Site Manager' ? 'selected' : '' }}
                                            value="Site Manager">Site Manager</option> --}}



                                    </select>
                                    @error('role')
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
