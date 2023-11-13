@extends('partials.main')
@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
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
                <form action="{{ route('product.update', $products->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product name"
                                name="name" value="{{ $products->name }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-select" aria-label="category" id="category" name="category">
                                <option selected disabled>- Pilih Item -</option>
                                @foreach ($categories as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $products->category_id == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Code"
                                name="product_code" value="{{ $products->product_code }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description"
                                name="description" value="{{ $products->description }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Price"
                                name="price" value="{{ $products->price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Unit</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Unit"
                                name="unit" value="{{ $products->unit }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stock</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Stock"
                                name="stock" value="{{ $products->stock }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">{{ $product->image }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
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
