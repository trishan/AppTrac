$(document).ready(function(){
  $("#student-search").keyup(function(){
	if($("#student-search").val().length > 0) { 
	  $.ajax({
		url: 'student-search.ajax?partial=' + $("#student-search").val(),
		success: function(data) {
		  $('#student-results').html(data);
		}
	  });
	}
  });
});