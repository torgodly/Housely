@props(['label', 'name', 'options', 'selected' => null, 'multiple' => false, 'showLable' => true ])
<select id="{{ $label }}" name="{{ $name }}" @if($multiple) multiple @endif
    {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} >
    @if($selected == null && $showLable)
        <option selected disabled value="">{{ __($label) }}</option>
    @endif
    @if(is_array($options))
        @foreach($options as $value => $text)

            <option value="{{ $text }}" @if($selected == $value) selected @endif>{{ __($value) }}</option>
        @endforeach
    @else
        @foreach($options as $option)
            <option value="{{ $option->id }}" @if($selected == $option->id) selected @endif>{{ __($option->name) }}</option>
        @endforeach
    @endif

</select>

