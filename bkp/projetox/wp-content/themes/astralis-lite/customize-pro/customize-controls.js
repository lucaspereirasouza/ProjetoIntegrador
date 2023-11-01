( function( api ) {
	// Extends our custom "astralis-lite" section.
	api.sectionConstructor['astralis-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );