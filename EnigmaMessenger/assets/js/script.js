$(function(){
	'use strict';
	$(document).ready(function(){
		var x = function(i){
			return function(j){
				return j;
			}
		};
		console.log(x(true)("hey"));
	});
})