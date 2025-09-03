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
                                style="width: 50%">
                                <thead>
                                    <tr>

                                        <th data-ordering="false">Title</th>
                                        {{-- <th data-ordering="false">Description</th> --}}
                                        <th data-ordering="false">Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capabilities as $capability)
                                        <tr>

                                            <td>{{ $capability->title }}</td>
                                            {{-- <td>{{ $capability->description }}</td> --}}
                                            <td>
                                                <img src="{{ asset('storage/capabilities/' . $capability->image) }}"
                                                    alt="" style="height: 80px; ">
                                            </td>
                                            <td>
                                                <a class="edit-item-btn"
                                                    href="{{ url('') }}/home/capability_edit/{{ $capability->id }}"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                </a>

                                                <a class="remove-item-btn" onclick="return confirm('Are you sure?')"
                                                    href="{{ url('') }}/home/capability_destroy/{{ $capability->id }}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>

                                                </a>


                                                {{-- <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                                href="{{ url('') }}/home/capability_edit/{{ $capability->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ url('') }}/home/capability_destroy/{{ $capability->id }}">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> --}}
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
