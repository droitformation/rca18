@extends('layouts.master')
@section('content')

<div class="row">
    <div id="filteringApp" ng-app="filtering">
		<div class="col-md-12">
        <h1>Jurisprudence</h1>

        <hr/>
		</div>
        <div class="col-md-8 col-xs-12">
            <div id="filtering">
                <div class="arrets">

                    @include('frontend.content.analyse')

                    @if(!empty($arrets))

                        <h4 class="title-section-top"><i class="fa fa-university"></i> &nbsp;&nbsp;Jurisprudence</h4>

                        @foreach($arrets as $arret)

                            <div class="arret {{ $arret->filter }} y{{ $arret->year }} clear">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="post">
                                            <div class="post-title">
                                                <h3 class="title">{{ $arret->reference }} du {{ $arret->pub_date }}</h3>
                                                <p class="italic">{{ $arret->abstract }}</p>
                                            </div><!--END POST-TITLE-->
                                            <div class="post-entry">
                                                <a class="anchor" name="{{ $arret->reference }}"></a>
                                                {!! $arret->pub_text !!}

                                                @if($arret->file)
                                                    <p><a target="_blank" href="{{ $arret->file }}">Télécharger en pdf &nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a></p>
                                                @endif
                                            </div>
                                        </div><!--END POST-->
                                    </div>
                                    <div class="col-md-3 listCat">
                                        @if(!empty($arret->categories))
                                            @foreach($arret->categories as $categorie)
                                                <img style="max-width: 140px;" border="0" alt="{{ $categorie->title }}" src="{{ $categorie->image }}">
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <!-- Sidebar  -->
        <div id="sidebar-right" class="col-md-4 col-xs-12">
            <div class="fixed">
                @include('partials.filter')
            </div>
        </div>
        <!-- END Sidebar  -->

    </div><!--END CONTENT-->
</div><!--END CONTENT-->

@stop
