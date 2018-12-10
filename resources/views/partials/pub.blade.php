<?php $ads = isset($pub) && !empty($pub) ? collect($pub)->whereNotIn('type','soutien')->where('position','sidebar') : null; ?>
@if($ads && !$ads->isEmpty())
    <div class="widget">
        <h4 class="title"><i class="glyphicon glyphicon-pushpin"></i> &nbsp;New</h4>
        @foreach($ads as $ad)
            @if( !empty($ad->title) && !empty($ad->url) && !empty($ad->image))
                <div class="media">
                    <div class="media-body">

                        <div class="row">
                            <div class="col-md-5">
                                <a class="media-left" style="margin-bottom: 5px;" target="_blank" href="{{ $ad->url }}">
                                    <img style="max-width: 100%" src="{{ $ad->image }}" alt="{{ $ad->title or 'image' }}" />
                                </a>
                            </div>
                            <div class="col-md-7">
                                <h4 class="media-heading">{{ $ad->title }}</h4>
                                <div style="text-align: left; margin-bottom: 5px;">{!! $ad->content or '' !!}</div>
                                <a class="btn small btn-primary" target="_blank" href="{{ $ad->url }}">En savoir plus</a>
                            </div>
                        </div>

                    </div>
                </div>
            @elseif(!empty($ad->url) && !empty($ad->image))
                <div class="media">
                    <a class="pub-image-simple" target="_blank" href="{{ $ad->url }}">
                        <img style="width:130px;" src="{{ $ad->image }}" alt="{{ $ad->title ?? 'image' }}" />
                    </a>
                </div>
            @elseif(!empty($ad->image))
                <div class="media">
                    <img style="width:130px;" src="{{ $ad->image }}" alt="{{ $ad->title ?? 'image' }}" />
                </div>
            @endif

        @endforeach

    </div><!--END WIDGET-->

    <p class="divider-border"></p>
@endif