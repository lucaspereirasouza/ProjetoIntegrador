( function( api ) {

	// Extends our custom "online-video-games" section.
	api.sectionConstructor['online-video-games'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );