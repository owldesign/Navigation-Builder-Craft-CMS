(function() {
  var $container, foo;
  $('.btn').on('click', function(e) {
    var $div, myModal;
    $div = $('<div class="modal">...</div>');
    return myModal = new Garnish.Modal($div);
  });
  $container = $('.body');
  Craft.FooBar = Garnish.Base.extend({
    sorter: null,
    init: function() {
      var $table;
      $table = $('#navigations-list tr');
      return this.sorter = new Craft.DataTableSorter($table, {
        helperClass: 'editabletablesorthelper',
        copyDraggeeInputValuesToHelper: true
      });
    },
    addRow: function() {
      var $tr;
      $tr = $('<tr/>');
      return this.sorter.addItems($tr);
    }
  });
  return foo = new Craft.FooBar;
})();
