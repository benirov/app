//Funcion para mostrar un mensaje de notificacion, los tipos son: success, info, danger, warning
function notify(mensaje, tipo, modo, url)
{
	modo = modo || 0;
	url = url || '';
	//modificada
    switch (modo)
	{
        case 0:
            //case 0 es notificacion normal 
            $.notify({
                // options
                message: mensaje
            }, {
                // settings
                type: tipo,
                offset: 20,
                spacing: 10,
                z_index: 9999,
                
                allow_dismiss: false,
                icon: 'fa fa-check-circle',
                mouse_over: "pause",
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
            });
            break;
        case 1:
            //case 1 es notificacion estatica con url
            $.notify({
                // options
                message: mensaje,
                url: url,
                target: '_blank'
            }, {
                // settings
                type: tipo,
                allow_dismiss: true,
                offset: 20,
                spacing: 10,
                z_index: 9999,
                delay: 0,
                timer: 1000,
                mouse_over: "pause",
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
            });
            break;
    }

    setTimeout(function() {
        $.notifyClose('top-right');
    }, 3000);
}

function SerializeForm(oObject) {
    var myform = oObject;
    var disabled = myform.find(':input:disabled').removeAttr('disabled');
    var serialized = myform.serializeArray();
    disabled.attr('disabled', 'disabled');
    return serialized;
}

function BuildForm(sSerialized)
{
    var fd = new FormData();
    $.each(sSerialized, function (key, input) {
        fd.append(input.name, input.value);
    });

    return fd;
}

function InputValidator(oObject) 
{
                
var Expresiones = 
                {
            
                    RegID :
                            {
                                Reg :/^([JGV])([\-][0-9]{4,10})$/,
                                Mensaje : "Debe cumplir el formato requerido Ej.: J-000000000"
                            },
                    RegID2: 
                            {
                                Reg :/^([JGV])([0-9]{0,12})$/,
                                Mensaje : "Debe cumplir el formato requerido Ej.: J000000000"
                                
                            },
                    RegCI: 
                            {
                                Reg :/^([VE])([\-])([0-9]{4,12})$/,
                                Mensaje : "Debe cumplir el formato requerido Ej.: V-000000000"

                            },
                            
                    RegDescrip: 
                            {   
                                Reg: /^([ A-Za-z0-9\.\,\-\&\(\)]{0,120})$/i,
                                Mensaje : "La razon social o el Nombre no es valida"
                            },
                            
                    RegDireccion: 
                            {
                                Reg : /^([ A-Za-z0-9\.\,\-\°]{0,180})$/i,
                                Mensaje : "La dirección no es valida"
                            },
                        
                    RegNombre: 
                            {
                                Reg : /^([ A-Za-z]{0,60})$/i,
                                Mensaje: "Este campo no admite caracteres especiales"
                            },
                                
                    RegApellido: 
                            {
                                Reg:/^([ A-Za-z]{0,60})$/i,
                                Mensaje: "Este campo no admite caracteres especiales"
                            },
                        
                    RegUsuario: 
                            {
                                Reg :/^([ A-Za-z0-9]{0,20})$/i,
                                Mensaje: "El usuario no es valido"
                            },
                                
                    RegAlias: 
                            {
                                Reg : /^([ A-Za-z0-9]{0,20})$/i,
                                Mensaje: "Este campo no admite caracteres especiales"
                            },
                            
                    RegTelef: 
                            {
                                Reg : /^([0-9]{1,3})([0-9]{15})([0-9])$/,
                                Mensaje: "El telefono no es valido. Este campo no admite caracteres especiales"
                            },
                            
                    RegCorreo: 
                            {
                                Reg : /^([A-Za-z0-9])([A-Za-z0-9_\-\.])+@([a-z0-9\-])+\.(([a-z0-9]{2,20})\.)?([a-z0-9]{2,20})$/,
                                Mensaje: "El correo no es valido"
                            },
                        
                    RegClave: 
                            {
                                Reg :/^([ A-Za-z0-9]{0,20})$/,
                                Mensaje: "La clave no es valida. Este campo no admite caracteres especiales"
                            },
                        
                    RegNum: 
                            {
                                Reg : /([0-9\,])/,
                                Mensaje : "el numero no es valido"
                            },
                        
                    RegNumsimple: 
                                {
                                    Reg : /([0-9])/,
                                    Mensaje: "el numero no es valido"
                                },
                        
                    RegSerial: 
                                {
                                    Reg : /^([0-9]{7})$/i,
                                    Mensaje: "el Serial no es valido"
                                },
                        
                    RegComentario : 
                                    {
                                        Reg : /^([ A-Za-z0-9\.\,\-\&\(\)]{0,180})$/i,
                                        Mensaje: "el comentario no es valido"
                                    },
                        
                    RegCodigo : 
                                {
                                    Reg : /^([ A-Za-z0-9]{0,30})$/,
                                    Mensaje: "el codigo no es valido"
                                },
                    
                    RegLicencia : 
                                {
                                    Reg : /^([ A-Za-z0-9]{0,20})$/i,
                                    Mensaje: "La licencia no es valida"
                                },
                        
                    RegNumTran : 
                                {
                                    Reg : /^([ A-Za-z0-9]{0,20})$/i,
                                    Mensaje: "El numero de transacción no es valido"
                                },
                        
                    RegZonaPostal : 
                                    {
                                        Reg : /([0-9]){0,10}$/,
                                        Mensaje: "La zona postal no es valida"
                                    },
                    
                    RegClaseSaint : 
                                    {
                                        Reg : /^([ A-Za-z0-9]{0,10})$/,
                                        Mensaje : "La clase no es valida"
                                    },
                        
                    RegUserFTP : 
                                    {
                                        Reg : /([ A-Za-z0-9\.\_\-\@]{0,30})$/i,
                                        Mensaje : "nombre de usuario no es valido"
                                    },
                    
                    RegNombreDominio : 
                                    {
                                        Reg : /^([ A-Za-z0-9\.\@\-]{0,50})$/i,
                                        Mensaje : "Nombre de dominio no es valido"
                                    },
                        
                    RegCtaBancaria : 
                                    {
                                        Reg : /^([0-9]{20})$/i,
                                        Mensaje : "Numero de cuenta bancaria no es valido. debe poseer 20 digitos"
                                        
                                    }
                };
    var Class = $(oObject).attr("class").split(" ");
    $.each(Class, function(index, clase)
    {
        if(Expresiones.hasOwnProperty(clase))
        {
            if($(oObject).val().trim() != '')
            {
                if($(oObject).val().trim().match(Expresiones[clase].Reg))
                {
                    $("span[for="+$(oObject).attr('id')+"]").addClass("required").html('');
                    $(oObject).removeClass('borderRed');
                    
                    
                }
                else
                {
                    $(oObject).addClass('borderRed');
                    $("span[for="+$(oObject).attr('id')+"]").addClass("required").html(Expresiones[clase].Mensaje)
                }
            }
            else
            {
                $(oObject).removeClass('borderRed');
                $("span[for="+$(oObject).attr('id')+"]").addClass("required").html('');
            }
            
        }
    });

}