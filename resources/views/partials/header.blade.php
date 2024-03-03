@php
    $links = [
        [
            'url' => 'welcome',
            'label' => 'Home',
            'active' => true,
        ],
        [
            'url' => 'subpages.about',
            'label' => 'Chi siamo',
            'active' => true,
        ],
        [
            'url' => 'comics.index',
            'label' => 'Comics',
            'active' => true,
        ],

    ];
@endphp

<header>
    <nav>
        <ul class="d-flex justify-content-around p-0 m-0">
            @foreach ($links as $link)
                <li class="list-unstyled">
                    <a class="text-decoration-none" href="{{ route($link['url']) }}">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>
