@extends('layout.admin.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Banner</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('banner.create') }}" class="btn btn-success mb-2">Add Banner</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($banner as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="" style="width: 730px; height: 270px;">
                                        <img src="{{ Storage::url($item->banner) }}" class="w-100 h-100" alt="">
                                    </td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('banner.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('banner.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Bạn có muốn xóa không')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
