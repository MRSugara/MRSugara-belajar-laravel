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
            <div class="card col-3 mb-3">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Create Category</label>
                            <div class="d-flex justify-content-between">

                                <input type="text" class="form-control mx-1" id="exampleInputEmail1" placeholder="name"
                                    name="name">
                                <button type="submit" class="btn btn-primary mx-1">Submit</button>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </form>
            </div>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', ['id' => $data->id]) }}" method="post">
                                            <a href="{{ route('category.edit', ['id' => $data->id]) }}"
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
