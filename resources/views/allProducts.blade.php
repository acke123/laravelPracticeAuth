
@extends("layout")

@section("title")
    Products
@endsection

@section("pageContent")
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">amount</th>
            <th scope="col">price</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
    @foreach($allProducts as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('deleteProduct', ['product' => $product->id]) }}">Delete</a>
                    <a class="btn btn-primary" href="{{ route('singleProduct', ['product' => $product->id]) }}">Edit</a>
                </td>
            </tr>
    @endforeach
            </tbody>
        </table>

@endsection
