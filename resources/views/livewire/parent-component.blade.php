<div class="border-4 border-black p-4 m-4">
    <h2 class="text-center font-bold">Parent Component</h2>

    <br/>

    <p>Book Title: {{ $aBook['title'] }}</p>
    <p>Book Author: {{ $aBook['author'] }}</p>

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

    <p>book Title: {{ $book->title }}</p>
    <p>book Author: {{ $book->author }}</p>

    <hr/>

    <p>book title letter count : {{ $this->bookTitleLetterCount }}</p>

    <hr/>

    <br/>

    {{-- renamed parameter eBook to initEBook to avoid typehinting inside the child component class because $eBook is passed as array --}}
    <livewire:child-component :aBook="$aBook" :initEBook="$eBook" :book="$book"/>


</div>
