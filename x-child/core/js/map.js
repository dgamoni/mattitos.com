 
jQuery(document).ready(function($) { 



var myObject = new Object();
myObject.type = "FeatureCollection";
myObject.features = [];
// myObject.features.push(       
//         {
//         "type": "Feature",
//         "geometry": {
//           "type": "Point",
//           "coordinates": [
//             -77.034084142948,
//             38.909671288923
//           ]
//         },
//         "properties": {
//           "phoneFormatted": "(202) 234-7336",
//           "phone": "2022347336",
//           "address": "1471 P St NW",
//           "city": "Washington DC",
//           "country": "United States",
//           "crossStreet": "at 15th St NW",
//           "postalCode": "20005",
//           "state": "D.C."
//         }
//       });

// console.log(myObject);

console.log( $('.map_wrap').attr('data-id') );

  var data_id = $('.map_wrap').attr('data-id');

   $.getJSON("https://mattitos.com/wp-json/wp/v2/pages/"+data_id,function(data) {
      //console.log(data.acf.location_list);
      $(data.acf.location_list).each(function(index, el) {
        //console.log(el);


      var urll = el.google_map_url.split('@');
      var at = urll[1].split('z');
      var zero = at[0].split(',');
      var lat = zero[0];
      var lon = zero[1];
      
      //console.log(lat);
      //console.log(lon);

        myObject.features.push(       
        {
        "type": "Feature",
        "geometry": {
          "type": "Point",
          "coordinates": [
            lon,
            lat
          ]
        },
        "properties": {
          //"phoneFormatted": "(202) 234-7336",
          "name": el.name,
          "phone": el.phone,
          "address": el.address,
          "url": el.url,
          //"city": "Washington DC",
          //"country": "United States",
          //"crossStreet": "at 15th St NW",
          //"postalCode": "20005",
          //"state": "D.C."
        }
      });

      });
   });

console.log(myObject);


  mapboxgl.accessToken = 'pk.eyJ1IjoiZ2xvYmVydW5uZXJzZW8iLCJhIjoiY2pyZ2kzOWx0MmxidDQ5bGl6MG02Z2lyciJ9.mRVkx_sOgop7hKZBYc2EAw';

  // This adds the map
  var map = new mapboxgl.Map({
    // container id specified in the HTML
    container: 'map',
    // style URL
    style: 'mapbox://styles/mapbox/light-v9',
    // initial position in [long, lat] format
    center: [-96.845551, 32.923003], //32.923003, -96.845551
    // initial zoom
    zoom: 10,
    scrollZoom: false
  });

  // This adds the data to the map
  map.on('load', function (e) {
    // This is where your '.addLayer()' used to be, instead add only the source without styling a layer
    map.addSource("places", {
      "type": "geojson",
      // "data": stores
      "data": myObject
    });
    // Initialize the list
    //buildLocationList(stores);
    buildLocationList(myObject);


      myObject.features.forEach(function(marker, i) {
    console.log(marker);
    // Create an img element for the marker
    var el = document.createElement('div');
    el.id = "marker-" + i;
    el.className = 'marker';
    // Add markers to the map at all points
    new mapboxgl.Marker(el, {offset: [0, -23]})
        .setLngLat(marker.geometry.coordinates)
        .addTo(map);

    el.addEventListener('click', function(e){
        // 1. Fly to the point
        flyToStore(marker);

        // 2. Close all other popups and display popup for clicked store
        createPopUp(marker);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        e.stopPropagation();
        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }

        var listing = document.getElementById('listing-' + i);
        listing.classList.add('active');

    });
  });


  });

  // map.on('load', function(e) {
  // // Add the data to your map as a layer
  //   map.addLayer({
  //     id: 'locations',
  //     type: 'symbol',
  //     // Add a GeoJSON source containing place coordinates and information.
  //     source: {
  //       type: 'geojson',
  //       data: myObject
  //     },
  //     layout: {
  //       'icon-image': 'restaurant-15',
  //       'icon-allow-overlap': true,
  //     }
  //   });
  //   buildLocationList(myObject);
  // });

  // This is where your interactions with the symbol layer used to be
  // Now you have interactions with DOM markers instead
  // myObject.features.forEach(function(marker, i) {
  //   console.log(marker);
  //   // Create an img element for the marker
  //   var el = document.createElement('div');
  //   el.id = "marker-" + i;
  //   el.className = 'marker';
  //   // Add markers to the map at all points
  //   new mapboxgl.Marker(el, {offset: [0, -23]})
  //       .setLngLat(marker.geometry.coordinates)
  //       .addTo(map);

  //   el.addEventListener('click', function(e){
  //       // 1. Fly to the point
  //       flyToStore(marker);

  //       // 2. Close all other popups and display popup for clicked store
  //       createPopUp(marker);

  //       // 3. Highlight listing in sidebar (and remove highlight for all other listings)
  //       var activeItem = document.getElementsByClassName('active');

  //       e.stopPropagation();
  //       if (activeItem[0]) {
  //          activeItem[0].classList.remove('active');
  //       }

  //       var listing = document.getElementById('listing-' + i);
  //       listing.classList.add('active');

  //   });
  // });




 // This will let you use the .remove() function later on
  if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
      if (this.parentNode) {
          this.parentNode.removeChild(this);
      }
    };
  }



 

  var stores = {
    "type": "FeatureCollection",
    "features": [
      {
        "type": "Feature",
        "geometry": {
          "type": "Point",
          "coordinates": [
            -77.034084142948,
            38.909671288923
          ]
        },
        "properties": {
          "phoneFormatted": "(202) 234-7336",
          "phone": "2022347336",
          "address": "1471 P St NW",
          "city": "Washington DC",
          "country": "United States",
          "crossStreet": "at 15th St NW",
          "postalCode": "20005",
          "state": "D.C."
        }
      },
      {
        "type": "Feature",
        "geometry": {
          "type": "Point",
          "coordinates": [
            -77.049766,
            38.900772
          ]
        },
        "properties": {
          "phoneFormatted": "(202) 507-8357",
          "phone": "2025078357",
          "address": "2221 I St NW",
          "city": "Washington DC",
          "country": "United States",
          "crossStreet": "at 22nd St NW",
          "postalCode": "20037",
          "state": "D.C."
        }
      }
      ]
    };

    console.log(stores);


  // // This adds the data to the map
  // map.on('load', function (e) {
  //   // This is where your '.addLayer()' used to be, instead add only the source without styling a layer
  //   map.addSource("places", {
  //     "type": "geojson",
  //     // "data": stores
  //     "data": myObject
  //   });
  //   // Initialize the list
  //   //buildLocationList(stores);
  //   buildLocationList(myObject);

  // });

  // // This is where your interactions with the symbol layer used to be
  // // Now you have interactions with DOM markers instead
  // myObject.features.forEach(function(marker, i) {
  //   // Create an img element for the marker
  //   var el = document.createElement('div');
  //   el.id = "marker-" + i;
  //   el.className = 'marker';
  //   // Add markers to the map at all points
  //   new mapboxgl.Marker(el, {offset: [0, -23]})
  //       .setLngLat(marker.geometry.coordinates)
  //       .addTo(map);

  //   el.addEventListener('click', function(e){
  //       // 1. Fly to the point
  //       flyToStore(marker);

  //       // 2. Close all other popups and display popup for clicked store
  //       createPopUp(marker);

  //       // 3. Highlight listing in sidebar (and remove highlight for all other listings)
  //       var activeItem = document.getElementsByClassName('active');

  //       e.stopPropagation();
  //       if (activeItem[0]) {
  //          activeItem[0].classList.remove('active');
  //       }

  //       var listing = document.getElementById('listing-' + i);
  //       listing.classList.add('active');

  //   });
  // });


  function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 15
      });
  }

  function createPopUp(currentFeature) {
    var popUps = document.getElementsByClassName('mapboxgl-popup');
    if (popUps[0]) popUps[0].remove();


    var popup = new mapboxgl.Popup({closeOnClick: false})
          .setLngLat(currentFeature.geometry.coordinates)
          .setHTML('<h3>'+currentFeature.properties.name+'</h3>' +
            '<h4>' + currentFeature.properties.address + '</h4>'+'<div class="pop_phone">'+ currentFeature.properties.phone +'</div>' +
            '<div><a href="'+currentFeature.properties.url+'" class="more_info" target="_blank">Let\'s see the INFO/MENU</a></div>')
          .addTo(map);
  }


  function buildLocationList(data) {
    for (i = 0; i < data.features.length; i++) {
      var currentFeature = data.features[i];
      var prop = currentFeature.properties;

      var listings = document.getElementById('listings');
      var listing = listings.appendChild(document.createElement('div'));
      listing.className = 'item';
      listing.id = "listing-" + i;

      var link = listing.appendChild(document.createElement('span'));
      //link.href = '#';
      link.className = 'title';
      link.dataPosition = i;
      link.innerHTML = '<span class="prop_name">'+prop.name+'</span>';
      link.innerHTML += prop.address;

      var details = listing.appendChild(document.createElement('div'));
      details.innerHTML = prop.phone;
      // if (prop.phone) {
      //   details.innerHTML += ' &middot; ' + prop.phoneFormatted;
      // }

      var details_url = listing.appendChild(document.createElement('div'));
      details_url.innerHTML = '<a href="'+prop.url+'" class="more_info" target="_blank">Let\'s see the INFO/MENU</a>';




      link.addEventListener('click', function(e){
        // Update the currentFeature to the store associated with the clicked link
        var clickedListing = data.features[this.dataPosition];

        // 1. Fly to the point
        flyToStore(clickedListing);

        // 2. Close all other popups and display popup for clicked store
        createPopUp(clickedListing);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }
        this.parentNode.classList.add('active');

      });
    }
  }


}); //endready
