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

	 var clients = [
        { "Name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false },
        { "Name": "Connor Johnston", "Age": 45, "Country": 2, "Address": "Ap #370-4647 Dis Av.", "Married": true },
        { "Name": "Lacey Hess", "Age": 29, "Country": 3, "Address": "Ap #365-8835 Integer St.", "Married": false },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Ramona Benton", "Age": 32, "Country": 3, "Address": "Ap #614-689 Vehicula Street", "Married": false }
    ];
 
    var countries = [
        { Name: "", Id: 0 },
        { Name: "United States", Id: 1 },
        { Name: "Canada", Id: 2 },
        { Name: "United Kingdom", Id: 3 }
    ];

	 $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
 
        data: clients,
 
        fields: [
            { name: "Name", type: "text", width: 150,, sorting: true validate: "required" },
            { name: "Age", type: "number", width: 50, sorting: true },
            { name: "Address", type: "text", width: 200, sorting: true },
            { name: "Country", type: "select", items: countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married", sorting: true },
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

				// $("#divMaster").removeClass("hidden");
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