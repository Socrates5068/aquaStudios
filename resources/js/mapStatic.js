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
            apikey: "AAPTxy8BH1VEsoebNVZXo8HurPBS0yGaf37Qt1VxTCBjAn4DLWmx3OlN5mU-uDONiTLds2sWaDkutCLFLYNMtRw7W0m1NXXmuIhOv8nZczQ3aLduP1-UJPYqkjaRGXD8v8LTaZjc88G34JPq-ux6gtcxOCYnohIlKaKvwrI2Zhi58jFuUFbkRzXGxMRsXcumBx9ehKv-WXz1zXG_gzA3CKDPfXeAN6qWFOpw4kR2HsVpRU0.AT1_dQwB8hFk"
        });
    }
});
