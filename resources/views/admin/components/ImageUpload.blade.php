@props([
    'result' => null,
    'collection' => 'default',
    'name' => 'image',
    'label' => __('attributes.image'),
])
<div class="col-md-6">
    <div class="mb-3">
        <div class="mb-3 mt-3 mt-sm-0">

            <label class="form-label" for="example-fileinput">{{ $label }}</label>

            @error($name)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @php
                $imageUrl = App\Helpers\Image::getMediaUrl($result, $collection);
            @endphp

            @if ($imageUrl)
                <div class="mb-2">
                    <img src="{{ $imageUrl }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;"
                        onclick="openImage('{{ $imageUrl }}')"
                        style="width: 100px; height: auto; cursor: pointer; transition: transform 0.3s;"
                        onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            @endif
            <input type="file" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
                id="example-fileinput">
        </div>
    </div>
</div>
