function validate(e) {
    if (confirm("¿Estás seguro que desea eliminar este registro?")){
        return true;
    }else {
        e.preventDefault();
    }
} 
let linkDelete = document.querySelectorAll(".btn_delete");
for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener("click", validate);
}