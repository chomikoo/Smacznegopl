(function($){
    console.log('Hello from admin_scripts',$('button#aboutme__image'));

    $(document).ready(function(){

        $('button#aboutme__image').on('click', function(e) {
            e.preventDefault();
            console.log(e);
            var imageUploader = wp.media({
                'title': 'Dodaj zdjcie autora',
                'button': {
                    'text': 'Ustaw zdjecie'
                },
                'multiple': false
            });
            imageUploader.open();

            imageUploader.on('select', function() {
                const image = imageUploader.state().get('selection').first().toJSON();
                $('input.image_er_link').val(image.url);
                $('.image_show img').attr('src', image.url);
            });
        
        })
    });
    
})(jQuery);