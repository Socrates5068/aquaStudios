const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#contact_map')){
        //let contact_map = L.map('contact_map').fitWorld();
        let contact_map = L.map('contact_map').setView([-19.586999942356, -65.755079903526], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(contact_map);
        
        marker = new L.marker([-19.586999942356, -65.755079903526], {
            draggable: false,
            autoPan: true
        }).addTo(contact_map);

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });
    }
});