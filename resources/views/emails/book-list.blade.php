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
    @if(empty($books))
        <div class="font-bold p-2 overflow-auto whitespace-normal text-center">No Results</div>
    @else
        <ul>
            @foreach($books as $book)
                <li class="divide-y-2">
                    <div class="flex flex-row justify-start items-center space-x-2">
                        @if($showBookImage)
                            <img class="object-contain h-24 w-12" src="{{$book['image']}}" alt="book-image">
                        @endif
                        <span class="w-96 font-bold p-2 overflow-auto whitespace-normal">{{$book['title']}}</span>
                    </div>
                    <div class="divider"></div>
                </li>
            @endforeach
        </ul>
    @endif
</ul>
</body>
</html>
