//use a noconflict wrapper to redefine $. WordPress runs jQuery in noconflict mode

jQuery( document ).ready( function( $ ){

	//code in here can use $
	$('#hey-look-here-bar .dismiss').click( function(){
		$('#hey-look-here-bar').fadeOut();
	} );


} );