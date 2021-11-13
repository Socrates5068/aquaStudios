const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#show_mapa1')){
        const lat = document.querySelector('#edit_lat1').value;
        const lng = document.querySelector('#edit_lng1').value;
    
        const show_mapa1 = L.map('show_mapa1').setView([lat, lng], 16);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(show_mapa1);
    
        let marker;
    
        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: false,
            autoPan: true
        }).addTo(show_mapa1);

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });
    }
});