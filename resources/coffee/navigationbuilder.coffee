# 	# Craft.cp.displayNotification('error', 'Item Removed')
    # Craft.cp.displayNotice('sup');
do ->

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