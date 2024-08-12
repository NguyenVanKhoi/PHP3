@extends('layout.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Banner</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('banner.update', $banners->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Banner</label>
                            <img src="{{ Storage::url($banners->banner) }}" width="100px" height="100px" alt="">
                            <input type="file" class="form-control" name="banner">
                            @error('banner')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
