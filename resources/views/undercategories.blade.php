<option value="{{$category->id}}">{{$prefix}} {{$category->name}}</option>

    @if ($category->underCategory->isNotEmpty())

        @foreach ($category->underCategory as $alt_category)
            @include('undercategories', ['category' => $alt_category , 'prefix' => $prefix . '-'])
        @endforeach

    @endif