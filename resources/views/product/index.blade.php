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
            <a href="{{ route('product.create') }}">
                <button class="btn btn-primary mb-2">Create</button>
            </a>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Product Code</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->stock }}</td>


                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                            class="badge bg-warning"><i class="nav-icon far fa-edit"></i></span></a>
                                        <a href="/product/delete/{{ $product->id }}" class="badge bg-danger"><i
                                                class="nav-icon fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
