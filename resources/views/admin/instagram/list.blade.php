<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data Instagram</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Instagram</a></li>
                                <li class="breadcrumb-item active">List</li>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Data Instagram</h5>
                                <a href="{{ route('instagram.add') }}" class="btn btn-primary">
                                    <i class="ri-add-line align-bottom me-1"></i> Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Image</th>
                                        <th data-ordering="false">Caption</th>
                                        <th data-ordering="false">Tanggal Posting</th>
                                        <th data-ordering="false">URL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instagrams as $instagram)
                                        <tr>
                                            <td>
                                                @if (!empty($instagram->image))
                                                    <img src="{{ asset('storage/instagram/' . $instagram->image) }}"
                                                        alt=""
                                                        style="width: 80px; height: 80px; object-fit: cover;">
                                                @else
                                                    <span class="badge bg-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($instagram->caption, 50) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($instagram->tanggal_posting)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ $instagram->url }}" target="_blank" class="text-primary">
                                                    {{ \Illuminate\Support\Str::limit($instagram->url, 30) }}
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
                                                                href="{{ route('instagram.edit', $instagram->id) }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route('instagram.destroy', $instagram->id) }}">
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
