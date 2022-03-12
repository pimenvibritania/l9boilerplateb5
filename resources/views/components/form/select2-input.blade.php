<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <div>
        <select class="js-example-basic-multiple form-select @error($entity) is-invalid @enderror"
            name="{{ $name }}"
            data-placeholder="{{ $placeholder }}"
            {{ $multiple ? "multiple" : "" }}
            {{ $required ? "required" : "" }}
        >
            @foreach($options as $option)
                <option value="{{ $option->{$entity} }}">{{ $option->{$entity} }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $( '.js-example-basic-multiple' ).select2( {
                theme: 'bootstrap-5'
            } );
        });
    </script>
@endpush
