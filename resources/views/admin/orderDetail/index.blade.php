@extends('layout.admin.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Order Detail</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('order.index') }}" class="btn btn-dark mb-2">Back</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product_variant_id</th>
                                <th>Order_id </th>
                                <th>Product_name</th>
                                <th>Product_price</th>
                                <th>Product_image</th>
                                <th>Product_sale_price</th>
                                <th>Variant_size_name</th>
                                <th>Pariant_color_name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Product_variant_id </th>
                                <th>Order_id </th>
                                <th>Product_name</th>
                                <th>Product_price</th>
                                <th>Product_image</th>
                                <th>Product_sale_price</th>
                                <th>Variant_size_name</th>
                                <th>Pariant_color_name</th>
                                <th>Quantity</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($orderDetail as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_variant_id }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ number_format($item->product_price, 0, ',', '.') }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->product_image) }}" width="100px" height="100px"
                                            alt="">
                                    </td>
                                    <td>{{ number_format($item->product_sale_price, 0, ',', '.') }}</td>
                                    <td>{{ $item->variant_size_name }}</td>
                                    <td>{{ $item->variant_color_name }}</td>
                                    <td>{{ $item->quantity }}</td>
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
