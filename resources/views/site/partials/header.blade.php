<header>
    <nav>
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if($localeCode !== app()->getLocale())
                <li class="inline-block mr-2 uppercase">
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ substr($properties['native'], 0, 2) }}
                    </a>
                </li>
            @endif
            @endforeach
        </ul>
    </nav>
</header>
