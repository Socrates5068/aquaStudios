import format from 'date-fns/format'
import { es } from 'date-fns/locale'
document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#schedule')){
        var date = document.getElementById('date').innerHTML;

        var result = format(new Date(date), 'PPPP', {
            locale: es
        })

        var showDate = document.getElementById('showDate');
        showDate.innerHTML = result;
    }

});