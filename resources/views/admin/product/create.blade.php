@extends('layout.admin.main')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price Sale </label>
                            <input type="number" class="form-control" name="sale_price">
                            @error('sale_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <select name="category_id" class="form-control" id="">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product Variant</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Image</th>
                                {{-- <th>Price</th> --}}
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $amount = 4;
                            @endphp
                            @for ($i = 1; $i <= $amount; $i++)
                                <tr>
                                    <td>
                                        <select name="product_variants[{{ $i }}][color]" class="form-control">
                                            @foreach ($colors as $item)
                                                <option value="{{ $item->id }}">{{ $item->color }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="product_variants[{{ $i }}][size]" class="form-control">
                                            @foreach ($sizes as $item)
                                                <option value="{{ $item->id }}">{{ $item->size }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="file" name="product_variants[{{ $i }}][image]"
                                            class="form-control">
                                    </td>
                                    {{-- <td>
                                        <input type="number" min="1" value="1"
                                            name="product_variants[{{ $i }}][price]" class="form-control">
                                    </td> --}}
                                    <td>
                                        <input type="number" min="1" value="1"
                                            name="product_variants[{{ $i }}][quantity]" class="form-control">
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    {{-- <button class="btn btn-success">Add product variant</button> --}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
