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
                <div class="col">

                    <div class="card">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Tahun</th>
                                        <th data-ordering="false">Image</th>
                                        <th data-ordering="false">Download File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($annualreport as $val)
                                        <tr>

                                            <td>{{ Str::title($val->tahun) }}</td>
                                            <td>
                                                @if ($val->image_url)
                                                    <img src="{{ $val->image_url }}" alt="image"
                                                        style="height:100px;">
                                                @elseif ($val->image)
                                                    <img src="{{ asset('upload/image/' . $val->image) }}" alt="image"
                                                        style="height:100px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($val->file_url)
                                                    <a href="{{ $val->file_url }}" target="_blank"
                                                        class="btn btn-primary">Download</a>
                                                @elseif ($val->file)
                                                    <a href="{{ asset('upload/file/' . $val->file) }}" target="_blank"
                                                        class="btn btn-primary">Download</a>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/annualreport/edit/{{ $val->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                href="javascript:void(0);"
                                                                onclick="deleteConfirm('{{ $val->id }}')">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteConfirm(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('') }}/annualreport/destroy/" + id;
                }
            });
        }

        // If you want to show success message after deletion
        @if (session('message'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('message') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>



</x-template.layout>
