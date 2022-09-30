//392. Cargar archivos JS
//393. Cambiar de color el boton de like
//394. Peticiones AJAX
//395. Like en el detalle
//408. Formulario del buscador

var url = 'http://proyecto-laravel.com.devel';

window.addEventListener("load", function () {
    //alert("¡La pagina esta completamente cargada!");
    //$('body').css('background','red');

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    // Si tuviesemos que hacer esto con JS puro en vez de con JQUERY tendriamos 3 veces mas codigo
    // (JQuery ya viene incluido en Laravel)

    // Boton de like
    function like(){
        $('.btn-like').unbind('click').click(function () {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/img/hearts-red-64.png');
            // IMPORTANTE: para que te vuelva a cargar el evento es necesario esta llamada:
            // (tambien hay que hacer uso de la funcion unbind)
            
            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('Has dado like a la publicacion');
                    }
                    else{
                        console.log('Error al dar like');
                    }
                    
                }
            });
            
            dislike();
        });
    }
    like();
    
    // Boton de dislike
    function dislike(){
        $('.btn-dislike').unbind('click').click(function () {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/img/hearts-black-64.png');
            // IMPORTANTE: para que te vuelva a cargar el evento es necesario esta llamada:
            // (tambien hay que hacer uso de la funcion unbind)
            
            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('Has dado dislike a la publicacion');
                    }
                    else{
                        console.log('Error al dar dislike');
                    }
                    
                }
            });
            
            like(); 
        });
    }
    dislike();
    
    
    // BUSCADOR
    $('#buscador').submit(function(e){
        $(this).attr('action', url+'/gente/'+$('#buscador #search').val());
    });
});