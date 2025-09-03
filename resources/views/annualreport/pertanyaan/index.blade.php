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

                                        <th data-ordering="false">Subject</th>
                                        <th data-ordering="false">Annual Report Tahun</th>
                                        <th data-ordering="false">Nama Pengirim</th>
                                        <th data-ordering="false">Email</th>
                                        <th data-ordering="false">Nomor Handphone</th>
                                        <th data-ordering="false">status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listpertanyaan as $val)
                                        <tr>

                                            <td>{{ Str::title($val->subject) }}</td>
                                            <td> Report Tahun {{ Str::title($val->tahun) }}</td>
                                            <td>{{ Str::title($val->name) }}</td>
                                            <td>{{ Str::title($val->email) }}</td>
                                            <td>{{ Str::title($val->phone) }}</td>
                                            <td>
                                                @if ($val->status == 'unread')
                                                    <span
                                                        class="badge text-bg-warning">{{ Str::title($val->status) }}</span>
                                                @elseif ($val->status == 'read')
                                                    <span
                                                        class="badge text-bg-info">{{ Str::title($val->status) }}</span>
                                                @else
                                                    <span
                                                        class="badge text-bg-success">{{ Str::title($val->status) }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        {{-- <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/annualreport/showpertanyaan/{{ $val->id }}"><i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Show</a>
                                                        </li> --}}
                                                        <li>
                                                            <a class="dropdown-item send-report-btn"
                                                                href="javascript:void(0);"
                                                                onclick="confirmSendReport('{{ $val->id }}')">
                                                                <i
                                                                    class="ri-send-plane-fill align-bottom me-2 text-muted"></i>
                                                                Send Report
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                href="javascript:void(0);"
                                                                onclick="confirmDelete('{{ $val->id }}')">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete
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
        function confirmSendReport(id) {
            Swal.fire({
                title: 'Kirim Annual Report?',
                text: "Status akan diubah menjadi replied",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('') }}/annualreport/sendreport/" + id;
                }
            });
        }


        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('') }}/annualreport/destroypertanyaan/" + id;
                }
            });
        }
    </script>
</x-template.layout>
