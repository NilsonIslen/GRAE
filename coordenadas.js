        
        document.addEventListener('DOMContentLoaded', e => {
            navigator.geolocation.getCurrentPosition(success, error);
        })
        function success(pos) {
            insertarEnHtml(pos.coords.latitude, pos.coords.longitude)
        };
        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };
        function insertarEnHtml(latitud, longitud) {
            let $latitud = document.querySelector(".latitud");
            let $longitud = document.querySelector(".longitud");
            $latitud.value = latitud;
            $longitud.value = longitud;
        }

