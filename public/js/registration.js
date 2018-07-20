$(document).ready(function()
{
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
	 			var oData = BuildForm(SerializeForm($("#formUser")));
	 			SendData(oData);

	 		}
	 	})
	 });
});

function SendData(oData){
	$.when(postQuery($("#formUser").attr('action'), oFd, 0)).done(function (sResp)
	{
		console.log(sResp)
		// if (sResp[0].HttpCode == 201)
		// {
		// 	notify("Registro realizado con exito, por favor verifique su correo electrÃ³nico para continuar con el proceso", "success");
		// 	FormReset($("#AddProveedor"), $("*"));
		// 	$("#txtEmpresa").select2('val', '');
		// 	// $("#txtTipoProveedor").select2('val', '');
		// 	// $("#txtCondProveedor").select2('val', '');
		// }
		// else
		// {
		// 	notify(sResp.Message, "warning");
		// }
	});
}