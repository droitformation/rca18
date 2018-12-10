@if(!empty($blocs) && !empty($blocs->pages))
    <div class="row">
        @foreach($blocs->pages as $page)
            <div class="col-md-4 col-xs-12 blocs-homepage">
                <h4>{{ $page->title }}</h4>
                {!! $page->excerpt !!}
                <a href="{{ url('page/'.$page->id) }}" class="btn btn-primary">En savoir plus</a>
            </div>
        @endforeach
    </div>
@endif
