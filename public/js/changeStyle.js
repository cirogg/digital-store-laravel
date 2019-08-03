window.addEventListener('load', function () {

    var cssStyles = document.querySelector('#style');
    var styleButton = document.querySelector('#btn-style');

    if (styleButton) {

        styleButton.addEventListener('click', function () {
    
            
            if (cssStyles.getAttribute('href') == '/css/change.css') {
                cssStyles.setAttribute('href', '/css/styles.css');
            } else {
                cssStyles.setAttribute('href', '/css/change.css');
            }
    
            localStorage.setItem('cssCookie', cssStyles.getAttribute('href'));
        })
    }

    cssStyles.setAttribute('href', localStorage.getItem('cssCookie'));
    

});