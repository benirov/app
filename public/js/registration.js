$(document).ready(function()
{
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
	console.log("ruta : "+$("#formUser").attr('action'));
	$.when(postQuery($("#formUser").attr('action') , oData, 1)).done(function (sResp)
	{
		// console.log(sResp)

		// console.log(sResp.code);
		if (sResp.code == 201)
		{
			notify("Registro realizado con exito", "success", "user");
			FormReset($("#formUser"));
		}
		else
		{
			notify(sResp.error, "warning", "times-circle");
		}
	});
}

function getDataconfiguration()
{
	let url = 'http://young-coast-20991.herokuapp.com/'

	$.when(getQuery('Util/getdatasex', 'json', '', true, 1),
		   getQuery('Util/getdatacivilstatus', 'json', '', true, 1),
		   getQuery('Util/getdatatipodoc', 'json', '', true, 1)
		).done(function (sRespSex, sRespCivilStatus, sRespTipoDoc)
		{
			console.log(sRespSex);
			console.log(sRespCivilStatus);
			console.log(sRespTipoDoc);

		});
}