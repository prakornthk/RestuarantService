<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2  text-center">#</th>
            <th class="px-4 py-2 text-left">Restaurant Name</th>
            <th class="px-4 py-2">Location</th>     
        </tr>
        </thead>
        <tbody>
        @if (isset($export['list']['results']))
            
            @foreach ($export['list']['results'] as $key => $item)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ ++$key }}</td>
                    <td class="border px-4 py-2">
                        {{ $item['name'] }}<br/>
                        <small>{{ $item['formatted_address'] }}</small>
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <x-a-button href="https://www.google.com/maps/place/?q=place_id:{{ $item['place_id'] }}">
                            {{ __('Google Map Location') }}
                        </x-a-button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>

