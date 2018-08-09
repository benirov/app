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
	$.when(getQuery('masters', '', '', true, 1)).done(function (sRespMasters)
	{
		// console.log(sRespMasters);

		console.log(sRespMasters.data);


		drawGrid(sRespMasters.data);
		
		

				// $("#divMaster").removeClass("hidden");
	});
}

// function getMasterDetail(val){
// 	$.when(getQuery('mastersdetail/'+val, 'json', '', true, 1)).done(function (sRespMasters)
// 	{
// 		console.log(sRespMasters.data[0]);


// 		drawGrid(sRespMasters.data[0]);
		

// 		// $.each(sRespMasters.data, function(i, val){

// 		// 	$("#mastertable tbody").append('<tr id="'+val.id+'" role="row" class="odd">'+
// 		// 			                  '<td class="sorting_1">'+val.id+'</td>'+
// 		// 			                  '<td>'+val.name+'</td>'+
// 		// 			                  '<td>'+val.name+'</td>'+
// 		// 			                  '<td>'+val.status+'</td>'+
// 		// 			                '</tr>');
// 		// });

// 		// $("#divMaster").removeClass("hidden");

// 	});
// }

function drawGrid(Data) {

	// console.log(Data);

	var db = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id.indexOf(filter.status) > -1)
                    && (!filter.name || client.name === filter.name)
                    && (!filter.status || client.status.indexOf(filter.status) > -1)
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    db.data = Data;

    window.db = db;

	 $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 
        filtering: true,
        inserting: false,
        editing: true,
        sorting: true,
        paging: true,
        autoload: false,

		 
         // data: Data,
        controller: db,
            // loadData: function (filter) {
            //     return $.grep(this.data, function (item) {
            //     	console.log(item);
            //     	console.log(filter);
            //         return (!filter.id || item.id.indexOf(filter.id) >= 0) &&
            //         		(!filter.name || item.name.indexOf(filter.name) >= 0) && 
            //         		(!filter.status || item.status.indexOf(filter.status) >= 0)
            //     });
            // },          
        
 
        fields: [
            { name: "id", type: "text", width: 50, validate: "required", sorting: true, editing: false, },
            { name: "name", type: "text", width: 100, sorting: true },
            { name: "status", type: "text", width: 50, sorting: true },
            // { name: "descEspañol ", type: "text", width: 100},
            { type: "control" }
        ]
    });

}