//insert asyncrono das cidades conforme seleção do estado
const estadoSelected = document.getElementById('estado')
const cidades = document.getElementById('cidade')

estadoSelected.onchange = () => {
    fetch('../PHP/insert-cidades.php?estado=' + estadoSelected.value)
    .then(response => {
        return response.text();
    })
    .then(text => {
        cidades.innerHTML = text;
    })
}