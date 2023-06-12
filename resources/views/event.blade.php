<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Event Example</title>

    @vite(['resources/css/app.css'])

    @livewireStyles
</head>
<body>
    <div class="container mx-auto mt-8">
        <button id="create-event" type="submit" class="px-4 py-2 ml-2 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600">Create Event</button>
        <div id="event-response"></div>
    </div>

    {{--
    <div id="event-message" class="container mx-auto mt-8 hidden">
        <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg">
            <p id="event-message-text" class="text-gray-800"></p>
        </div>
    </div>
    --}}

    <livewire:dummy-books-list-component :books="[['title' => 'init1', 'image' => 'image1'],['title' => 'init2', 'image' => 'image2'],['title' => 'init3', 'image' => 'image3']]"/>

    @livewireScripts

    @vite(['resources/js/app.js'])

    <script type="module">
        window.onload=function (){

            // CSRF token for axios
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            } else {
                //console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
            }

            // Axios post request on button click
            document.getElementById('create-event').addEventListener('click', function() {
                axios.post('/event')
                    .then(response => {
                        console.log(response);
                        // Display the response in the #event-response div
                        //document.getElementById('event-response').textContent = JSON.stringify(window.books);
                    });
            });

        }
    </script>
</body>
</html>
