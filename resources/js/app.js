import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//Codice per modale conferma eliminazione

const deleteButtons = document.querySelectorAll('.delete');
const removeElements = document.querySelectorAll('.remove');
const modalElement = document.getElementById('modal');
const closeElements = document.querySelectorAll('.close');
//const confirmElements = document.querySelectorAll('.confirm');

//DELETE NELLA INDEX

deleteButtons.forEach(deleteButton => {

    // deleteButton.addEventListener('click', function(){
    //     modalElement.classList.add('visible');
    // });

    deleteButton.addEventListener('submit',(e) => {
        e.preventDefault()

        // if(confirmElements.onclick){
        //     deleteButton.submit()
        // };

        if(confirm('Vuoi eliminare questo post?')) {
            deleteButton.submit()
        }
    });

});

//DELETE NELLA SHOW

removeElements.forEach(removeElement => {

    removeElement.addEventListener('click', function(){
        modalElement.classList.add('visible');
    });
});


for(let i = 0; i < closeElements.length; i++){

    const closeElement = closeElements[i];

    closeElement.addEventListener('click', function(){
    
        modalElement.classList.remove('visible');
    });
}