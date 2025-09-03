<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Software & Equipment Management</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Management</a></li>
                                <li class="breadcrumb-item active">Software & Equipment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong> Sukses! </strong> {{ session('success') }}.
                            </div>
                        @endif

                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Software & Equipment List</h4>
                            <div class="flex-shrink-0">
                                <a href="{{ route('software_hardware.create') }}" class="btn btn-primary">
                                    <i class="ri-add-line align-middle me-1"></i> Add New
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col" style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($softwareHardwares as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($item->image_url)
                                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                                                            class="avatar-xs rounded-circle me-2"
                                                            style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <div
                                                            class="avatar-xs bg-light rounded-circle me-2 d-flex align-items-center justify-content-center">
                                                            <i class="ri-image-line text-muted"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $item->title }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $item->type == 'software' ? 'primary' : 'success' }}">
                                                        {{ ucfirst($item->type) }}
                                                    </span>
                                                </td>
                                                <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <a href="{{ route('software_hardware.edit', $item) }}"
                                                            class="link-success fs-15">
                                                            <i class="ri-edit-2-line"></i>
                                                        </a>
                                                        <form action="{{ route('software_hardware.destroy', $item) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-link link-danger fs-15 p-0"
                                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No software/Equipment items
                                                    found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.layout>
