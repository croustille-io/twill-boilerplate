<noscript>
    <picture>
        @isset($srcSets)
            @foreach($srcSets as $srcset)
                <source
                    srcset="{{ $srcset['srcset'] }}"
                    sizes="{{ $sizes }}"
                    @if($srcset['mediaQuery'] !== 'default') media="{{ $srcset['mediaQuery'] }}" @endif
                    @isset($srcset['type']) type="{{ $srcset['type'] }}" @endisset
                >
            @endforeach
        @endisset
        <img alt="" src="{{ $src }}"
        style="position:absolute;top:0;left:0;transition:opacity 0.5s;transition-delay:0.5s;opacity:1;width:100%%;height:100%%;object-fit:cover;object-position:center;" />
    </picture>
</noscript>
