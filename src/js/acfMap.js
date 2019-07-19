jQuery.fn.exists = function () {
    return this.length > 0;
}

//var cityInput1 = document.getElementById('fromAutocomplete');
//var cityInput2 = document.getElementById('toAutocomplete');
//var options = {
//    types: ['geocode'],
//    componentRestrictions: {
//        country: 'au'
//    }
//};
//var autoComplete1 = new google.maps.places.Autocomplete(cityInput1, options);
//var autoComplete2 = new google.maps.places.Autocomplete(cityInput2, options);
//
//function initMap() {
//    var directionsService = new google.maps.DirectionsService();
//    var directionsDisplay = new google.maps.DirectionsRenderer();
//    var map = new google.maps.Map(document.querySelector('.mapContDestination'), {
//        zoom: 17,
//        center: {
//            lat: -37.9477659,
//            lng: 145.0530577
//        }
//    });
//    directionsDisplay.setMap(map);
//
//    var onChangeHandler = function () {
//        calculateAndDisplayRoute(directionsService, directionsDisplay);
//    };
//    document.getElementById('fromAutocomplete').addEventListener('change', onChangeHandler);
//    document.getElementById('toAutocomplete').addEventListener('change', onChangeHandler);
//}
//
//function calculateAndDisplayRoute(directionsService, directionsDisplay) {
//    directionsService.route({
//        origin: document.getElementById('fromAutocomplete').value,
//        destination: document.getElementById('toAutocomplete').value,
//        travelMode: 'DRIVING'
//    }, function (response, status) {
//        if (status === 'OK') {
//            directionsDisplay.setDirections(response);
//        } else {
//            alert('Directions request failed due to ' + status);
//        }
//    });
//}

function initMap() {
  var map = new google.maps.Map(document.querySelector('.mapContDestination'), {
    mapTypeControl: false,
    center: {lat: -37.9477659, lng: 145.0530577},
    zoom: 17
  });

  new AutocompleteDirectionsHandler(map);
}


function AutocompleteDirectionsHandler(map) {
    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = 'DRIVING';
    this.directionsService = new google.maps.DirectionsService;
    this.directionsDisplay = new google.maps.DirectionsRenderer;
    this.directionsDisplay.setMap(map);

    var originInput = document.getElementById('fromAutocomplete');
    var destinationInput = document.getElementById('toAutocomplete');
    
    var options = {
        types: ['geocode'],
        componentRestrictions: {
            country: 'au'
        }
    };

    var originAutocomplete = new google.maps.places.Autocomplete(originInput, options);
    originAutocomplete.setFields(['place_id']);

    var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, options);
    destinationAutocomplete.setFields(['place_id']);

    this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
    this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
}

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
    autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Please select an option from the dropdown list.');
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  this.directionsService.route(
      {
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode
      },
      function(response, status) {
        if (status === 'OK') {
          me.directionsDisplay.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
};


function new_map($el) {
    var $markers = $el.find('.marker');
    var args = {
        zoom: 12,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map($el[0], args);
    map.markers = [];
    $markers.each(function () {

        add_marker($(this), map);

    });
    center_map(map);
    return map;

}

function add_marker($marker, map) {
    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

    var marker = new google.maps.Marker({
        position: latlng,
        map: map
    });

    map.markers.push(marker);
    if ($marker.html()) {
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });
        google.maps.event.addListener(marker, 'click', function () {

            infowindow.open(map, marker);

        });
    }

}

function center_map(map) {
    var bounds = new google.maps.LatLngBounds();
    $.each(map.markers, function (i, marker) {

        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

        bounds.extend(latlng);

    });

    if (map.markers.length == 1) {
        map.setCenter(bounds.getCenter());
        map.setZoom(12);
    } else {
        map.fitBounds(bounds);
    }
}

$(document).ready(function () {
    if ($('.acf-map').exists()) {
        $('.acf-map').each(function () {
            mapFooter = new_map($(this));
        });
    }
    initMap();
})
