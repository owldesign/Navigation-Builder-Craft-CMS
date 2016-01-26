(function() {
  var $body, $buttons, $form, $formWrapper, $modalContainer, $navNodeName, $submitNavNode;
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
