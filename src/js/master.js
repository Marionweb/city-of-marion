'use strict';

docReady(function() {

  // SLIDE-OUT NAVIGATION
  var mainMenuToggleBread = document.getElementsByClassName('menu--side--toggle'),
   mainMenuOpenAnchor = document.getElementsByClassName('menu--side--toggle-open'),
   mainMenuCloseAnchor = document.getElementsByClassName('menu--side--toggle-close'),
   sideMenuCloseBtn = document.getElementById('menu--side--close'),
   container = document.querySelector('#container');

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


});


/*
  CUSTOM FILE INPUT TYPES
  By Mushfiq Shishir, hello@mrshishir.me, www.mrshishir.me
*/

;( function ( document, window, index )
{
  var inputs = document.querySelectorAll("input[type='file']");
  Array.prototype.forEach.call( inputs, function( input )
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
