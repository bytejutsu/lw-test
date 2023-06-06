<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book List Email</title>
</head>
<body>
<h2>Book List</h2>
<p>Here is the list of books you requested:</p>

<ul>
    @foreach($books as $book)
        <li>
            {{ $book->title }} : {{$book->author }}

            {{--
            {{ $book['name'] }} : {{$book['author']}}

            @if(isset($book['image']) && $showImage)
                <img src="{{ asset('images/'.$book['image']) }}" alt="Book Image">
            @endif
            --}}
        </li>
    @endforeach
</ul>
</body>
</html>
