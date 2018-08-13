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
	$.when(getQuery('masters', '', '', true, 0)).done(function (sRespMasters)
	{
		// console.log(sRespMasters);

		console.log(sRespMasters.data);


		drawGrid(sRespMasters.data);
		
		

				// $("#divMaster").removeClass("hidden");
	});
}

function getMasterDetail(val){
	
	$.when(getQuery('masterdetail/'+val, 'json', '', true, 0)).done(function (sRespMastersDetail)
	{
		drawGrid(sRespMastersDetail.data);
		// console.log(sRespMasters.data[0]);


		// drawGrid(sRespMasters.data[0]);
		

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
function deletedMaster(row){
	console.log("deletedMaster");
	console.log(row);
}

function drawGrid(Data) {

	// console.log(Data);

	

	 $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 		tableid: "tblMaster",
        filtering: true,
        inserting: false,
        // editing: false,
        sorting: true,
        paging: true,
        autoload: true,
        callajax: true,
        execajax: 'getMasterDetail',
        functionAjaxDeleted: 'deletedMaster',

		 
        // data: Data,
        controller: {
            data:Data,
            loadData: function (filter) {
                	return $.grep(this.data, function(item) {
                		return (!filter.id || item.id === filter.id)
                    	&& (!filter.name || item.name.indexOf(filter.name) > -1)
                    	&& (!filter.status || item.status === filter.status);
                });
                     
        }
    },
 
        fields: [
            { name: "id", type: "number", width: 50, validate: "required", sorting: true, editing: false, },
            { name: "name", type: "text", width: 100, sorting: true },
            { name: "status", type: "number", width: 50, sorting: true },
            // { name: "descEspañol ", type: "text", width: 100},
            { type: "control" }
        ]
    });

}