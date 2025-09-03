<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Layanan - {{ $capability->title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('capability.index') }}">Capability</a></li>
                                <li class="breadcrumb-item active">Layanan</li>
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
                            <a href="{{ route('layanan.add', $capability->id) }}" class="btn btn-primary">
                                <i class="ri-add-line align-middle me-1"></i> Tambah Layanan
                            </a>
                            <a href="{{ route('capability.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-left-line align-middle me-1"></i> Kembali ke Capability
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Title</th>
                                        <th data-ordering="false">Description</th>
                                        <th data-ordering="false">Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanans as $layanan)
                                        <tr>
                                            <td>{{ $layanan->title }}</td>
                                            <td>{{ Str::limit(strip_tags($layanan->description), 100) }}</td>
                                            <td>
                                                <span class="badge bg-primary">{{ $layanan->type }}</span>
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
                                                                href="{{ route('layanan.edit', [$capability->id, $layanan->id]) }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route('layanan.destroy', [$capability->id, $layanan->id]) }}">
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
