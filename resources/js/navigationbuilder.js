var App,
  bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

App = (function() {
  function App() {
    this.init = bind(this.init, this);
  }

  App.prototype.init = function() {
    var $notificationContainer, clipboard;
    $notificationContainer = $('#notifications');
    clipboard = new Clipboard('.copy');
    return clipboard.on('success', function(e) {
      return e.clearSelection();
    });
  };

  return App;

})();

$(document).ready(function() {
  var app;
  app = new App();
  return app.init();
});
