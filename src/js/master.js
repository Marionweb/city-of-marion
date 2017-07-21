docReady(function() {
  var mainMenuOpenBtn = document.getElementById('menu--side--toggle-open'),
   mainMenuCloseBtn = document.getElementById('menu--side--toggle-close'),
   sideMenuCloseBtn = document.getElementById('menu--side--close'),
   container = document.querySelector('#container');

  mainMenuOpenBtn.addEventListener("click", toggleNav);
  mainMenuCloseBtn.addEventListener("click", toggleNav);
  sideMenuCloseBtn.addEventListener("click", toggleNav);

  function toggleNav(event) {
    if(!container.hasClass('menu--open')) {
      container.classList.add('menu--open');
      event.preventDefault();
    } else {
      container.classList.remove('menu--open');
      event.preventDefault();
    }
  }

  Element.prototype.hasClass = function(className) {
      return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
  };
});
