(function($) {

  function loadPostList() {

    console.log('loadPostList called...')

    var filterPropertyType = $('#filter_topic').val()

    // do ajax call to get new filtered posts
    data = {
      action: 'frame_post_list_load',
      filters: {
        propertyType: filterPropertyType
      }
    }
    $.post( frame.ajaxurl, data, function( response ) {

      response = JSON.parse( response )

      if ( response.status == 'success' ) {

        // replace content
        $('.frame-post-list-canvas').html( response.content )

      } else {

      }
    });

  }

  // init load
  // loadPostList();

  $('#filter_topic').on('change', function() {
    loadPostList();
  })

})( jQuery );
