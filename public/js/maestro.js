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
		// console.log(sRespMasters);

		drawGrid(sRespMasters.data);
		

		// $.each(sRespMasters.data, function(i, val){

		// 	$("#mastertable tbody").append('<tr id="'+val.id+'" role="row" class="odd">'+
		// 			                  '<td class="sorting_1">'+val.id+'</td>'+
		// 			                  '<td>'+val.name+'</td>'+
		// 			                  '<td>'+val.name+'</td>'+
		// 			                  '<td>'+val.status+'</td>'+
		// 			                '</tr>');
		// });

		// $("#divMaster").removeClass("hidden");

	});
}

function drawGrid(Data) {

	console.log(Data);

	var clients = [
        { "Name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": true },
        { "Name": "Connor Johnston", "Age": 45, "Country": 2, "Address": "Ap #370-4647 Dis Av.", "Married": true },
        { "Name": "Lacey Hess", "Age": 29, "Country": 3, "Address": "Ap #365-8835 Integer St.", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
        { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },

        { "Name": "Ramona Benton", "Age": 32, "Country": 3, "Address": "Ap #614-689 Vehicula Street", "Married": true }
    ];

	 $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 
        filtering: true,
        inserting: false,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,

        pageSize: 10,
        pageButtonCount: 5,
 
        data: Data,
 
        fields: [
            { name: "Id", type: "text", width: 50, validate: "required" },
            { name: "Name", type: "number", width: 100 },
            { name: "descIngles ", type: "text", width: 100 },
            { name: "descEspañol ", type: "text", width: 100},
            { type: "control" }
        ]
    });

}