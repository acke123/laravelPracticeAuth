
@extends("layout")

@section("title")
    Contacts
@endsection

@section("pageContent")<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">email</th>
        <th scope="col">subject</th>
        <th scope="col">message</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($allContacts as $contact)
        <tr>
            <th scope="row">{{$contact->id}}</th>
            <td>{{$contact->email}}</td>
            <td>{{$contact->subject}}</td>
            <td>{{$contact->message}}</td>
            <td>
                <a class="btn btn-danger" href="{{ route('deleteContact',['contact' => $contact->id]) }}">Delete</a>
                <a class="btn btn-primary">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
