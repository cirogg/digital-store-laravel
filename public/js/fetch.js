var emailsTraidos = [];
window.addEventListener('load', function() {

    var inputEmail = document.querySelector('#email');
    //var emailExist = false;


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
            //console.log(oneUser.email);
            emailsTraidos.push(oneUser.email)
        });
    }





    genericFetchCall('/api/users', getEmailsSistema);

    // console.log(genericFetchCall('/api/users', getEmailsSistema));
    //test1@gmail.com
    inputEmail.addEventListener('blur', function() {

        //console.log("AAAAAAAA");
        //console.log(emailsTraidos);

        function emailExist() {
            //console.log(inputEmail.value);
            emailsTraidos.forEach(email => {
                if (inputEmail.value === email) {
                    console.log(inputEmail.value);
                    console.log(email);
                    console.log("TRUEEEEE");
                    return true;
                } else {
                    // console.log(inputEmail.value);
                    // console.log(email);
                    // console.log("FALSEEEEE");
                    return false;
                }
            });
        }

        te = emailExist();
        console.log(te);
        console.log(typeof(te));

        if (te === true) {
            console.log("ENTRO AL TRUE");
        } else {
            console.log("ENTRO AL FALSE");
        }

        function booleanReturnCheck() {
            return true;
        }

        var isBool = booleanReturnCheck();
        console.log(isBool);
        console.log(typeof(isBool));


        //console.log(emailExist);

    });

});