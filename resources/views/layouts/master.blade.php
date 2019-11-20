<!DOCTYPE html>
    <!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>RC Assurances</title>

        <meta name="description" content="RC Assurances, L'actualité dans les domaines des assurances et de la RC">
        <meta name="author" content="Droit Formation Unine">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS Files
        ================================================== -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic,700,800,800italic,300italic,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/filter.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/chosen.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/styleRCA.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/responsive.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/jquery.fancybox.min.css');?>">
        <link rel="stylesheet" href="<?php echo asset('frontend/css/sites.css');?>">

        <!-- Javascript Files
        ================================================== -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo asset('frontend/js/chosen.jquery.js');?>"></script>
        <script src="<?php echo asset('frontend/js/jquery.fancybox.min.js');?>"></script>
        <script src="<?php echo asset('frontend/js/filter.js');?>"></script>
        <script src="<?php echo asset('frontend/js/custom.js');?>"></script>

    </head>

    <body>
    <div class="container">
        <div id="blue-line"></div>
            <!-- START HEADER -->
            <div id="header-main">
                 <a href="{{ url('/') }}" id="logo"><img src="{{ asset('images/rcassurances.svg') }}"></a>
                @include('partials.navigation')
                <a target="_blank" href="http://www2.unine.ch/droit"><img style="max-width: 100%;" src="{{ asset('images/UniNE_logo_90x58.png') }}" alt=""></a>
            </div>
            <!-- START CONTENT -->
                <section>
                    @include('partials.message')
                    <!-- Contenu -->
                    @yield('content')
                    <!-- Fin contenu -->
                </section><!--END CONTENT-->

                <hr/></div>
                <!-- Soutien -->
                <div class="container">
                    <div class="row">
                        @if(isset($pub))
                            <?php $soutiens = collect($pub)->where('position','footer'); ?>
                            @if(!$soutiens->isEmpty())
                                @foreach($soutiens as $soutien)
                                    <div class="bloc-soutien bloc-soutien-footer">
                                        <a target="_blank" href="{{ $soutien->url }}"><img height="50px" src="{{ $soutien->image }}" alt="{{ $soutien->title }}" /></a>
                                        <h5>{{ $soutien->title }}</h5>
                                        {!! strip_tags($soutien->content) !!}
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div><hr/>
                </div>
                <!-- Fin de soutien -->
                <!-- START FOOTER -->
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="text-center"><strong>Faculté de droit, Avenue du 1er-Mars 26, 2000 Neuchâtel</strong></p>
                                <p class="text-center copyright">Copyright &copy; . Tous droits réservés.</p>
                            </div><!--END ONE-->
                        </div>
                    </div><!--END SECTION-->
                </footer><!--END FOOTER-->
                <!-- END FOOTER -->

                @include('partials.logos', ['current' => 'rcassurances'])

            </div>
        </div><!-- END Container -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114403548-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-114403548-8');
    </script>

    </body>
</html>