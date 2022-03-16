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

        /* .box {
            position: relative;
        } */

    </style>

    <title>product</title>
</head>

<body>
    <div class="container my-5 ">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1><i class="fa-solid fa-sm fa-bag-shopping "></i> products</h1>
                <a href="{{ route('product.create') }}" class=" btn btn-primary px-5">Add New</a>

            </div>


            <form class="d-flex align-items-center" action="" method="GET" id="filter_form">
                Items Per page

                @if (request()->page)
                    <input type="hidden" name="page" value="{{ request()->page }}" />
                @endif


                <select id="items_count" name="items_count" class="mx-2">
                    <option>5</option>
                    <option {{ request()->items_count == 10 ? 'selected ' : '' }}>10</option>
                    <option {{ request()->items_count == 15 ? 'selected ' : '' }}>15</option>
                    <option {{ request()->items_count == 20 ? 'selected ' : '' }}>20</option>
                    <option {{ request()->items_count == 25 ? 'selected ' : '' }}>25</option>
                    <option {{ request()->items_count == 50 ? 'selected ' : '' }}>50</option>
                </select>

                {{-- <button class="btn btn-info btn-sm">go</button> --}}

            </form>
        </div>

        <table class="table table-bordered table-striped">
            <tr class="table-info">
                <th>ID</th>
                <th>name</th>
                <th>price</th>
                <th>image</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>action</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->productname }}</td>
                    <td>{{ $product->price }}$</td>
                    <td><img width="80" src="{{ $product->image }}" alt=""></td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="#"> <i class="fas fa-edit "></i> </a>
                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach

        </table>
        {{ $products->appends($_GET)->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('#items_count').change(function() {
            // alert($('#items_count').val())
            $('#filter_form').submit();
        })
    </script>


</body>
{{-- $@dump($_GET) --}}

</html>
