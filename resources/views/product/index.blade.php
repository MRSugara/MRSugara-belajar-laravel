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
                                <th>Image</th>
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
                                    @if ($product->image)
                                        <td>
                                            <img src="{{ asset('storage/image/' . $product->image) }}"
                                                alt="{{ $product->name }}" style="max-width: 50px">
                                        </td>
                                    @else
                                        <td>Tidak ada gambar</td>
                                    @endif




                                    <td>

                                        <form action="{{ route('product.destroy', ['id' => $product->id]) }}"
                                            method="post">
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                                class="btn btn-warning btn-sm"
                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span
                                                    data-feather="edit" width="17px" height="17px"></span> </a>
                                            @csrf
                                            <button class="btn btn-danger btn-sm"
                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span
                                                    data-feather="trash-2" width="17px"height="17px"></span></button>
                                        </form>

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
