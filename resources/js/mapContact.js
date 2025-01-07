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
            apikey: "AAPTxy8BH1VEsoebNVZXo8HurPBS0yGaf37Qt1VxTCBjAn4DLWmx3OlN5mU-uDONiTLds2sWaDkutCLFLYNMtRw7W0m1NXXmuIhOv8nZczQ3aLduP1-UJPYqkjaRGXD8v8LTaZjc88G34JPq-ux6gtcxOCYnohIlKaKvwrI2Zhi58jFuUFbkRzXGxMRsXcumBx9ehKv-WXz1zXG_gzA3CKDPfXeAN6qWFOpw4kR2HsVpRU0.AT1_dQwB8hFk"
        });
    }
});
