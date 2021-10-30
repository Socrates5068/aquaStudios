const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa')){
        const lat = -19.5889474;
        const lng = -65.7529797;
    
        const mapa = L.map('mapa').setView([lat, lng], 17);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);
    
        let marker;
    
        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(mapa);

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });

        //Search addresses
        /* const search = document.querySelector('#address_1');
        search.addEventListener('blur', searchAddress); */

        //Detect pin movement
        marker.on('moveend', function(e) {
            marker = e.target;
            const position = marker.getLatLng();

            //center map
            mapa.panTo( new L.LatLng(position.lat, position.lng));

            //Reverse Geocoding, where pin is placed
            geocodeService.reverse().latlng(position, 17).run(function(error, result) {
                //console.log(result)
                marker.bindPopup(result.address.Match_addr);
                marker.openPopup();
                fillInputs(result);
            })
        });

        /* function searchAddress(e) {
            if (e.target.value.length > 1) {
                provider.search({ query: e.target.value })
                .then(result => {
                    if (result) {
                        geocodeService.reverse().latlng(result[0].bounds[0], 16).run(function(error, result) {
                            //marker.bindPopup(result.address.Match_addr);
                            //marker.openPopup();
                            //fillInputs(result);
                        })
                    }
                })
                .catch( error => { 
                    console.log(error)
                })
            }
        } */
        
        function fillInputs (result) {
            /* console.log(result) */
            /* document.querySelector('#address').value = result.address.Address || ''; */
            /* document.querySelector('#lat').value = result.latlng.lat || '';
            document.querySelector('#lng').value = result.latlng.lng || ''; */

            Livewire.emit('getLatitudeForInput', result.latlng.lat, result.latlng.lng);
        }
    }
});