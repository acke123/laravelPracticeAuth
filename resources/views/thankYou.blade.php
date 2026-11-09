@extends("layout")

@section("title")
    Thank you page
@endsection


@section("pageContent")
    <div class="container">
        <p>Your order has been successfully created</p>
        <p>Thank you for yout trust</p>
        <a href="{{route('home')}}">Back to homepage</a>
    </div>
@endsection
