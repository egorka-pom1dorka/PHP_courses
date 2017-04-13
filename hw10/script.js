$(function(){
	$.get("modules/getAllModul.php",{},function(r){
		var a = JSON.parse(r);
		var content ="";

		$.each(a, function(){
			content += "<div class='item'>\
		<img height='180px' src="+this.img+">\
		<h3>"+this.name+"</h3>\
		<p>"+this.price+"</p>\
		<p>"+this.desc+"</p>\
		</div>";
		});

		$("section").html(content);
	})
})
$('#search').click(function(){
	$.get("modules/modul.php", 
	{
		name: $('#name').val(), 
		from: $('#from').val(),
		to: $('#to').val()
	}, 
	function(r){
		var a = JSON.parse(r);
		var content ="";

		$.each(a, function(){
			content += "<div class='item'>\
		<img height='180px' src="+this.img+">\
		<h3>"+this.name+"</h3>\
		<p>"+this.price+"</p>\
		<p>"+this.desc+"</p>\
		</div>";
		});

		$("section").html(content);
	})
})