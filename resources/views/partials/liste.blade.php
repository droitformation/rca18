<div class="widget">
    <h3 class="title"><i class="icon-envelope"></i> &nbsp;Archives</h3>
    @if(!empty($archives))
        <ul class="list-group hide-xs">
            @foreach($archives as $campagne)
                <a href="{{ url('campagne/'.$campagne->id) }}" class="list-group-item {{ Request::is('campagne/'.$campagne->id) ? 'active' : '' }}">{{ $campagne->sujet }}</a>
            @endforeach
        </ul>

        <select class="form-control makevisible-xs" id="selectArchive">
            @foreach($archives as $campagne)
                <option value="{{ $campagne->id }}">{{ $campagne->sujet }}</option>
            @endforeach
        </select>
    @else
        <p>Encore aucune newsletter</p>
    @endif

</div><!--END WIDGET-->

<p class="divider-border"></p>
