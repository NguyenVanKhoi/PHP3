@extends('layout.admin.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Address</th>
                                <th>User Phone</th>
                                <th>Receiver Name</th>
                                <th>Receiver Email</th>
                                <th>Receiver Address</th>
                                <th>Receiver Phone</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Address</th>
                                <th>User Phone</th>
                                <th>Receiver Name</th>
                                <th>Receiver Email</th>
                                <th>Receiver Address</th>
                                <th>Receiver Phone</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Total Price</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('order.show', $item->id) }}" class="btn btn-primary">
                                            {{ $item->id }}
                                        </a>
                                    </td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->user_email }}</td>
                                    <td>{{ $item->user_address }}</td>
                                    <td>{{ $item->user_phone }}</td>
                                    <td>{{ $item->receiver_email }}</td>
                                    <td>{{ $item->receiver_name }}</td>
                                    <td>{{ $item->receiver_address }}</td>
                                    <td>{{ $item->receiver_phone }}</td>
                                    <td>
                                        <form action="{{ route('order.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="order_status" class="form-select-lg" id="">
                                                @foreach ($orderStatus as $key => $value)
                                                    <option {{ $key == $item->order_status ? 'selected' : '' }}
                                                        value="{{ $key }}">
                                                        {{ $value }}</option>
                                                @endforeach
                                                {{-- 
                                                {{ $item->order_status }} --}}
                                            </select>
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                    </td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                    <td class="d-flex justify-content-around">
                                        {{-- <a href="" class="btn btn-warning">Edit</a> --}}
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
