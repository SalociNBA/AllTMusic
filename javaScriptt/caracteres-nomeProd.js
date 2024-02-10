const nomeProd = document.getElementById('nome')

nomeProd.addEventListener("keyPress", function(e) {
   
    checkChar(e);

});

function checkChar(e) {

    const char = String.fromCharCode(e.keyCode);

    console.log(char);
    console.log(e.keyCode);

}