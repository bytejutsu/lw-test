<div class="border p-4 m-4">
    <h2>Parent Component</h2>

    <hr/>

    <p>Book Title: {{ $book['title'] }}</p>
    <p>Book Author: {{ $book['author'] }}</p>

    <hr/>

    <p>EBook Title: {{ $eBook['title'] }}</p>
    <p>EBook Author: {{ $eBook['author'] }}</p>

    <hr/>

    <livewire:child-component/>

</div>
