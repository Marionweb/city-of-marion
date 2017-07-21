docReady(function() {
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
});
