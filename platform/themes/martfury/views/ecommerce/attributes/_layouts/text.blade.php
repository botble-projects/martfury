@if (($attributes = $attributes->where('attribute_set_id', $set->id)) && $attributes->isNotEmpty())
    <div class="text-swatches-wrapper attribute-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color" data-type="text">
        <label class="attribute-name">{{ $set->title }}</label>
        <div class="attribute-values">
            <ul class="text-swatch attribute-swatch color-swatch">
                @foreach($attributes as $attribute)
                    <li data-slug="{{ $attribute->slug }}"
                        data-id="{{ $attribute->id }}"
                        class="attribute-swatch-item @if (!$variationInfo->where('id', $attribute->id)->isNotEmpty()) pe-none @endif">
                        <div>
                            <label>
                                <input class="product-filter-item"
                                    type="radio"
                                    name="attribute_{{ $set->slug }}_{{ $key }}"
                                    value="{{ $attribute->id }}"
                                    data-slug="{{ $attribute->slug }}"
                                    @checked($selected->where('id', $attribute->id)->isNotEmpty())
                                >
                                <span>{{ $attribute->title }}</span>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
