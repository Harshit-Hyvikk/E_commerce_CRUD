<!doctype html>
<html lang="en">

<head>
    <title>All Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center bg-secondary mt-2 text-white">
                    <h3 class="my-2">E-commerce CRUD</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-10  mt-2">
                    <h3 class="my-2">All Products</h3>
                </div>
                <div class="col-2  mt-2">
                    <a href="{{ route('allproduct.create') }}" class=" btn btn-primary my-2">Add New Product</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Index</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($products as $product)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">{{ $product->image }}</td>
                                    <td scope="row">{{ $product->name }}</td>
                                    <td scope="row">{{ $product->price }}</td>
                                    <td scope="row">{{ $product->description }}</td>
                                    <td scope="row">{{ $product->category->name }}</td>
                                    <td scope="row" class="d-flex gap-2">
                                        <a href="" class="btn btn-primary">View</a>
                                        <a href="" class="btn btn-success">Update</a>
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="container fs-5 text-dark">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

    </main>



    {{-- <footer>
        <!-- place footer here -->
    </footer> --}}




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
