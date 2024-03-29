var emailsTraidos = [];
var te = false;
var divCity;
window.addEventListener('load', function() {

    divCity = document.getElementById('divCity');
    //selectCity.style.display = 'none';

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


    // Capturamos al formulario
    var theForm = document.querySelector('#form-register');

    var cityInput

    // Obtenemos todos los campos, pero parseamos la colección a un Array
    var formInputs = Array.from(theForm.elements);

    // Sacamos la 1er posición del array que es el un <input> hidden del token
    formInputs.shift();

    // Sacamos al último elemento que es el <button>
    formInputs.pop();

    // Expresión regular para validar solo números
    var regexNumber = /^\d+$/;

    // Objeto literal para verificar si un campo tiene error
    var errorsObj = {};

    // Recorremos el array y asignamos la validación básica
    formInputs.forEach(function(oneInput) {
        // A cada campo le asignamos el evento blur y su funcionalidad
        oneInput.addEventListener('blur', function() {

            // Pregunto si el campo está vacío (previo trimeo de espacios)
            if (this.value.trim() === '' && this.getAttribute('id') != "city") {


                // Si el campo está vacío, le agrego la clase 'is-invalid'
                this.classList.add('is-invalid');

                // console.log(this.nextParentElement);
                // Ademas, al <div> con clase 'invalid-feedback' le agremamos el texto de error
                this.nextElementSibling.innerHTML = '<span>' + 'El campo <b>' + this.getAttribute('id') + '</b> es obligatorio' + '</span>';
                // Si un campo tiene error, creamos una key con el nombre del campo y valor true
                errorsObj[this.name] = true;
            } else {
                // Cuando el campo NO está vacío

                // Quitamos la clase de error SI existiera
                this.classList.remove('is-invalid');

                // Si la data es correcta, asignamos esta clase de bootstrap
                this.classList.add('is-valid');

                // Al mensaje de error le sacamos el texto
                this.nextElementSibling.innerHTML = '';

                // Si un campo NO tiene error, eliminamos la key del objeto y su valor
                delete errorsObj[this.name];
            }

        });
    });

    // Si tratan de enviar el formulario
    theForm.addEventListener('submit', function(event) {


        //console.log(selectCity.value);


        // Al momento de SUBMITEAR el formulario iteramos los campos y validamos si están vacíos
        formInputs.forEach(function(input) {
            //console.log(selectCity.style.display);
            if (input.value.trim() === '' && input.getAttribute('id') != "city") {
                console.log('NO ES CITY')
                    // Si el campo está vacío creamos dentro del objeto de errores una key con valor true
                errorsObj[input.name] = true;
                // Asiganmos la clase de CSS
                input.classList.add('is-invalid');
                // Mostramos el mensaje de error
                input.nextElementSibling.innerHTML = 'El campo <b>' + input.getAttribute('id') + '</b> es obligatorio';
                event.preventDefault();
            } else if (input.getAttribute('id') == "city" && divCity.style.display != 'none') {
                console.log("ES CITY Y ESTA VACIO");
                if (input.value.trim() === '') {
                    // Si el campo está vacío creamos dentro del objeto de errores una key con valor true
                    errorsObj[input.name] = true;
                    // Asiganmos la clase de CSS
                    input.classList.add('is-invalid');
                    // Mostramos el mensaje de error
                    input.nextElementSibling.innerHTML = 'El campo <b>' + divCity.getAttribute('id') + '</b> es obligatorio';
                    event.preventDefault();
                }
            } else if (input.getAttribute('id') == "city" && divCity.style.display === 'none') {
                console.log("AAAAAAAAAAAAAAAACA TA");
                //event.preventDefault();
            }




        });
        //
        // console.log('Campos con errores:', errorsObj);
        // console.log('Cantidad de campos con errores:', Object.keys(errorsObj).length);
        //
        // // Si el objeto que contiene los errores NO está vacío evitamos que se SUBMITEE el formulario
        // if (Object.keys(errorsObj).length > 0) {
        //
        // 	event.preventDefault();
        // }
    });

    inputEmail.addEventListener('blur', function() {

        function emailExist() {
            var isTrue = false;

            for (let index = 0; index < emailsTraidos.length; index++) {

                if (inputEmail.value === emailsTraidos[index]) {
                    isTrue = true;
                    errorsObj[inputEmail.name] = true;
                    break;
                } else {
                    isTrue = false;
                }

            }
            if (isTrue) {
                inputEmail.classList.add('is-invalid');
                inputEmail.nextElementSibling.innerHTML = 'El mail ya existe en nuestra base de datos';
                return true;
            } else {
                return false;
            }
        }

        te = emailExist();
        //console.log(te);
    });




});
