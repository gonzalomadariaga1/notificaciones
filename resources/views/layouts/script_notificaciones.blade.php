<script>
    function showModal(proyectos_notificaciones_id,titulo,resumen,importancia,contenido,fecha,leido){
        var badge_importante = document.getElementById('badge_importante');
        badge_importante.style.display = "none";

        $('#titulo').html(titulo);
        $('#fecha').html(fecha);
        
        if (importancia == 1) {
            badge_importante.removeAttribute('style','');
        }

        if (leido == 1) {
            $('#btn_marcar_leido').hide();
        }

        if (leido == 0) {
            $.ajax({
                type: "GET",
                url: '/notificaciones/' + proyectos_notificaciones_id + '/marcar_leida/',
                error: function(e) {
                    console.log(e);
                },
                success: function(response) {

                    console.log("response",response);
                    
                    
                }
            });
        }

        $('#contenido').html(contenido);
        $('#fecha').html(fecha);
        $('#modal_notificacion').modal('show');

    }

    function refresh(){
        window.location.reload();
    }
</script>