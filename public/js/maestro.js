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

					$("#mastertable tbody").append('<tr id="'+val.id+'" role="row" class="odd">'+
							                  '<td>'+val.id+'</td>'+
							                  '<td>'+val.name+'</td>'+
							                  '<td>'+val.name+'</td>'+
							                  '<td>'+val.status+'</td>'+
							                '</tr>');
				});

				$("#divMaster").removeClass("hidden");
	});
}

function getMasterDetail(val){
	$.when(getQuery('mastersdetail/'+val, 'json', '', true, 1)).done(function (sRespMasters)
	{
		console.log(sRespMasters);
		

		$.each(sRespMasters.data, function(i, val){

			$("#mastertable tbody").append('<tr id="'+val.id+'" role="row" class="odd">'+
					                  '<td class="sorting_1">'+val.id+'</td>'+
					                  '<td>'+val.name+'</td>'+
					                  '<td>'+val.name+'</td>'+
					                  '<td>'+val.status+'</td>'+
					                '</tr>');
		});

		$("#divMaster").removeClass("hidden");

	});
}