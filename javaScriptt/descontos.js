var produtoSelected = document.getElementById('productSelected')
var descontoProdSelected = document.getElementById('descontoProduct')

produtoSelected.onchange = () => {
    //alert(produtoSelected.value);

    fetch('../PHP/descontos2.php?produtoSelected=' + produtoSelected.value)
    .then(response => {
        return response.text();   
    })
    .then(texto => {
        descontoProdSelected.setAttribute("value", texto);
    })

}