<title>{{ $page['title'] }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
@foreach ($page['meta'] as $key => $meta)
    @php
        $keys = array_keys($meta);
        echo '<meta ' . $keys[0] . '="' . $meta[$keys[0]] . '" ' . $keys[1] . '="' . $meta[$keys[1]] . '" ' . '>';
    @endphp
@endforeach
