<div class="border-2 border-green-300 p-4 m-4">

    <h2 class="text-center font-bold text-green-300">Books Search List Child Component</h2>
    <h2 class="text-center font-bold text-green-300">(API Service Data)</h2>

    <br/>

    <div class="">
        <ul>
            @foreach($books as $book)
            <li class="font-bold p-2">{{$book->title}}</li>
            @endforeach
        </ul>
    </div>

</div>


