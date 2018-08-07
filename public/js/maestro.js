$(document).ready(function()
{
	$(".select2").select2();
	getMasters();
});

function getMasters()
{
	$.when(getQuery('masters', 'json', '', true, 1)).done(function (sRespMasters)
		{
			console.log(sRespMasters);
			

			$.each(sRespMasters.data, function(i, val){
				$("#idmaster").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

		});
}