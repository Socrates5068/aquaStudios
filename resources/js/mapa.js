// const { map, result } = require("lodash");

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
            apikey: "AAPTxy8BH1VEsoebNVZXo8HurPBS0yGaf37Qt1VxTCBjAn4DLWmx3OlN5mU-uDONiTLds2sWaDkutCLFLYNMtRw7W0m1NXXmuIhOv8nZczQ3aLduP1-UJPYqkjaRGXD8v8LTaZjc88G34JPq-ux6gtcxOCYnohIlKaKvwrI2Zhi58jFuUFbkRzXGxMRsXcumBx9ehKv-WXz1zXG_gzA3CKDPfXeAN6qWFOpw4kR2HsVpRU0.AT1_dQwB8hFk"
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
                console.log(result)
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