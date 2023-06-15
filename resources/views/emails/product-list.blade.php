<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product List Email</title>
</head>
<body>
<h2>Product List</h2>
<p>Here is the list of products you requested:</p>

<ul>
    @if(empty($products))
        <div class="font-bold p-2 overflow-auto whitespace-normal text-center">No Results</div>
    @else
        <ul>
            @foreach($products as $product)
                <li class="divide-y-2">
                    <div class="flex flex-row justify-start items-center space-x-2">
                        @if($showProductImage)
                            <img class="object-contain h-24 w-12" src="{{$product['image']}}" alt="book-image">
                        @endif
                        <span class="w-96 font-bold p-2 overflow-auto whitespace-normal">{{$product['title']}}</span>
                    </div>
                    <div class="divider"></div>
                </li>
            @endforeach
        </ul>
    @endif
</ul>
</body>
</html>
