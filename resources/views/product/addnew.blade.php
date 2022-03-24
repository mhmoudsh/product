<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table td,
        table tr {
            vertical-align: middle;
        }

    </style>

    <title>NewProduct</title>
</head>

<body>
    <div class="container my-5 ">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1><i class="fas fa-plus-circle"></i> Insert New Products </h1>
            </div>
            <a onclick="history.back()" class="btn btn-dark px-5">Return</a>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif

        {{-- productname price image discription --}}
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="Product Name" class="form-control">

            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price" placeholder=" Price" class="form-control">

            </div>
            <div class="mb-3">
                <label>Add product image</label>
                <input type="file" name="image" class="form-control">

            </div>
            <div class="mb-3">
                <label>Dscription</label>
                <textarea id="description" name="description" placeholder="Description" class="form-control" rows="4"></textarea>

            </div>
            <button class="btn btn-success btn-lg px-5 ">Add </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"
        integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'code'
        });
        setTimeout(() => {
            $('.alert').fadeOut()
        }, 3000);
    </script>

</body>
{{-- $@dump($_GET) --}}

</html>
