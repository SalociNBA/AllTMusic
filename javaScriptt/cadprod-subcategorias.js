//Script para fazer a inclusão do subcategoria conforme alteração da categoria
var selectCategoria = document.getElementById('categoria');
var selectSubCategoria = document.getElementById('subcategoria');

selectCategoria.onchange = () => {

	fetch('../PHP/cadprod2.php?selectcategoria=' + selectCategoria.value)
	.then(response => {
		return response.text();
	})
	.then(texto => {
		selectSubCategoria.innerHTML = texto;
	})
			
}