document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#delete')){

        var id = document.getElementById('deleteDate').innerHTML;

        let button = document.getElementById("buttonDelete");
        button.onclick = function(){
            deleteDate(id);
        }

        function deleteDate(dateJs) {
            Livewire.emit('deleteDate', id);            
        }

    }

});