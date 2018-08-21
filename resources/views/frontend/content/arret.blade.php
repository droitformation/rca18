
@if(!empty($bloc->arret->analyses))
    <div class="row">
        <div class="col-md-9">

            @foreach($bloc->arret->analyses as $analyse)
                @include('frontend.content.partials.analyse', ['analyse' => $analyse, 'arret' => $bloc->arret])
            @endforeach

        </div>
        <div class="col-md-3 listCat">
            <a href="{{ url('jurisprudence') }}">
                <img style="max-width: 140px;" border="0" alt="Analyses" src="<?php echo asset('images/analyse.png') ?>">
            </a>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-9">
        <div class="post">
            <div class="post-title">
                <h3 class="title">{{ $bloc->arret->reference }} du {{ $bloc->arret->pub_date }}</h3>
                <p class="italic">{{ $bloc->arret->abstract }}</p>
            </div><!--END POST-TITLE-->
            <div class="post-entry">
                <a class="anchor" name="{{ $bloc->arret->reference }}"></a>
                {!! $bloc->arret->pub_text !!}

                @if($bloc->arret->file)
                    <p><a target="_blank" href="{{ $bloc->arret->file }}">Télécharger en pdf &nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a></p>
                @endif
            </div>
        </div><!--END POST-->
    </div>
    <div class="col-md-3 listCat">
        @if(!empty($bloc->arret->categories))
            @foreach($bloc->arret->categories as $categorie)
                <img style="max-width: 140px;" border="0" alt="{{ $categorie->title }}" src="{{ $categorie->image }}">
            @endforeach
        @endif
    </div>
</div>