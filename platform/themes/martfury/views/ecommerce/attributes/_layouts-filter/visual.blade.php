@if (($attributes = $attributes->where('attribute_set_id', $set->id)) && $attributes->isNotEmpty())
    <div class="bb-product-filter-attribute-item">
        <h4 class="bb-product-filter-title">{{ $set->title }}</h4>

        <div class="bb-product-filter-content">
            <figure class="visual-swatches-wrapper widget--colors widget-filter-item" data-type="visual">
                <div class="widget__content ps-custom-scrollbar">
                    <div class="attribute-values">
                        <ul class="visual-swatch color-swatch">
                            @foreach($attributes as $attribute)
                                <li data-slug="{{ $attribute->slug }}"
                                    title="{{ $attribute->title }}">
                                    <div class="custom-checkbox">
                                        <label>
                                            <input class="form-control product-filter-item" type="checkbox" name="attributes[{{ $set->slug }}][]" value="{{ $attribute->id }}" {{ in_array($attribute->id, $selected) ? 'checked' : '' }}>
                            <span style="{{ $attribute->getAttributeStyle() }}"></span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </figure>
        </div>
    </div>
@endif
