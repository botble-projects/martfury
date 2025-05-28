@if (($attributes = $attributes->where('attribute_set_id', $set->id)) && $attributes->isNotEmpty())
    <div class="visual-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color" data-type="visual">
        <label class="attribute-name">{{ $set->title }}</label>
        <div class="attribute-values">
            <ul class="visual-swatch color-swatch attribute-swatch">
                @foreach($attributes as $attribute)
                    <li data-slug="{{ $attribute->slug }}"
                        data-id="{{ $attribute->id }}"
                        class="attribute-swatch-item @if (!$variationInfo->where('id', $attribute->id)->isNotEmpty()) pe-none @endif"
                        title="{{ $attribute->title }}">
                        <div class="custom-radio">
                            <label>
                                <input class="form-control product-filter-item"
                                    type="radio"
                                    name="attribute_{{ $set->slug }}_{{ $key }}"
                                    data-slug="{{ $attribute->slug }}"
                                    value="{{ $attribute->id }}"
                                    @checked($selected->where('id', $attribute->id)->isNotEmpty())
                                >
                                <span style="{{ $attribute->getAttributeStyle($set, $productVariations) }}"></span>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
