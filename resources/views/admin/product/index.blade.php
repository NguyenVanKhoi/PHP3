@extends('layout.admin.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Product</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('product.create') }}" class="btn btn-success mb-2">Add Product</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Price Sale</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Price Sale</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" width="100px" height="100px"
                                            alt="">
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->sale_price ? number_format($item->sale_price, 0, ',', '.') : 'không được sale' }}
                                    </td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="post">
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
