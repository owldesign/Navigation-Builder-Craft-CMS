# 	# Craft.cp.displayNotification('error', 'Item Removed')
    # Craft.cp.displayNotice('sup');
do ->

  ns = $('.sortable').nestedSortable(
    forcePlaceholderSize: true
    handle: 'div'
    helper: 'clone'
    items: 'li'
    opacity: .6
    placeholder: 'placeholder'
    revert: 250
    tabSize: 25
    tolerance: 'pointer'
    toleranceElement: '> div'
    maxLevels: 2
    isTree: true
    expandOnHover: 700
    startCollapsed: false
    change: ->
      console.log 'Relocated item'
  )
  $('.expandEditor').attr 'title', 'Click to show/hide item editor'
  $('.disclose').attr 'title', 'Click to show/hide children'
  $('.deleteMenu').attr 'title', 'Click to delete item.'
  $('.disclose').on 'click', ->
    $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass 'mjs-nestedSortable-expanded'
    $(this).toggleClass('ui-icon-plusthick').toggleClass 'ui-icon-minusthick'
  $('.expandEditor, .itemTitle').click ->
    id = $(this).attr('data-id')
    $('#menuEdit' + id).toggle()
    $(this).toggleClass('ui-icon-triangle-1-n').toggleClass 'ui-icon-triangle-1-s'
  $('.deleteMenu').click ->
    id = $(this).attr('data-id')
    $('#menuItem_' + id).remove()
  # $('#serialize').click ->
  #   serialized = $('ol.sortable').nestedSortable('serialize')
  #   $('#serializeOutput').text serialized + '\n\n'
  $('#toHierarchy').click (e) ->
    hiered = $('ol.sortable').nestedSortable('toHierarchy', startDepthCount: 0)
    console.log hiered
    # hiered = dump(hiered)
    # if typeof $('#toHierarchyOutput')[0].textContent != 'undefined' then ($('#toHierarchyOutput')[0].textContent = hiered) else ($('#toHierarchyOutput')[0].innerText = hiered)
  # $('#toArray').click (e) ->
  #   arraied = $('ol.sortable').nestedSortable('toArray', startDepthCount: 0)
  #   arraied = dump(arraied)
  #   if typeof $('#toArrayOutput')[0].textContent != 'undefined' then ($('#toArrayOutput')[0].textContent = arraied) else ($('#toArrayOutput')[0].innerText = arraied)



  # dump = (arr, level) ->
  #   dumped_text = ''
  #   if !level
  #     level = 0
  #   #The padding given at the beginning of the line.
  #   level_padding = ''
  #   j = 0
  #   while j < level + 1
  #     level_padding += '    '
  #     j++
  #   if typeof arr == 'object'
  #     #Array/Hashes/Objects
  #     for item of arr
  #       value = arr[item]
  #       if typeof value == 'object'
  #         #If it is an array,
  #         dumped_text += level_padding + '\'' + item + '\' ...\n'
  #         dumped_text += dump(value, level + 1)
  #       else
  #         dumped_text += level_padding + '\'' + item + '\' => "' + value + '"\n'
  #   else
  #     #Strings/Chars/Numbers etc.
  #     dumped_text = '===>' + arr + '<===(' + typeof arr + ')'
  #   dumped_text

  $form = $('<form id="newNodeModalBox" class="modal fitted"/>')
  $body = $('<div class="body"/>').appendTo($form)
  $modalContainer = $('<div class="modal-container"/>').appendTo($body)
  $buttons = $('<div class="buttons"/>').appendTo($modalContainer)

  $formWrapper = $('<div class="formwrapper"/>').appendTo($modalContainer)
  $navNodeName = $('<input type="text" id="navNodeName" class="text fullwidth" placeholder="' + Craft.t('Node Name') + '"/>').appendTo($formWrapper)
  $submitNavNode = $('<input type="submit" class="btn submit" value="' + Craft.t('Create New Nav Node') + '" />').appendTo($formWrapper)

  # $form = $('<form id="loginmodal" class="modal alert fitted"/>')
  # $body = $('<div class="body"><h2>' + Craft.t('Your session has ended.') + '</h2><p>' + Craft.t('Enter your password to log back in.') + '</p></div>').appendTo($form)
  # $inputContainer = $('<div class="inputcontainer">').appendTo($body)
  # $inputsTable = $('<table class="inputs fullwidth"/>').appendTo($inputContainer)
  # $inputsRow = $('<tr/>').appendTo($inputsTable)
  # $passwordCell = $('<td/>').appendTo($inputsRow)
  # $buttonCell = $('<td class="thin"/>').appendTo($inputsRow)
  # $passwordWrapper = $('<div class="passwordwrapper"/>').appendTo($passwordCell)
  # @$passwordInput = $('<input type="password" class="text password fullwidth" placeholder="' + Craft.t('Password') + '"/>').appendTo($passwordWrapper)
  # @$passwordSpinner = $('<div class="spinner hidden"/>').appendTo($inputContainer)
  # @$loginBtn = $('<input type="submit" class="btn submit disabled" value="' + Craft.t('Login') + '" />').appendTo($buttonCell)
  # @$loginErrorPara = $('<p class="error"/>').appendTo($body)



  $('.addNewNode').on 'click', (e) ->
    e.preventDefault();
    newNodeModal = new (Garnish.Modal)($form)
    # newNodeModal = new (Garnish.Modal)($form,
    #   autoShow: true
    #   closeOtherModals: false
    #   hideOnEsc: false
    #   hideOnShadeClick: false
    #   shadeClass: 'modal-shade dark'
    #   onFadeIn: ->
    #     if !Garnish.isMobileBrowser(true)
    #       # Auto-focus the renew button
    #       setTimeout (->
    #         $navNodeName.focus()
    #       ), 100
    #   onFadeOut: ->
    #     $navNodeName.val ''
    # )

    # NEXT

    # $('.body').addListener(this.$passwordInput, 'textchange', 'validatePassword');
    $('newNodeModalBox').submit ->
      preventDefault();
      console.log 'form submited'


    # login: function(ev)
    # {
    #   if (ev)
    #   {
    #     ev.preventDefault();
    #   }

    #   if (this.validatePassword())
    #   {
    #     this.$passwordSpinner.removeClass('hidden');
    #     this.clearLoginError();

    #     if (typeof Craft.csrfTokenValue != 'undefined')
    #     {
    #       // Check the auth status one last time before sending this off,
    #       // in case the user has already logged back in from another window/tab
    #       this.submitLoginIfLoggedOut = true;
    #       this.checkAuthTimeout();
    #     }
    #     else
    #     {
    #       this.submitLogin();
    #     }
    #   }
    # },

    # submitLogin: function()
    # {
    #   var data = {
    #     loginName: Craft.username,
    #     password: this.$passwordInput.val()
    #   };

    #   Craft.postActionRequest('users/login', data, $.proxy(function(response, textStatus)
    #   {
    #     this.$passwordSpinner.addClass('hidden');

    #     if (textStatus == 'success')
    #     {
    #       if (response.success)
    #       {
    #         this.hideLoginModal();
    #         this.checkAuthTimeout();
    #       }
    #       else
    #       {
    #         this.showLoginError(response.error);
    #         Garnish.shake(this.loginModal.$container);

    #         if (!Garnish.isMobileBrowser(true))
    #         {
    #           this.$passwordInput.focus();
    #         }
    #       }
    #     }
    #     else
    #     {
    #       this.showLoginError();
    #     }

    #   }, this));
    # },

    # showLoginError: function(error)
    # {
    #   if (error === null || typeof error == 'undefined')
    #   {
    #     error = Craft.t('An unknown error occurred.');
    #   }

    #   this.$loginErrorPara.text(error);
    #   this.loginModal.updateSizeAndPosition();
    # },

    # clearLoginError: function()
    # {
    #   this.showLoginError('');
    # }


  # data = 
  #   loginName: Craft.username
  #   password: @$passwordInput.val()
  # Craft.postActionRequest 'users/login', data, $.proxy((response, textStatus) ->
  #   @$passwordSpinner.addClass 'hidden'
  #   if textStatus == 'success'
  #   else
  # )





  # $container = $('.body')

  # Craft.FooBar = Garnish.Base.extend(
  #   sorter: null
  #   init: ->
  #     $table = $('#navigations-list tr')
  #     @sorter = new (Craft.DataTableSorter)($table,
  #       helperClass: 'editabletablesorthelper'
  #       copyDraggeeInputValuesToHelper: true)
  #   addRow: ->
  #     $tr = $('<tr/>')
  #     @sorter.addItems $tr
  # )

  # foo = new Craft.FooBar
  # Craft.FooBar = Garnish.Base.extend(
  #   sorter: null
  #   init: ->
  #     console.log 'im inside you'
  #     $rows = $container.children('.table-rows')
  #     @sorter = new (Garnish.DragSort)($rows,
  #       handle: 'tfoot .move'
  #       axis: 'y'
  #       collapseDraggees: true
  #       magnetStrength: 4
  #       helperLagBase: 1.5
  #       helperOpacity: 0.9)
  #   addRow: ->
  #     $tr = $('<tr/>')
  #     @sorter.addItems $tr
  # )

  # foo = new Craft.FooBar



# class App
#   init: =>
#   	$notificationContainer = $('#notifications')
  	
#   	# Copy Text Function
#   	clipboard = new Clipboard('.copy')
#   	clipboard.on 'success', (e) ->
#   	  e.clearSelection()

    # $container = $('.body')

    # Craft.FieldType = Garnish.Base.extend(
    #   sorter: null
    #   init: ->
    #     console.log 'im inside you'
    #     $rows = $container.children('.nav-list')
    #     @sorter = new (Garnish.DragSort)($rows,
    #       handle: 'tfoot .move'
    #       axis: 'y'
    #       collapseDraggees: true
    #       magnetStrength: 4
    #       helperLagBase: 1.5
    #       helperOpacity: 0.9)
    #   addRow: ->
    #     $tr = $('<tr/>')
    #     @sorter.addItems $tr
    # )

#     console.log 'hello'
    

    # Craft.FieldType = Garnish.Base.extend(
    #   sorter: null
    #   init: ->
    #     $table = $container.children('#navigations-list')
    #     @sorter = new (Craft.DataTableSorter)($table,
    #       helperClass: 'editabletablesorthelper'
    #       copyDraggeeInputValuesToHelper: true)
    #   addRow: ->
    #     $tr = $('<tr/>')
    #     @sorter.addItems $tr
    # )





# $(document).ready ->
#   app = new App()
#   app.init()