<div class="mb-3">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        class="form-control" value="{{ $value }}" placeholder="{{ $placeholder }}"
        @if ($required) required @endif
    >
</div>