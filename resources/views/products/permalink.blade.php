@extends("layout")

@section("title")
    Permalink
@endsection

@section("pageContent")
    <p>{{$product->name}}</p>
    <form method="POST" action="{{ route('cartAdd') }}">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="number" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection
