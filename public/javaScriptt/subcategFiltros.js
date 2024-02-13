var categFiltro = document.getElementsByName('categ')
var subcategFiltro = document.getElementById('subcateg-filtro-div')

var radio = document.querySelector('input[type=radio][name=categ]');

radio.addEventListener('change', () => {
    console.log(radio.value)
    
})