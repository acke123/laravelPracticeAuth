@extends("layout")

@section("title")
    Shop
@endsection


@section("pageContent")
    @foreach($cart as $product => $amount)
        <p>{{$product}} - {{$amount}}</p>
    @endforeach
@endsection
