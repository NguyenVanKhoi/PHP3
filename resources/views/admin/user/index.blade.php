@extends('layout.admin.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Addres</th>
                                <th>Avatar</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Phone</th>
                                <th>Role</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Addres</th>
                                <th>Avatar</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Phone</th>
                                <th>Role</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->avatar) }}" alt="">
                                    </td>
                                    <td>
                                        @if ($item->gender == 1)
                                            Nam
                                        @elseif($item->gender == 2)
                                            Nữ
                                        @else
                                            Khác
                                        @endif
                                    </td>
                                    <td>{{ $item->birthdate }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <form action="{{ route('user.update', $item->id) }}" class="d-flex" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="role" class="form-control" id="">
                                                <option value="0" @if ($item->role == 0) selected @endif>
                                                    Admin
                                                </option>
                                                <option value="1" @if ($item->role == 1) selected @endif>
                                                    User
                                                </option>
                                            </select>
                                            <button type="submit" class="btn btn-warning">
                                                Sửa
                                            </button>
                                        </form>
                                        {{-- @if ($item->role == 0)
                                            Admin
                                        @else
                                            User
                                        @endif --}}
                                    </td>
                                    {{-- <th>
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    </th> --}}
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
