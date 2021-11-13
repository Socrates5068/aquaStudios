const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#edit_mapa1')){
        const lat = document.querySelector('#edit_lat1').value;
        const lng = document.querySelector('#edit_lng1').value;
    
        const edit_mapa1 = L.map('edit_mapa1').setView([lat, lng], 17);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(edit_mapa1);
    
        let marker;
    
        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(edit_mapa1);

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });

        //Detect pin movement
        marker.on('moveend', function(e) {
            marker = e.target;
            const position = marker.getLatLng();

            //center map
            edit_mapa1.panTo( new L.LatLng(position.lat, position.lng));

            //Reverse Geocoding, where pin is placed
            geocodeService.reverse().latlng(position, 17).run(function(error, result) {
                //console.log(result)
                marker.bindPopup(result.address.Match_addr);
                marker.openPopup();
                fillInputs(result);
            })
        });
       
        function fillInputs (result) {
            /* console.log(result) */
            /* document.querySelector('#address').value = result.address.Address || ''; */
            /* document.querySelector('#lat').value = result.latlng.lat || '';
            document.querySelector('#lng').value = result.latlng.lng || ''; */

            Livewire.emit('getLatitudeFromInput', result.latlng.lat, result.latlng.lng);
        }
    }
});