@extends('layout.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input disabled type="text" class="form-control" value="{{ $user->name }}"
                                name="user_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <img src="{{ Storage::url($user->avatar) }}" width="100px" height="100px" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input disabled type="text" class="form-control" value="{{ $user->email }}" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input disabled type="text" class="form-control" value="{{ $user->address }}" name="address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <input disabled type="text" class="form-control"
                                value="@if ($user->gender == 1) Nam
                                @elseif($user->gender == 2)
                                Nữ
                                @else 
                                khác @endif"
                                name="sale_price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Birthdate</label>
                            <input disabled type="date" class="form-control" value="{{ $user->birthdate }}"
                                name="birthdate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input disabled type="text" class="form-control" value="{{ $user->phone }}" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-control" name="role" id="">
                                <option value="0" @if ($user->role == 0) selected @endif>Admin</option>
                                <option value="1" @if ($user->role == 1) selected @endif>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
