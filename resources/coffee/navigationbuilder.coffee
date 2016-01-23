	# Craft.cp.displayNotification('error', 'Item Removed')



class App
  init: =>
  	$notificationContainer = $('#notifications')
  	
  	# Copy Text Function
  	clipboard = new Clipboard('.copy')
  	clipboard.on 'success', (e) ->
  	  e.clearSelection()


$(document).ready ->
  app = new App()
  app.init()