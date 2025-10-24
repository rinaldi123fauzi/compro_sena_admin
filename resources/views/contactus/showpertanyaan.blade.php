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
                <!-- Kolom 1: Pesan -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0 text-white">Isi Pesan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium" style="width: 200px;">Subject</td>
                                            <td>{{ $pertanyaan->subject }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Nama</td>
                                            <td>{{ $pertanyaan->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Email</td>
                                            <td>{{ $pertanyaan->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Nomor Handphone</td>
                                            <td>{{ $pertanyaan->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Perusahaan</td>
                                            <td>{{ $pertanyaan->company ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" style="vertical-align: top;">Pesan</td>
                                            <td>
                                                <div>{!! nl2br(e($pertanyaan->message)) !!}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>

                    @if ($pertanyaan->reply_subject)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Balasan</h5>
                                <p>{!! $pertanyaan->reply_message !!}</p>
                                <!--end row-->
                                @if ($pertanyaan->reply_attachment)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-4">
                                                <a href="{{ url('') }}/upload/file/{{ $pertanyaan->reply_attachment }}"
                                                    class="btn btn-primary" download>Download File</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!--end card-body-->
                        </div>
                    @endif
                </div>

                <!-- Kolom 2: Form Balas -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0 text-white">Balas Pesan</h5>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert" style="margin: 20px 20px 0;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" id="replyForm"
                                action="{{ url('') }}/contact-us/updatepertanyaan/{{ $pertanyaan->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="reply_subject" name="reply_subject"
                                        value="{{ old('reply_subject') }}">

                                    @error('reply_subject')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">Message</label>

                                    <textarea class="ckeditor-classic" name="reply_message"></textarea>

                                    @error('content')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="validationDefault01" class="form-label">File</label>

                                    <input type="file" class="form-control" id="file" name="file">

                                    @error('file')
                                        <div class="error-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12" style="padding:20px; text-align:right;">
                                    <button class="btn btn-primary" type="button" onclick="confirmSubmit()">Kirim
                                        Pesan</button>
                                </div>
                            </form>


                        </div>
                        <!-- end card body -->
                    </div><!-- end card -->
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSubmit() {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin mengirim pesan ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('replyForm').submit();
                }
            });
        }
    </script>
</x-template.layout>
