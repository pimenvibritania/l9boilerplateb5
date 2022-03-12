<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text"
           name="{{ $name }}"
           id="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
        {{$required ? "required" : ""}} />
</div>

