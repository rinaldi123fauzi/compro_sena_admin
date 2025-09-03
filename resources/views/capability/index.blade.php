<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Capability</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Capability</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('success') }}.
                            </div>
                        @endif
                        <div class="card-header">
                            <a href="{{ route('capability.add') }}" class="btn btn-primary">
                                <i class="ri-add-line align-middle me-1"></i> Tambah Capability
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Icon</th>
                                        <th data-ordering="false">Title</th>
                                        <th data-ordering="false">Description</th>
                                        <th data-ordering="false">Layanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capabilities as $capability)
                                        <tr>
                                            <td>
                                                @if ($capability->icon_url)
                                                    <img src="{{ $capability->icon_url }}"
                                                        alt="{{ $capability->title }}" class="img-thumbnail"
                                                        style="max-width: 50px; max-height: 50px;">
                                                @else
                                                    <span class="text-muted">No icon</span>
                                                @endif
                                            </td>
                                            <td>{{ $capability->title }}</td>
                                            <td>{{ Str::limit(strip_tags($capability->description), 100) }}</td>
                                            <td>
                                                <span class="badge bg-info">{{ $capability->layanans->count() }}
                                                    Layanan</span>
                                                <a href="{{ route('layanan.index', $capability->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ri-list-line"></i> Lihat
                                                </a>
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
                                                                href="{{ route('capability.edit', $capability->id) }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route('capability.destroy', $capability->id) }}">
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
