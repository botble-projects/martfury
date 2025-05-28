@if (($attributes = $attributes->where('attribute_set_id', $set->id)) && $attributes->isNotEmpty())
    <div class="dropdown-swatches-wrapper attribute-swatches-wrapper" data-type="dropdown">
        <div class="attribute-name">{{ $set->title }}</div>
        <div class="attribute-values">
            <div class="dropdown-swatch">
                <label>
                    <select class="form-control product-filter-item">
                        <option value="">{{ __('Select') . ' ' . strtolower($set->title) }}</option>
                        @foreach($attributes as $attribute)
                            <option
                                data-id="{{ $attribute->id }}"
                                data-slug="{{ $attribute->slug }}"
                                value="{{ $attribute->id }}"
                                @selected($selected->where('id', $attribute->id)->isNotEmpty())
                                @disabled(! $variationInfo->where('id', $attribute->id)->isNotEmpty())
                            >
                                {{ $attribute->title }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>
    </div>
@endif
