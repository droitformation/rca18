<!-- Original -->
<nav class="navbar">
    <ul class="nav navbar-nav">
        @if(isset($menu))
            @foreach($menu->pages as $item)
                <li>
                    <a class="{{ Request::is($item->slug) ? 'active' : '' }}" href="{{ url($item->slug) }}">
                        {{ $item->menu_title }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</nav>

 <!-- END Container -->