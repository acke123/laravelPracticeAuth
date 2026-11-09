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
@endsection
