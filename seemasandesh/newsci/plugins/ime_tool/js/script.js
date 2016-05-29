$( document ).ready( function () {
	'use strict';

	var imeselector, languages, $imeSelector, $langselector;

//	$( '.lang_class' ).ime({ imePath: '../../' });
	//$( '.lang_class' ).ime({ imePath: '../plugins/ime_tool/' });
	$( '.lang_class' ).ime({ imePath: xb_global_namespace.baseurl+'plugins/ime_tool/' });

	/*$( '.imeboldbtn' ).click( function () {
		document.execCommand( 'bold', false, null );
	} );

	$( '.imeitalicbtn' ).click( function () {
		document.execCommand( 'italic', false, null );
	} );

	$( '.imeunderlinebtn' ).click( function () {
		document.execCommand( 'underline', false, null );
	} );*/
	
	$(document).on('click','.imeboldbtn',function(){
		document.execCommand( 'bold', false, null );
	});
	$(document).on('click','.imeitalicbtn',function(){
		document.execCommand( 'italic', false, null );
	});
	$(document).on('click','.imeunderlinebtn',function(){
		document.execCommand( 'underline', false, null);
	});
	$(document).on('click','.imefontsizebtn',function(){
		var size = prompt('Enter a size 1 - 7', '');
		if(size !== "" &&  size !== null)
		{
			if(size == 1 || size == 2 || size == 3 || size == 4 || size == 5 || size == 6 || size == 7 )
			{
				document.execCommand( 'fontSize', false, size);
			}
			else
			{
			 	alert("enter value between 1-7");
			}
		}
	});
	$(document).on('click','.imelinkbtn',function(){
		var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
		
		var link = prompt('Enter a url', '');
		if(link !== "" &&  link !== null)
		{
			if (!myRegExp.test(link))
			{
               			alert("please enter a valid url like http://google.com");
                 	}
                        else
                        {
                        	document.execCommand( 'createLink', false, link);
                        }
		
		}
	});


	
	// get an instance of inputmethods
	imeselector = $( '.lang_class' ).data( 'imeselector' );
	imeselector.$imeSetting = $([]);
	languages = $.ime.languages;
	// Also test system inputmethods.
	$imeSelector = $( 'select#imeSelector' );
	$langselector = $( 'select#language' );

	function listinputmethods ( language ) {
		var inputmethods = $.ime.languages[language].inputmethods;
		$imeSelector.empty();
		$.each( inputmethods, function ( index, inputmethodId ) {
			var inputmethod = $.ime.sources[inputmethodId];
			$imeSelector.append( $( '<option></option>' )
				.attr( 'value', inputmethodId ).text( inputmethod.name ) );
		} );
		$imeSelector.trigger( 'change' );
	}

	$.each( languages, function ( lang, language ) {
		//console.log(lang+":"+language.autonym);
		if(lang == "en" || lang == "hi")
		{
			if(lang == "hi")	
			{		
				$langselector.append( $( '<option selected></option>' ).attr( 'value', lang ).text( language.autonym ) );
				listinputmethods(lang);
		
				imeselector.selectLanguage( lang );
				var inputmethod = $imeSelector.find( 'option:selected' ).val();
				imeselector.selectIM( inputmethod );
			}
			else
				$langselector.append( $( '<option></option>' ).attr( 'value', lang ).text( language.autonym ) );
		}
	} );
	$imeSelector.on( 'change', function () {
		var inputmethod = $imeSelector.find( 'option:selected' ).val();
		imeselector.selectIM( inputmethod );
		//imeselector.$element.focus();
	} );
	$langselector.on( 'change', function () {
		var language = $langselector.find( 'option:selected' ).val();
		imeselector.selectLanguage( language );
		listinputmethods( language );
	} );
} );