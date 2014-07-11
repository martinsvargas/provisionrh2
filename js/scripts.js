// JavaScript Document

$(document).ready(function(){

		
		
			
			$("nav#main-navigator ul li.submenu a").mouseover(function(){
				
				$(this).next().css('display','block');
				
				});
				
			$("nav#main-navigator ul li.submenu ul").mouseout(function(){
				
				$(this).css('display','none');
				
				})
});

