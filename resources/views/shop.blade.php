@extends("layout")

@section("title")
    Shop
@endsection


@section("pageContent")
    @foreach($products as $product)
                <p>{{$product->name}}</p>
                <p>{{$product->description}}</p>
                <a class="btn btn-primary" href="{{ route('products.permaLink', ['product' => $product->id]) }}">Info</a>
    @endforeach
@endsection
