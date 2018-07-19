$(document).ready(function()
{
	 $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });

	 $("#InsertUser").click(fuction()
	 {
	 	InputValidator($("#formUser"), function(bResp)
	 	{
	 		if(bResp)
	 		{
	 			var oData = buildForm(SerializeForm("#formUser"));
	 			SendData(Data);

	 		}
	 	})
	 });
	notify("pruebas", "success");
});

function SendData(oData){
	$.when(postQuery('/users', oData, 0,)).then(funtion(sResp){
		if(sResp.data.status =)
	})
}