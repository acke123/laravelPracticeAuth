@extends("layout")

@section("title")
    Shop
@endsection


@section("pageContent")
    @if(!empty($cart))
    @foreach($cart as $product)
        <p>{{$product['productName']}} - Kolicina: {{$product['amount']}}, Cena: {{$product['productPrice']}}  - Ukupna cena: {{$product['amount'] * $product['productPrice']}}</p>
    @endforeach
    @endif
    <div class="container">
    <a class="btn btn-primary" href="{{route('cartFinish')}}">Order</a>
    <a class="btn btn-primary" href="{{route('home')}}">Back to homepage</a>
    </div>
@endsection
