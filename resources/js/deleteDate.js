document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#delete')){

        var dateJs = document.getElementById('deleteDate').innerHTML;

        let button = document.getElementById("buttonDelete");
        button.onclick = function(){
            deleteDate(dateJs);
        }

        function deleteDate(dateJs) {
            Livewire.emit('deleteDate', dateJs);            
        }

    }

});