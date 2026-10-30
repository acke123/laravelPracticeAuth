@extends("layout")

@section("title")
    Edit Product
@endsection

@section("pageContent")
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4">Edit Product</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('updateProduct', ['product' => $product->id]) }}">
            @csrf
            <div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                @endif
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name"
                       class="form-control"
                       value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="form-control">{{$product->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" min="0"
                           class="form-control"
                           value="{{ $product->amount }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" id="price" min="0"
                           class="form-control"
                           value="{{ $product->price }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection


