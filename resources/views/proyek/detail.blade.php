<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Task Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Tasks</a>
                                </li>
                                <li class="breadcrumb-item active">Task Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-3">
                    {{-- <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title mb-3 flex-grow-1 text-start">
                                Time Tracking
                            </h6>
                            <div class="mb-2">
                                <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop"
                                    colors="primary:#405189,secondary:#02a8b5"
                                    style="width: 90px; height: 90px"></lord-icon>
                            </div>
                            <h3 class="mb-1">9 hrs 13 min</h3>
                            <h5 class="fs-15 mb-4">Profile Page Satructure</h5>
                            <div class="hstack gap-2 justify-content-center">
                                <button class="btn btn-danger btn-sm">
                                    <i class="ri-stop-circle-line align-bottom me-1"></i>
                                    Stop
                                </button>
                                <button class="btn btn-secondary btn-sm">
                                    <i class="ri-play-circle-line align-bottom me-1"></i>
                                    Start
                                </button>
                            </div>
                        </div>
                    </div> --}}
                    <!--end card-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-card">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">KODE PROYEK</td>
                                            <td>{{ $dataproyek->kodeproyek }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">VENDOR</td>
                                            <td>{{ $dataproyek->namavendor }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">REGIONAL</td>
                                            <td>{{ $dataproyek->namaregional }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">PROJECT</td>
                                            <td>{{ $dataproyek->namaproject }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">OPR</td>
                                            <td>{{ $dataproyek->opr }}</td>
                                        </tr>

                                        <tr>
                                            <td class="fw-medium">RING / TYPE</td>
                                            <td>{{ $dataproyek->ring }}</td>
                                        </tr>

                                        <tr>
                                            <td class="fw-medium">SONUMB</td>
                                            <td>{{ $dataproyek->sonumb }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">SITE ID</td>
                                            <td>{{ $dataproyek->siteid }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">SITE NAME</td>
                                            <td>{{ $dataproyek->sitename }}</td>
                                        </tr>



                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                    <!--end card-->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">SPK</h5>
                            <div class="table-card">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">NOMOR</td>
                                            <td>{{ $dataproyek->spknomor }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">REMARK</td>
                                            <td>{{ $dataproyek->spkremark }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">PO</h5>
                            <div class="table-card">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">NOMOR</td>
                                            <td>{{ $dataproyek->ponomor }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">TANGGAL</td>
                                            <td>{{ $dataproyek->potanggal }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!---end col-->
                <div class="col-xxl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-muted">
                                <h6 class="mb-3 fw-bold text-uppercase">Summary</h6>
                                <p>
                                    It will be as simple as occidental in fact, it will be
                                    Occidental. To an English person, it will seem like
                                    simplified English, as a skeptical Cambridge friend of
                                    mine told me what Occidental is. The European languages
                                    are members of the same family. Their separate existence
                                    is a myth. For science, music, sport, etc, Europe uses
                                    the same vocabulary. The languages only differ in their
                                    grammar, their pronunciation and their most common
                                    words.
                                </p>

                            </div>
                        </div>
                    </div>
                    <!--end card-->

                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
</x-template.layout>
