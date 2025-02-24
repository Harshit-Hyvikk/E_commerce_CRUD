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

                <div class="card">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
                        <div class="container d-flex gap-3">

                            @foreach ($product->images as $image)
                                <img src="{{ '/upload/ProductImage/' . $image->image_url }}" class="img-fluid rounded"
                                    width="100px" alt="" />
                            @endforeach
                        </div>

                        <div class="container">
                            <p>Product Name: {{ $product->name }}</p>
                            <p>Product Price: {{ $product->price }}</p>
                            <p>Product Category: {{ $product->category->name }}</p>
                        </div>
                        <a href="{{ route('allproduct.index') }}" class="btn btn-primary">Back</a>
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
