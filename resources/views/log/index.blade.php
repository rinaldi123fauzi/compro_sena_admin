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
                    <style>
                        .deleted-value {
                            background-color: #ffebee;
                            padding: 2px 4px;
                            border-radius: 3px;
                            color: #d32f2f;
                        }

                        .old-value {
                            background-color: #ffebee;
                            padding: 2px 4px;
                            border-radius: 3px;
                        }

                        .new-value {
                            background-color: #e8f5e9;
                            padding: 2px 4px;
                            border-radius: 3px;
                        }

                        .list-unstyled {
                            list-style: none;
                            padding-left: 0;
                        }

                        .changed-field {
                            margin-bottom: 5px;
                        }

                        .wrap-text {
                            white-space: normal;
                            word-wrap: break-word;
                            overflow-wrap: break-word;
                            padding: 10px;
                            border: 1px solid #eee;
                            border-radius: 4px;
                            margin-bottom: 8px;
                        }

                        /* Style 2: Dengan background berbeda */
                        .wrap-text {
                            white-space: normal;
                            word-wrap: break-word;
                            overflow-wrap: break-word;
                            background-color: #f8f9fa;
                            padding: 8px 20px;
                            border-radius: 4px;
                            margin-bottom: 5px;
                        }

                        /* Style 3: Dengan garis pemisah */
                        /* .wrap-text {
                            white-space: normal;
                            word-wrap: break-word;
                            overflow-wrap: break-word;
                            padding: 8px 20px;
                            border-bottom: 1px solid #eee;
                        } */

                        /* Untuk teks yang sangat panjang tanpa spasi */
                        .wrap-text strong,
                        .wrap-text span {
                            word-break: break-all;
                        }
                    </style>
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

                                        <th data-ordering="false">User</th>
                                        <th data-ordering="false">Event</th>
                                        <th data-ordering="false">Subject</th>
                                        <th data-ordering="false">Perubahan</th>
                                        <th data-ordering="false">Tanggal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $val)
                                        <tr>

                                            <td>{{ $val->causer->email }} | {{ $val->causer->name }}</td>
                                            <td>
                                                @if ($val->event)
                                                    <span class="badge bg-success">{{ $val->event }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $val->description }}</span>
                                                @endif
                                            </td>
                                            <td>{{ str_replace('_', ' ', class_basename($val->subject_type)) ?? 'N/A' }}
                                            </td>
                                            <td>
                                                @if ($val->description == 'deleted')
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $val->id }}">Selengkapnya
                                                    </button>
                                                    <div class="modal fade" id="deleteModal{{ $val->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Detail
                                                                        Data yang Dihapus</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($val->properties['old'] ?? [] as $key => $oldValue)
                                                                            <li class="changed-field wrap-text">
                                                                                <strong>{{ $key }}:</strong>
                                                                                {{ $oldValue }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($val->description == 'created')
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#createModal{{ $val->id }}">Selengkapnya
                                                    </button>
                                                    <div class="modal fade" id="createModal{{ $val->id }}"
                                                        tabindex="-1" aria-labelledby="createModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="createModalLabel">Detail
                                                                        Data yang Dibuat</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($val->properties['attributes'] ?? [] as $key => $value)
                                                                            <li class="changed-field wrap-text">
                                                                                <strong>{{ $key }}:</strong>
                                                                                <span
                                                                                    class="created-value">{{ $value }}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($val->properties->has('old') && $val->properties->has('attributes'))
                                                    <ul class="list-unstyled">
                                                        @foreach ($val->properties['attributes'] as $key => $newValue)
                                                            @if (isset($val->properties['old'][$key]) && $val->properties['old'][$key] !== $newValue)
                                                                <li class="changed-field">
                                                                    <strong>{{ $key }}:</strong><br>
                                                                    <span
                                                                        class="old-value">{{ $val->properties['old'][$key] }}</span>
                                                                    →
                                                                    <span class="new-value">{{ $newValue }}</span>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    {{-- Tidak ada perubahan --}}
                                                @endif
                                            </td>
                                            <td>{{ $val->created_at->format('d-m-Y H:i:s') }}</td>




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
