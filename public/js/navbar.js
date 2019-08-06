window.addEventListener('load', function() {

    //var idMyUser = {{(Auth::user())}};
    //supuestamente le estoy mandando una variable que es myId desde la etiqueta script en la vista de navbar. ToTest.
    //Nop, no funcionó.

    //console.log(myId);

    var cant_badge_to_show = 0;
    var arrayCart = [];
    var badge_cart = document.querySelector('#badge-cart');

    genericFetchCall('/api/carts/', getCarts);



    function genericFetchCall(endPoint, callback) {
        fetch(endPoint)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                callback(data);
            })
            .then(function(error) {
                console.log('El error fue: ' + error);
            });
    }

    function getCarts(carts) {
        //console.log(Object.values(carts));
        Object.values(carts).forEach(function(oneCart) {
            arrayCart.push(oneCart)
        });

        arrayCart.forEach(function(oneCart2) {
            //console.log(oneCart2.is_paid);
            cant_badge_to_show = cant_badge_to_show + 1;
        });

        badge_cart.innerHTML = cant_badge_to_show;

        if (cant_badge_to_show === 0) {
            badge_cart.style.visibility = "hidden";
        } else {
            badge_cart.style.visibility = "visible";
        }
    }

});
