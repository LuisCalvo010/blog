<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                
            </div>
            <div class="col l4 offset-l2 s12">
                

            </div> 
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
           
        </div>
    </div>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    
<script type="text/javascript">
    $( document ).ready(function(){
        $(".button-collapse").sideNav
        $(".dropdown-button").dropdown();
        
        $("#formComment").submit(function(){
            var comentario = $("#formComment textarea[name=body]").val();
            var idPost = $("#formComment input[name=id]").val();
            var token = $("#formComment input[name=_token]").val();
            
            $.ajax({
                type:'POST' ,
                url:'/post/' + idPost + '/comments',
                data:{
                    '_token': token,
                    'body':comentario
                },
                success: function(response){
                    if(response['respuesta']){
                        var datos = "<li class='collection-item'>";
                        datos +="<p class='chip'>" + response['data']['fecha']+"</p><br>";
                        datos +="<p> Comentado por:" + response['data']['nombre']+"</p><br>";
                        datos +="<p>" + response['data']['comentario']+"</p><br>";
                        datos +="</li>";
                        
                        $('#commentBox').append(datos);
                        
                        Materialize.toast(response['mensaje'] , 3000);
                    }else{
                        Materialize.toast(response['mensaje'] , 3000);
                    }
                }
            });           
            event.preventDefault();
            return false;
        });
        
        $("#btnAjax").click(function(){
            $.ajax({
                type: 'GET',
                url: '/pruebaAjax',
                success: function(response){
                    $("#datosAjax").append(response);
                    Materialize.toast('Se consultaron las Tareas', 1000)
                }
            })
        });
        
        $(".btnDelete").click(function(event){
            var idPost= $(this).data('id');
            var token= $(this).data('token');
            
            console.log(idPost);
            console.log(token);
            
            $.ajax({
                type: 'DELETE',
                url: '/posts/' + idPost,
                data:{
                    "_token": token
                },
                success: function(response){
                    if(response['respuesta']){
                        $(".post-" + idPost).remove();
                    }
                    Materialize.toast(response['mensaje'] , 3000);
                }
            }); 
            event.preventDefault();
        });
        
        $('.materialboxed').materialbox();
    });
</script>

