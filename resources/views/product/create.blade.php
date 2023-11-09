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
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Product">Product</label>
                            <input type="text" class="form-control" id="Product" placeholder="Product name"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-select" aria-label="category" id="category" name="category">
                                <option selected disabled>- Pilih Item -</option>
                                @foreach ($categories as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" id="product_code" placeholder="Product Code"
                                name="product_code">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <input type="text" class="form-control" id="Description" placeholder="Description"
                                name="description">
                        </div>
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input type="text" class="form-control" id="Price" placeholder="Price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="Unit">Unit</label>
                            <input type="text" class="form-control" id="Unit" placeholder="Unit" name="unit">
                        </div>
                        <div class="form-group">
                            <label for="Stock">Stock</label>
                            <input type="text" class="form-control" id="Stock" placeholder="Stock" name="stock">
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
