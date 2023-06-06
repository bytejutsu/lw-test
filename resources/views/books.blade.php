<x-app-layout>
    <div class="">
        <ul>
            @foreach($books as $book)
               <li>{{$book}}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
