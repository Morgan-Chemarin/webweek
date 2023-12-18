window.onload = function () {
    var map = L.map('map').setView([45.045211, 3.881084], 16); 
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = L.marker([45.045211, 3.881084]).addTo(map);
    
    marker.bindPopup("<b>C'est ici !</b><br>13 Av. de la Cathédrale, <br>43000 Le Puy-en-Velay").openPopup();

};