/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.1.0
*/

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable(
        {
        "aaSorting": []
        }
        );
	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);