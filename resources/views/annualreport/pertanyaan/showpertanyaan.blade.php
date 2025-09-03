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
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                {{ $pertanyaan->subject }}
                                <br>
                                <span class="badge bg-primary">Permintaan Annual Report Tahun
                                    {{ $pertanyaan->tahun }}</span>

                            </h5>
                            <p>{{ $pertanyaan->message }}</p>

                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                <i class="ri-mail-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Email :</p>
                                            <h6 class="text-truncate mb-0">{{ $pertanyaan->email }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6 col-md-3">
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                <i class="ri-user-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Email :</p>
                                            <h6 class="text-truncate mb-0">{{ $pertanyaan->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                <i class="ri-phone-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Nomor Handphone :</p>
                                            <h6 class="text-truncate mb-0">{{ $pertanyaan->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                <i class="ri-building-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Company :</p>
                                            <h6 class="text-truncate mb-0">{{ $pertanyaan->company }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
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



                    <div class="card">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert" style="margin-bottom: 20px;">
                                <strong> Sukses! </strong> {{ session('message') }}.
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Balas</h5>
                            <form method="POST" id="replyForm"
                                action="{{ url('') }}/annualreport/updatepertanyaan/{{ $pertanyaan->id }}"
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
