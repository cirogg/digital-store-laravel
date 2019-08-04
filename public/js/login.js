window.addEventListener('load', function() {


    var password = document.querySelector('#password');

    password.addEventListener("keyup", function(event) {
        if (event.getModifierState("CapsLock")) {
            //password.nextElementSibling.innerHTML = 'CAPS LOCK ACTIVADO';
            console.log("AAAAAAAAA")
            password.nextElementSibling.innerHTML = 'MAYUSCULAS ACTIVADAS';
        } else {
            password.nextElementSibling.innerHTML = '';
        }
    });

});