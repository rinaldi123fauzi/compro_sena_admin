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

                                        <th data-ordering="false">Kode Proyek</th>
                                        <th data-ordering="false">Vendor</th>
                                        <th data-ordering="false">Regional</th>
                                        <th data-ordering="false">Project</th>
                                        <th data-ordering="false">NOMOR PO</th>
                                        <th data-ordering="false">TANGGAL PO</th>
                                        <th data-ordering="false">NILAI PO</th>
                                        <th data-ordering="false">OPR</th>
                                        <th data-ordering="false">Ring/Type</th>
                                        <th data-ordering="false">SONUMB</th>
                                        <th data-ordering="false">SITE ID</th>
                                        <th data-ordering="false">SITE NAME</th>
                                        <th data-ordering="false">NOMOR SPK</th>
                                        <th data-ordering="false">REMARK SPK</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyek as $item)
                                        <tr>

                                            <td>{{ $item->kodeproyek }}</td>
                                            <td>{{ $item->namavendor }}</td>
                                            <td>{{ $item->namaregional }}</td>
                                            <td>{{ $item->namaproject }}</td>
                                            <td>{{ $item->ponomor }}</td>
                                            <td>{{ $item->potanggal }}</td>
                                            <td>@currency($item->nilaipo)</td>
                                            <td>{{ $item->opr }}</td>
                                            <td>{{ $item->ring }}</td>
                                            <td>{{ $item->sonumb }}</td>
                                            <td>{{ $item->siteid }}</td>
                                            <td>{{ $item->sitename }}</td>
                                            <td>{{ $item->spknomor }}</td>
                                            <td>{{ $item->spkremark }}</td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/proyek/edit/{{ $item->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/proyek/destroy/{{ $item->id }}">
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
</x-template.layout>
