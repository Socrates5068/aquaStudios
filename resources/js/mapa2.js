/* import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider(); */

const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa2')){
        const lat = -19.589242065828227;
        const lng = -65.75317989371399;
        
        const mapa2 = L.map('mapa2').setView([lat, lng], 17).invalidateSize();
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa2);

        let size = document.getElementById("size");
        size.onclick = badSize2;
        
        /* let mapa = document.getElementById("mapa2");
        mapa.onmouseover = badSize; */
        
        function badSize() {
            mapa2.invalidateSize()           
        }

        function badSize2() {
            setTimeout(badSize,500);    
        }
        
        let marker;
    
        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(mapa2);

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });

        //Detect pin movement
        marker.on('moveend', function(e) {
            marker = e.target;
            const position = marker.getLatLng();

            //center map
            mapa2.panTo( new L.LatLng(position.lat, position.lng));

            //Reverse Geocoding, where pin is placed
            geocodeService.reverse().latlng(position, 17).run(function(error, result) {
                //console.log(result)
                marker.bindPopup(result.address.Match_addr);
                marker.openPopup();
                fillInputs(result);
                badSize();
            })
        });
        
        function fillInputs (result) {
            //console.log(result)

            Livewire.emit('getLatitudeForInput2', result.latlng.lat, result.latlng.lng);
        }
    }
});