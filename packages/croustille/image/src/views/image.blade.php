<div
    @foreach($dataAttr as $attr => $value)
        data-{{ $attr }}="{{ $value }}"
    @endforeach
    style="position: relative;overflow: hidden;"
    {{ $lazyload ? 'data-lazyload' : '' }}
>
    <div style="width:100%;padding-bottom: {{ $paddingBottom }}%;"></div>

    <div
         style="background-color: {{ $backgroundColor }};background-repeat: no-repeat;background-size: cover;position: absolute;top: 0;bottom: 0;opacity: 1;transition: opacity 0.5s ease 0.35s;right: 0;left: 0;@isset($lqip)background-image: url({{ $lqip }});@endisset"
        {{ $lazyload ? 'data-lazyload-placeholder' : '' }}
    ></div>

    <picture>
        @isset($srcSets)
            @foreach($srcSets as $srcset)
                <source
                    @if($lazyload) data-srcset="{{ $srcset['srcset'] }}" @else srcset="{{ $srcset['srcset'] }}" @endif
                    sizes="{{ $sizes }}"
                    @if($srcset['mediaQuery'] !== 'default') media="{{ $srcset['mediaQuery'] }}" @endif
                    @isset($srcset['type']) type="{{ $srcset['type'] }}" @endisset
                >
            @endforeach
        @endisset

        <img
            @if($lazyload) src="{{ $pixel }}" data-src="{{ $src }}" @else src="{{ $src }}" @endif
            @isset($alt) alt="{{ $alt }}" @endisset
            style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;object-position: center center;opacity: 0;transition: opacity 0.5s ease 0s;"
        >
    </picture>

    @if($lazyload) @include('image::noscript') @endif
</div>
