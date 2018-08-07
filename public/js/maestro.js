$(document).ready(function()
{
	$(".select2").select2();
	getMasters();
});

function getMasters()
{
	$.when(getQuery('masters', 'json', '', true, 1),
		).done(function (sRespMAsters)
		{

			// console.log(sRespSex[data]);

			$.each(sRespMAsters[0].data, function(i, val){
				$("#idmaster").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

		});
}