@extends("layout")

@section("title")
    Dashboard
@endsection


@section("pageContent")
    @if($hours >= 0 && $hours < 12)
        <p>Good morning!</p>
    @else
        <p>Good afternoon!</p>
    @endif
    <p>Trenutno vreme je: {{ $currentTime }}</p>
    <p>Sati: {{$hours}} h</p>

    @foreach($lastProducts as $product)
        <p>{{$product->name}}</p>
        <p>{{$product->description}}</p>
    @endforeach

    <form method="POST" action="/send-contact">
        @if($errors->any())
            <p>Error {{$errors->first()}}</p>
        @endif
        @csrf
        <input name="email" type="email" placeholder="Unesite vasu email adresu">
        <input name="subject" type="text" placeholder="Unesite naslov poruke">
        <textarea name="description"></textarea>
        <button>Posalji poruku</button>
    </form>
@endsection
