# 	# Craft.cp.displayNotification('error', 'Item Removed')
do ->




  $('.btn').on 'click', (e) ->
    $div = $('<div class="modal">...</div>')
    myModal = new (Garnish.Modal)($div)



  $container = $('.body')

  Craft.FooBar = Garnish.Base.extend(
    sorter: null
    init: ->
      $table = $('#navigations-list tr')
      @sorter = new (Craft.DataTableSorter)($table,
        helperClass: 'editabletablesorthelper'
        copyDraggeeInputValuesToHelper: true)
    addRow: ->
      $tr = $('<tr/>')
      @sorter.addItems $tr
  )

  foo = new Craft.FooBar
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