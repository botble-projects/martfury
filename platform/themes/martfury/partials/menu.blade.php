@php
    $menu_nodes->loadMissing([
        'child',
        'child.metadata',
        'child.reference',
        'metadata',
        'reference'
    ]);

    $menu
        ->loadMissing([
            'menuNodes',
            'locations',
    ]);

    $cacheKey = 'menu_' . $menu->id . '_' . app()->getLocale();

    if (Cache::has($cacheKey)) {
        echo Cache::get($cacheKey);
        return;
    }

    ob_start();
@endphp

<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        <li @if ($row->has_child || $row->css_class || $row->active) class="@if ($row->has_child) menu-item-has-children @endif @if ($row->css_class) {{ $row->css_class }} @endif @if ($row->active) current-menu-item @endif" @endif>
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                {!! $row->icon_html !!}{{ $row->title }}
            </a>
            @if ($row->has_child)
                <span class="sub-toggle"></span>
                {!! Menu::generateMenu([
                    'menu'       => $menu,
                    'menu_nodes' => $row->child,
                    'view'       => 'menu',
                    'options' => [
                        'class' => 'sub-menu',
                    ]
                ]) !!}
            @endif
        </li>
    @endforeach
</ul>

@php
    $content = ob_get_clean();
    Cache::put($cacheKey, $content, 3600);
    echo $content;
@endphp
