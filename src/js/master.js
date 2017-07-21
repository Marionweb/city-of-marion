docReady(function() {
  var toggleBtn = document.getElementById('menu--side--toggle'),
   closeBtn = document.getElementById('menu--side--close'),
   container = document.querySelector('#container');

  toggleBtn.addEventListener("click", toggleNav);
  closeBtn.addEventListener("click", toggleNav);

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
