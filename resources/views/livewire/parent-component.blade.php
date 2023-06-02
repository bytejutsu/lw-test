<div class="border p-4 m-4">
    <h2 class="text-center font-bold">Parent Component</h2>

    <hr/>

    <p>Book Title: {{ $book['title'] }}</p>
    <p>Book Author: {{ $book['author'] }}</p>

    <hr/>

    {{-- notice how you need to use the php $this to access to value in case of a computed property --}}

    <p>ABook title letter count : {{ $this->aBookTitleLetterCount }}</p>

    <hr/>

    <br/>

    {{--
    <p>EBook Title: {{ $eBook->title }}</p>
    <p>EBook Author: {{ $eBook->author }}</p>
    --}}

    {{-- it also works in the blade view for eloquent model objects to be accessed as arrays --}}



    <p>EBook Title: {{ $eBook['title'] }}</p>
    <p>EBook Author: {{ $eBook['author'] }}</p>

    <hr/>

    <p>eBook title letter count : {{ $this->eBookTitleLetterCount }}</p>

    <hr/>

    <br/>

    <livewire:child-component/>

</div>
