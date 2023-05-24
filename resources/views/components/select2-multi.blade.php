@props(['name', 'options' => [], 'selected' => []])

<!-- Include select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
<select name="{{ $name }}[]" id="{{ $name }}"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
        multiple>
    @foreach ($options as $option)
        <option
            value="{{ $option->id }}" {{ in_array($option, $selected) ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>

<!-- Include select2 JavaScript -->
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#{{ $name }}').select2({
                placeholder: 'Select a category'
            });
        });
    </script>
@endpush

<style>
    .select2-selection__choice{
        background-color: #5897fb !important;
        border-color: #5897fb !important;
        color: #fff !important;
    }
    .select2-selection__choice__remove{
        color: #fff !important;
    }
</style>
