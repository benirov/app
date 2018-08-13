$(document).ready(function()
{

	$(".select2").select2();
	getDataconfiguration();

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
	
	 $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });

	 $("#InsertUser").click(function()
	 {
	 	EvalReg($("#formUser"), function(bResp)
	 	{
	 		if(bResp)
	 		{
	 			if($("#txtpassword").val().trim() !=  $("#txtpasswordconfirmation").val().trim())
	 			{
	 				notify("Contraseñas no son iguales","warning", "exclamation-triangle");
	 				return false;

	 			}
	 			var oData = BuildForm(SerializeForm($("#formUser")));
	 			SendData(oData);

	 		}
	 	})
	 });
});

function SendData(oData){
	$.when(postQuery($("#formUser").attr('action') , oData, 1)).done(function (sResp)
	{
		// console.log(sResp)

		// console.log(sResp.code);
		if (sResp.code == 201)
		{
			notify("Registro realizado con exito", "success", "fa fa-user");
			// FormReset($("#formUser"));
		}
		else
		{
			notify(sResp.error, "warning", "fa fa-times-circle");
		}
	});
}

function getDataconfiguration()
{
	let url = 'http://young-coast-20991.herokuapp.com/'

	$.when(getQuery('Util/getdatasex', 'json', '', true, 1),
		   getQuery('Util/getdatacivilstatus', 'json', '', true, 1),
		   getQuery('Util/getdatatipodoc', 'json', '', true, 1),
		   getQuery('Util/getdatacity', 'json', '', true, 1)
		).done(function (sRespSex, sRespCivilStatus, sRespTipoDoc, sRespTipoCity)
		{

			// console.log(sRespSex[data]);

			$.each(sRespSex[0].data, function(i, val){
				console.log(val);
				$("#txtsex").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

			$.each(sRespCivilStatus[0].data, function(i, val){
				$("#txtcivilstatus").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

			$.each(sRespTipoDoc[0].data, function(i, val){
				$("#txttypedoc").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

			$.each(sRespTipoCity[0].data, function(i, val){
				$("#txtcity").append('<option value="'+val.id+'">'+val.name+'</option>');
			});

		});
}