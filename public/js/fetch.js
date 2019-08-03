var emailsTraidos = [];
var te = false;
window.addEventListener('load', function() {

    var inputEmail = document.querySelector('#email');

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



    function getEmailsSistema(users) {
        users.forEach(function(oneUser) {
            emailsTraidos.push(oneUser.email)
        });
    }

    genericFetchCall('/api/users', getEmailsSistema);

    inputEmail.addEventListener('blur', function() {

        function emailExist() {
            var isTrue = false;

            for (let index = 0; index < emailsTraidos.length; index++) {

                if (inputEmail.value === emailsTraidos[index]) {
                    isTrue = true;
                    break;
                } else {
                    isTrue = false;
                }

            }
            if (isTrue) {
                return true;
            } else {
                return false;
            }
        }

        te = emailExist();
        console.log(te);
    });

});