$(document).ready(function(){
    
    
    function like() {
        var btnLike = $('.likeBtn');
        $('.likeBtn').unbind('click').click(function(e) {
            e.preventDefault();
            console.log('Like !');
            
            // CAMBIAR ESTILOS DEL BOTON
            $(this).removeClass(' btn-light likeBtn');
            $(this).addClass('btn-primary text-white dislikeBtn')
       

            // ENCONTRAR LA URL PARA HACER LA PETICIÓN
            const url = 'http://go-involve.com.devel/like/save/' + $(this).data('id');
            const inside = '.total-likes-' + $(this).data('id');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    let total = response.total;
                    var div = $(inside);
                    div.text(total);
                },
                error: function(response){
                    console.log(url);
                    console.log(response);
                }
            });
            
            // ENVOCAR FUNCIÓN DISLIKE PARA DEJARLA PREPARADA
            dislike();
        });
    }
    like();
   
   
    function dislike() {

        var btnDislike = $('.dislikeBtn');
        $('.dislikeBtn').unbind('click').click(function (e) {
            e.preventDefault();
            console.log('Dislike !');

            // CAMBIAR ESTILOS DEL BOTON
            $(this).removeClass(' btn-primary text-white dislikeBtn');
            $(this).addClass('btn-light likeBtn');
      

            // ENCONTRAR LA URL PARA HACER LA PETICIÓN
            const url = 'http://go-involve.com.devel/like/delete/' + $(this).data('id');
            const inside = '.total-likes-' + $(this).data('id');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    let total = response.total;
                    var div = $(inside);
                    div.text(total);
                    
                },
                error: function(response){
                    console.log(url);
                    console.log(response);
                }
            });
            
            // DEJARA PREPARADO LA FUNCION LIKE
            like();
        });

    }
    dislike();
  
   
   
   
   
   
   
   
  
   
    
});

