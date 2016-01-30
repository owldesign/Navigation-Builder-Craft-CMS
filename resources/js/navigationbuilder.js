(function() {
  var $body, $buttons, $form, $formWrapper, $modalContainer, $navNodeName, $submitNavNode, ns;
  ns = $('.sortable').nestedSortable({
    forcePlaceholderSize: true,
    handle: 'div',
    helper: 'clone',
    items: 'li',
    opacity: .6,
    placeholder: 'placeholder',
    revert: 250,
    tabSize: 25,
    tolerance: 'pointer',
    toleranceElement: '> div',
    maxLevels: 2,
    isTree: true,
    expandOnHover: 700,
    startCollapsed: false,
    change: function() {
      return console.log('Relocated item');
    }
  });
  $('.expandEditor').attr('title', 'Click to show/hide item editor');
  $('.disclose').attr('title', 'Click to show/hide children');
  $('.deleteMenu').attr('title', 'Click to delete item.');
  $('.disclose').on('click', function() {
    $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
    return $(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
  });
  $('.expandEditor, .itemTitle').click(function() {
    var id;
    id = $(this).attr('data-id');
    $('#menuEdit' + id).toggle();
    return $(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
  });
  $('.deleteMenu').click(function() {
    var id;
    id = $(this).attr('data-id');
    return $('#menuItem_' + id).remove();
  });
  $('#toHierarchy').click(function(e) {
    var hiered;
    hiered = $('ol.sortable').nestedSortable('toHierarchy', {
      startDepthCount: 0
    });
    return console.log(hiered);
  });
  $form = $('<form id="newNodeModalBox" class="modal fitted"/>');
  $body = $('<div class="body"/>').appendTo($form);
  $modalContainer = $('<div class="modal-container"/>').appendTo($body);
  $buttons = $('<div class="buttons"/>').appendTo($modalContainer);
  $formWrapper = $('<div class="formwrapper"/>').appendTo($modalContainer);
  $navNodeName = $('<input type="text" id="navNodeName" class="text fullwidth" placeholder="' + Craft.t('Node Name') + '"/>').appendTo($formWrapper);
  $submitNavNode = $('<input type="submit" class="btn submit" value="' + Craft.t('Create New Nav Node') + '" />').appendTo($formWrapper);
  return $('.addNewNode').on('click', function(e) {
    var newNodeModal;
    e.preventDefault();
    newNodeModal = new Garnish.Modal($form);
    return $('newNodeModalBox').submit(function() {
      preventDefault();
      return console.log('form submited');
    });
  });
})();
