var password = document.getElementById('password')
var check = document.getElementById('chbox')

check.addEventListener('click', function(){
    if (check.checked) {
        password.setAttribute('type', 'text')
    } else {
        password.setAttribute('type', 'password')
    }
})