$(document).ready(function()
{
	$(".select2").select2();
	getMasters();


	$("#idmaster").on("change", function(){
		if($(this).val() == 0 || $(this).val() == ''){
			getMasterDetail($(this).val());
			console.log($(this).val());
		}
	})
});

function getMasters(){
	$.when(getQuery('masters', 'json', '', true, 1)).done(function (sRespMasters)
	{
		console.log(sRespMasters);
		

		$.each(sRespMasters.data, function(i, val){
			$("#idmaster").append('<option value="'+val.id+'">'+val.name+'</option>');
		});

	});
}

function getMasterDetail(val){
	$.when(getQuery('mastersdetail/'+val, 'json', '', true, 1)).done(function (sRespMasters)
	{
		console.log(sRespMasters);
		

		$.each(sRespMasters.data, function(i, val){
			$("#idmaster").append('<option value="'+val.id+'">'+val.name+'</option>');
		});

	});
}