@props(['name', 'options' => [], 'selected' => []])

<!-- Include select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>

<select name="{{ $name }}" id="{{ $name }}"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
        multiple="multiple" wire:model="utilities">
    @foreach ($options as $option)
        <option
            value="{{ $option->id }}" {{ in_array($option, $selected) ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>

<!-- Include select2 JavaScript -->
@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Select2 dropdown
            $('#{{ $name }}').select2();

            // Handle change event
            $('#{{ $name }}').on('change', function() {
                // Get selected values
                const selectedValues = $(this).val();

                // Call Livewire method to update property array
                Livewire.emit('updateSelectedValues', selectedValues);
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
