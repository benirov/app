$(document).ready(function()
{
	$(".select2").select2();
	getMasters();


	$("#idmaster").on("change", function(){
		if($(this).val() == 0 || $(this).val() == ''){
			getMasterDetail($(this).val());
			console.log($(this).val());
		}
	});

	$(document).on("click", "#mastertable tbody tr", function(event)
	{
		console.log("click");
		$("#mastertable tbody tr").removeClass("active");
		$(this).toggleClass("active");
	});

	 $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
 
        data: clients,
 
        fields: [
            { name: "Name", type: "text", width: 150, validate: "required" },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            { type: "control" }
        ]
    });

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