<div class="m-4">
    <x-maps-leaflet
                    style="height: 400px;"
                    :centerPoint="['lat' => 33.95, 'long' => 9.55]"
                    :zoomLevel="6"
                    :markers=$markers
    >

    </x-maps-leaflet>
</div>
