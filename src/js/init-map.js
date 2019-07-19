const loadGoogleMapsApi = require('load-google-maps-api');
let googleMaps = null;
loadGoogleMapsApi({
    libraries:['places'],
    key:'AIzaSyD3ObqUxuk5Dj_VvBeZ_xFEuR9m8WCKGiQ'
}).then(function(_googleMaps){
    
    googleMaps = _googleMaps;
    
    const mapCont = document.querySelector('.mapCont');
    const mapContMarker = document.querySelector('.mapCont .marker');
    
    let lt = mapContMarker.dataset.lat;
    let lg = mapContMarker.dataset.lng;
    let myCoord = {lat:lt, lng:lg};
    
    const args = {
        zoom: 16,
        center: myCoord 
    }
    const map =  new googleMaps.Map(mapCont, args);
    
    const mark = googleMaps.Marker({
        position: myCoord,
        map: map,
        title: 'Top Rempvals'
    })
    
    const fromField = document.getElementById('fromAutocomplete');
    const toField = document.getElementById('toAutocomplete');
    let auto1 = new googleMaps.places.Autocomplete(fromField);
    let auto2 = new googleMaps.places.Autocomplete(toField);
    
    
    
    const directionsMap = new googleMaps(document.querySlector('.getFreeQuote--chekout .mapContDestination'));
    
    
    
}).catch(function(error){
    console.error(error)
});

