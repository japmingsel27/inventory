@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('products.index') }}">Products</a>
                                    </li>
                                </ul>
                            </div>

                        </nav>
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Add Product
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form method="POST" action="{{ route('products.addProduct') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="pname" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" name='pname' id="pname"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="desc" class="form-label">Description</label>
                                                <input type="text" class="form-control" name='desc' id="desc"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="unit" class="form-label">Unit</label>
                                                <input type="text" class="form-control" name='unit' id="unit"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" class="form-control" name='price' id="price"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->pname }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>





@endsection
