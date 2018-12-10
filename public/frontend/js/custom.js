jQuery(document).ready(function($){

    $(".fancybox").fancybox({
        iframe : {
            css : {
                width : '600px'
            },
            preload : false
        },
        toolbar  : false,
        smallBtn : true,
    });

    var base_url = location.protocol + "//" + location.host+"/";

    jQuery(document).on('change', '#selectArchive', function (e){
        var id = $(this).val();
        window.location.replace(base_url + 'campagne/' + id);
    });

});