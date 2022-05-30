;(function ($, window, document, undefined) {
    var $win = $(window);
    var $doc = $(document);
    var $body = $('body');
    $doc.ready(function(){
        var $loading = $('#loading').hide();
        var findMeButton = jQuery('.find-me');
        // Check if the browser has support for the Geolocation API
        if (!navigator.geolocation) {
            findMeButton.addClass("disabled");
            jQuery('.no-browser-support').removeClass("d-none");
        } else {
            findMeButton.on('click', function(e) {
                e.preventDefault();
                let postcode_search = $("input[name=postcode_search]").val();
                let distance = $( "#distance option:selected" ).val();
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the coordinates of the current possition.
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    $.ajax({
                        method: 'POST',
                        url: js_var.ajax_url,
                        data: {
                            action: "search_agent",
                            lat: lat,
                            lng: lng,
                            postcode_search: postcode_search,
                            distance: distance,
                        },
                        dataType: "json",
                        async:true,

                        beforeSend: function(){
                            // Show image container
                            $loading.show();
                        },
                        success: function(response){
                            if(response.status == 0){
                                $('.agnt').html(response.output);
                                new LazyLoad();
                                $('.naf').removeClass('d-none');
                                $('.agnt-cmn').removeClass('d-none');
                                $('.paagnt,.print-agent').addClass('d-none');
                            }else {
                                $('.agnt').html(response.output);
                                new LazyLoad();
                                $('.naf,.print-agent').addClass('d-none');
                                $('.agnt-cmn').removeClass('d-none');
                            }
                        },
                        complete:function(data){
                            // Hide image container
                            $loading.hide(9000);
                        }
                    });
                    jQuery('.latitude').text(lat.toFixed(4));
                    jQuery('.longitude').text(lng.toFixed(4));
                    jQuery('.coordinates').addClass('visible');
                });

            });

        }

        $( "form#weblinkSrcFrm" ).submit(function(e) {
            e.preventDefault();
            var $form = jQuery(this);
            var $input = $form.find('input[name="s"]');
            var query = $input.val();
            var $content = jQuery('#vdm')

            jQuery.ajax({
                method: 'POST',
                url : js_var.ajax_url,
                data : {
                    action : 'load_search_results',
                    query : query
                },
                beforeSend: function() {
                    //$input.prop('disabled', true);
                    //$content.find('.row').addClass('loading');
                },
                success : function( response ) {
                    //$input.prop('disabled', false);
                    //$content.find('.row').removeClass('loading');
                    $content.html( response );
                    new LazyLoad();
                }
            });

            return false;
        });

        if( $('#weblinkSrcFrm').length ){
            $('#weblinkSrcFrm input').val('');
        }
        if( $("input[name='postcode_search']").length ){
            $("input[name='postcode_search']").val('');
        }

    });

    $body.on("click", '.ajax li', function (e) {
        e.preventDefault();
        var $form = jQuery('#weblinkSrcFrm');
        var $input = $form.find('input[name="s"]');
        var query = $input.val();
        var $content = jQuery('#vdm');
        var offset = $(this).index();

        jQuery.ajax({
            method: 'POST',
            url : js_var.ajax_url,
            data : {
                action : 'load_search_results',
                query : query,
                offset : offset
            },
            beforeSend: function() {
                //$input.prop('disabled', true);
                //$content.find('.row').addClass('loading');
            },
            success : function( response ) {
                //$input.prop('disabled', false);
                //$content.find('.row').removeClass('loading');
                $content.html( response );
                new LazyLoad();
            }
        });

        return false;
    });

    $body.on("click", '.print-btn', function (e) {
        $(".reviewDetails").printThis({
            importCSS: false,
            header: "<h1>Payment Details</h1>"
        });
    });

    $body.on("click", '.print-agent', function (e) {
        //window.print();
        $('.agnt').removeClass('d-none');
        $(".agnt").printThis({
            importCSS: true,
            header: "<h1 style='text-align: center'>All Agents</h1>"
        });
    });

    $body.on("click", '.print-filter-agent', function (e) {
        $(".agnt").printThis({
            importCSS: true,
            header: "<h1 style='text-align: center'>Agents</h1>"
        });
    });

    var $loading = $('#loading').hide();
    $(document).ajaxStart(function () { $loading.show(); }).ajaxStop(function () { $loading.hide(); });

})(jQuery, window, document);





