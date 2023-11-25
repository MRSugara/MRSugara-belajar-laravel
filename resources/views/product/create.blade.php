@extends('partials.main')
@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('product') }}">
            <button class="btn btn-success mb-2">back</button>
        </a>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="Product">Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="Product" placeholder="Product name" name="name">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" aria-label="category" id="category" name="category">
                            <option selected disabled>- Pilih Item -</option>
                            @foreach ($categories as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control @error('product_code') is-invalid @enderror" id="product_code" placeholder="Product Code" name="product_code">
                        @error('product_code')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" placeholder="Description" name="description">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="Price" placeholder="Price" name="price">
                        @error('price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Unit">Unit</label>
                        <input type="text" class="form-control @error('unit') is-invalid @enderror" id="Unit" placeholder="Unit" name="unit">
                        @error('unit')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Stock">Stock</label>
                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="Stock" placeholder="Stock" name="stock">
                        @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Multiple files input example</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <!-- /.card -->


        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
