const { map, result } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#mapStatic')){
        //let mapStatic = L.map('mapStatic').fitWorld();
        let mapStatic = L.map('mapStatic').setView([-19.589242065828227, -65.75317989371399], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapStatic);
        
        document.getElementById('select-location').addEventListener('change', function(e){
            let coords = e.target.value.split(",");
            mapStatic.flyTo(coords, 17);

            marker = new L.marker(coords, {
                draggable: false,
                autoPan: true
            }).addTo(mapStatic);
        })

        //Geocode service
        const geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK528d8e28633d4e4c83da0275dd9e47a2rpgO3F3VeG7sYd17rgzJr60fK80F6aZoz5swMRZzp35ppAYF7blQYXLo2D1zb7D9"
        });
    }
});