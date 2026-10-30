@extends("layout")

@section("title")
    Shop
@endsection


@section("pageContent")
    @foreach($products as $product)
                <p>{{$product->name}}</p>
                <p>{{$product->description}}</p>
    @endforeach
@endsection
