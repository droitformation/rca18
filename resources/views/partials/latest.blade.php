<div class="widget">
    <h4>Derniers arrêts commentés</h4>
    <ul class="bra_recent_entries">

        @if(isset($latest) && !empty($latest))
            @foreach($latest as $arret)
                <li>
                    <span class="date">{{ $arret->pub_date }}</span>
                    <a href="{{ url('jurisprudence').'/#analyse_'.$last->reference }}">{{ $last->reference }}</a>
                    <p>{{ $arret->abstract }}</p>
                </li>
            @endforeach
        @endif

    </ul><!--END UL-->
</div><!--END WIDGET-->

