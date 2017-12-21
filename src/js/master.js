'use strict';

docReady(function() {

  // SLIDE-OUT NAVIGATION
  var mainMenuToggleBread = document.getElementsByClassName('menu--side--toggle'),
   mainMenuOpenAnchor = document.getElementsByClassName('menu--side--toggle-open'),
   mainMenuCloseAnchor = document.getElementsByClassName('menu--side--toggle-close'),
   sideMenuCloseBtn = document.getElementById('menu--side--close'),
   container = document.querySelector('body');

  for (var i = 0; i < mainMenuToggleBread.length; i++) {
    mainMenuToggleBread[i].addEventListener('click', toggleNav, false);
  }
  for (var i = 0; i < mainMenuOpenAnchor.length; i++) {
    mainMenuOpenAnchor[i].addEventListener('click', toggleNav, false);
  }
  for (var i = 0; i < mainMenuCloseAnchor.length; i++) {
    mainMenuCloseAnchor[i].addEventListener('click', toggleNav, false);
  }

  sideMenuCloseBtn.addEventListener("click", toggleNav);

  function toggleNav(event) {
    if(!container.hasClass('menu--open')) {
      container.classList.add('menu--open');
      for (var i = 0; i < mainMenuOpenAnchor.length; i++) {
        mainMenuOpenAnchor[i].style.display = 'none';
      }
      for (var i = 0; i < mainMenuCloseAnchor.length; i++) {
        mainMenuCloseAnchor[i].style.display = 'block';
      }
      event.preventDefault();
    } else {
      container.classList.remove('menu--open');
      for (var i = 0; i < mainMenuOpenAnchor.length; i++) {
        mainMenuOpenAnchor[i].style.display = 'block';
      }
      for (var i = 0; i < mainMenuCloseAnchor.length; i++) {
        mainMenuCloseAnchor[i].style.display = 'none';
      }
      event.preventDefault();
    }
  }

  Element.prototype.hasClass = function(className) {
      return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
  };

  // END SLIDE-OUT NAVIGATION


  // REMOVING FOCUS OUTLINE
  // https://hackernoon.com/removing-that-ugly-focus-ring-and-keeping-it-too-6c8727fefcd2
  function handleFirstTab(e) {
    if (e.keyCode === 9) { // the "I am a keyboard user" key
      document.body.classList.add('user-is-tabbing');
      window.removeEventListener('keydown', handleFirstTab);
    }
  }
  window.addEventListener('keydown', handleFirstTab);
  // END REMOVING FOCUS OUTLINE


  // AUTOSIZE TEXTAREA FORM ELEMENTS
  autosize(document.querySelectorAll('textarea'));

});


/*
  CUSTOM FILE INPUT TYPES
  By Mushfiq Shishir, hello@mrshishir.me, www.mrshishir.me
*/

;( function ( document, window, index )
{
  var fileInputs = document.querySelectorAll("input[type='file']");
  Array.prototype.forEach.call( fileInputs, function( input )
  {
    var label  = input.nextElementSibling,
      labelVal = label.innerHTML,
      close  = label.getElementsByTagName('i')[0];

    if (close) {
      close.addEventListener('click',function (e){
        e.preventDefault();
        console.log('clicked');
        clearInputFile(input);
      });
    }

    input.addEventListener( 'change', function( e )
    {
      var fileName = '';
      if( this.files && this.files.length > 1 ) {
        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
      }
      else {
        fileName = e.target.value.split( '\\' ).pop();
      }

      if( fileName ) {
        label.querySelector( 'span' ).innerHTML = fileName;
      }
      else {
        label.innerHTML = labelVal;
      }

      // show the clear icon
      close.style.display = 'block';
      // label.querySelector( 'i' ).onclick = clearInputFile(input);
      //
    });

    // Firefox bug fix
    input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
    input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });


  });

  function clearInputFile(f){
    var label  = f.nextElementSibling,
      labelVal = label.querySelector( 'span' );

    if(f.value){
      try{
        f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
      }catch(err){}
      if(f.value){ //for IE5 ~ IE10
        var form = document.createElement('form'), ref = f.nextSibling;
        form.appendChild(f);
        form.reset();
        ref.parentNode.insertBefore(f,ref);
      }

      // hide the clear icon
      label.querySelector( 'i' ).style.display = 'none';
      // clear text
      while (labelVal.firstChild) labelVal.removeChild(labelVal.firstChild);
    }

  }


}( document, window, 0 ));




// MASK PHONE INPUT
var inputs = Array.from(document.querySelectorAll('input'));
inputs.forEach(function (input) {
  if(input.getAttribute('type')=='tel'){
    input.addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    }, false);
  };
});

// INITIALIZE CHOICES.JS FOR FORM SELECTS
var selects = Array.from(document.querySelectorAll('select'));
selects.forEach(function (select) {
  if(select.hasAttribute('data-choices')){
    var genericSelects = new Choices('[data-choices]', {
      searchEnabled: false,
      itemSelectText: '',
      shouldSort: false
    });
  };
});




//Google Maps JS
//Set Map
function initializeContactMap(mapLat,mapLng) {
    var myLatlng = new google.maps.LatLng(mapLat,mapLng);

    var icon = {
        path: "M37,53 C28.6,53 21.7,46.2 21.7,37.7 C21.7,29.3 28.5,22.4 37,22.4 C45.4,22.4 52.3,29.2 52.3,37.7 C52.3,46.1 45.4,53 37,53 M37,0 L37,0 C16.6,0 0,16.8 0,37.4 C0,55.9 37,100 37,100 C37,100 74,58.5 74,37.4 C74,16.8 57.4,0 37,0",
        fillColor: '#033762',
        fillOpacity: 1,
        strokeWeight: 0,
        scale: .6,
        size: new google.maps.Size(49, 65.5),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(49, 106),
    }

    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,

      disableDefaultUI: true,
      scrollwheel: false,
      navigationControl: false,
      mapTypeControl: false,
      scaleControl: false,
      draggable: false,

      styles: [
        {
          "featureType": "administrative.country",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#063c68"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "visibility": "on"
            },
            {
              "weight": 3
            }
          ]
        },
        {
          "featureType": "administrative.neighborhood",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "landscape.man_made",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#d6ecff"
            }
          ]
        },
        {
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#ddefff"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#b1dbff"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.attraction",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.government",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.medical",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#9dd1fc"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.place_of_worship",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.school",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.sports_complex",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#cae6ff"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#a2d3fb"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "simplified"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.local",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "transit",
          "stylers": [
            {
              "color": "#bfe2ff"
            },
            {
              "visibility": "simplified"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#b1dbff"
            }
          ]
        }
      ]
    }

  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  // Callout Content
  // var contentString = 'Some address here..';

  // Set window width + content
  // var infowindow = new google.maps.InfoWindow({
  //   content: contentString,
  //   maxWidth: 500
  // });

  //Add Marker
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    icon: icon,
    title: 'City of Marion',
    zIndex : -20
  });

  // google.maps.event.addListener(marker, 'click', function() {
  //   infowindow.open(map,marker);
  // });

  //Resize Function
  google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
  });
}
