
@extends('layouts.master')
@section('content')
	<!-- Header et banner -->
     @include ('partials.banner')
     @include ('partials.shortcuts')
	<!-- END HEADER -->
    
<div class="row">
    <div class="col-md-8">
        <h1>La plateforme RC Assurances</h1>
        <hr class="txt"/>

        @if(!empty($homepage))
            <div class="row">
                <div class="col-md-12">
                    <h4></h4>
                    {!! $homepage->content !!}
                </div>
            </div><!-- end row -->
        @endif

    </div>

    <!-- Sidebar  -->
    <div id="sidebar-right" class="col-md-4 col-xs-12">
        @include('partials.subscribe')
        @include('partials.latest')
    </div>
    <!-- END Sidebar  -->

</div><!--END CONTENT-->

@stop