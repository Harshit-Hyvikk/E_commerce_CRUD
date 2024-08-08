<!doctype html>
<html lang="en">

<head>
    <title>Update product</title>
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
                <div class="col-12 text-center bg-secondary mt-2">
                    <h3 class="my-2">E-commerce CRUD</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-10  mt-2">
                    <h3 class="my-2">Update Product</h3>
                </div>
                {{-- <div class="col-2  mt-2">
                    <a href="{{route('product.addnew')}}" class=" btn btn-primary my-2">Add New Product</a>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    {{-- @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> --}}
                    @endif

                </div>
            </div>
            <div class="row ">
                <div class="col-12 m-2">
                    <form action="{{ route('allproduct.update', $product->id) }}" method="post"
                        enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="contrainer">
                            <label for="pimage">Uploded Image</label>
                            <div class=" my-3">
                                @foreach ($product->images as $image)
                                    <img src="{{ '/upload/ProductImage/' . $image->image_url }}" id="#output"
                                        class="img-fluid rounded" width="150px" alt="" />
                                @endforeach

                                {{-- <img id="output" src="{{ public_path().'upload/ProductImage/'.$path->image_url }}" alt="image" class=" img-thumbnail" width="200px"> --}}
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="pimage">Product Image</label>
                            {{-- <input type="file" class="form-control mt-2" name="pimage[]" id="pimage[]"
                                aria-describedby="helpId" placeholder="Product Image" multiple> --}}
                            <input type="file" name="pimage[]" id="pimage[]" multiple class="form-control mt-2"
                                onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])"><!-- image/* or .jpg,.png,.jpeg -->

                            @error('pimage')
                                <div class=" text-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="pname">Product Name</label>
                            <input type="text" class="form-control mt-2" name="pname" id="pname"
                                aria-describedby="helpId" placeholder="Product Name" value="{{ $product['name'] }}">
                            @error('pname')
                                <div class=" text-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="pprice">Product Price</label>
                            <input type="text" class="form-control mt-2" name="pprice" id="pprice"
                                aria-describedby="helpId" placeholder="Product Price" value="{{ $product['price'] }}">
                            @error('pprice')
                                <div class=" text-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="pdescroption">Product Decription</label>
                            <textarea class="form-control mt-2" name="pdescroption" id="pdescroption" aria-describedby="helpId"
                                placeholder="Product Description">{{ $product['description'] }}</textarea>
                            @error('pdescroption')
                                <div class=" text-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="pcategory">Product Category</label>
                            <div class="mb-3">
                                <select class="form-select form-select-lg" name="pcategory" id="pcategory">
                                    <option selected>Select one</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id === $product['category_id']) selected @endif>{{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            @error('pcategory')
                                <div class=" text-red">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                    {{-- @foreach ($categories as $category)
                        {{ $category->id }}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </main>




    {{-- <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script> --}}
</body>

</html>
