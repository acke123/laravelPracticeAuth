@extends("layout")

@section("title")
    Contact
@endsection


@section("pageContent")
    <form>
        <div class="container lg:flex-row">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" placeholder="email" aria-label="insert Email"
                       aria-describedby="basic-addon2">
            </div>

            <label for="subject_title">Title subject</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="subjectTitle" aria-describedby="basic-addon3">
            </div>

            <label for="textData">Text</label>
            <div class="input-group ">
                <textarea id="textData" class="form-control" aria-label="With textarea"></textarea>
            </div>
            <a class="submit btn btn-info mt-3">Submit</a>
        </div>
    </form>

    <div class="container lg:flex-row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9551.995060076875!2d21.18216677254918!3d44.621050298058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1793102716822!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
@endsection
