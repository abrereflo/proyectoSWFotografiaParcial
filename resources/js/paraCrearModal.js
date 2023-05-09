const btnAbrirModal = document.querySelector("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal"); //Aqui tengo que modificar
const modal = document.querySelector("#modal");

btnAbrirModal.addEventListener("click",()=>{
    modal.showModal();
});

btnCerrarModal.addEventListener("click",()=>{
    modal.close();
});