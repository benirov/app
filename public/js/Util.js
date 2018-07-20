//Funcion para mostrar un mensaje de notificacion, los tipos son: success, info, danger, warning
function notify(mensaje, tipo, modo, url)
{
    console.log(tipo);
	modo = modo || 0;
	url = url || '';
	//modificada
    switch (modo)
	{
        case 0:
            //case 0 es notificacion normal 
            $.notify({
                // options
                message: mensaje,
                icon: 'fa fa-check-circle',
            },{
                type: tipo,
                offset: 20,
                spacing: 10,
                z_index: 9999,
                delay: 2500,
                timer: 1000,
                allow_dismiss: false,
                
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


function EvalReg(formulario ,callback) 
{
    // console.log(formulario);
    $("label").removeClass("required");
    $("*").removeClass('borderRed');
    $("span").removeClass("required");
    var respuesta = true;
    var requerido = 0;
    var Texts = [];
    var Radio = [];
    var checkboxs = [];
    var selects = [];
    var TextArea = [];
    var elements = [];
    var g =0; 

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

    Texts = formulario.find(':input[type="text"], input[type="password"], input[type="tel"], input[type="number"], input[type="email"], input[type="time"]');
    Selects = formulario.find('select');
    Radio = $("#"+formulario.attr('id')+ " .RadiosDiv");/*formulario.find(':input[type="radio"]');*/
    // console.log("text: "+Texts);
    Checkboxs = $(".CheckboxDiv");/*formulario.find(':input[type="checkbox"]');*/
    TextArea = formulario.find('textarea');
    
    var b = [];
    $.each(Radio, function (i, val) 
    {
        a = $(val).find(':input');
        b.push($(a).attr('name'));
        
    });
    
    $.each(b, function (i, val) 
    {
        if($('input:radio[name='+val+']').hasClass('Requerido') == true && $('input:radio[name='+val+']').is(':checked') == false)
        {
            respuesta = false;
            $("label[for="+$('input:radio[name='+val+']').attr('id')+"]").addClass("required");
            requerido++;
        }
    });
    
    // console.log(Selects);
    $.each(Selects, function (i, val)
    {
        // console.log(Selects[i]);
        if($(Selects[i]).hasClass('Requerido') == true && ($(Selects[i]).val() == null || $(Selects[i]).val() == '' || typeof($(Selects[i]).val())=="undefined" || $(Selects[i]).val() == "-1"))
        {
            // console.log($(Selects[i]).val());
             respuesta = false;
            $("label[for="+$(Selects[i]).attr('id')+"]").addClass("required");
            requerido++;
            // return false;
        }
    });

    $.each(TextArea, function (i, val) 
    {
        // console.log(Selects[i]);
        if($(TextArea[i]).hasClass('Requerido') == true &&  $(TextArea[i]).val() == '')
        {
            // console.log("Selects");
             respuesta = false;
            $("label[for="+$(TextArea[i]).attr('id')+"]").addClass("required");
            requerido++;
            // return false;
        }
    });
    
    var c;
    var d = [];
    
    $.each(Checkboxs, function (i, val) 
    {
        c = $(val).find(':input');
        d.push(c.attr('name')); 
        
    });
    
    
    $.each(d, function (i, val) 
    {
        // console.log("i: "+i);
        // console.log("val: "+val);
        if($('input:checkbox[name='+val+']').hasClass('Requerido') == true && $('input:checkbox[name='+val+']').is(':checked') == false)
        {
            console.log("falso");
            respuesta = false;
            $("label[for="+$('input:checkbox[name='+val+']').attr('id')+"]").addClass("required");
            requerido++;
        }
    });

    /*$.each(Checkboxs, function (i, val) 
    {
        if($(Checkboxs).hasClass('Requerido') == true && $(Checkboxs).is(':checked') == false)
        {
            // console.log("Checkboxs");
             respuesta = false;
            $("label[for="+$(Checkboxs).attr('id')+"]").addClass("required");
            requerido++;
            // return false;
        }
    });*/
    
    $.each(Texts, function (i, val) 
    {
        if($(Texts[i]).hasClass('Requerido') == true && $(Texts[i]).val() == "")
        {
            // console.log("Texts");
             respuesta = false;
            $("label[for="+$(Texts[i]).attr('id')+"]").addClass("required");
            requerido++;
            // return false;
        }
    });

    // elements = formulario.find(':input[type="text"], input[type="password"], input[type="tel"], input[type="number"]');
    Texts.each(function(i, object) 
    {
        var Class = $(object).attr("class").split(" ");
            $.each(Class, function(index, clase)
            {
                if(Expresiones.hasOwnProperty(clase))
                {
                    if($(object).val().trim() != '')
                    {
                        if($(object).val().trim().match(Expresiones[clase].Reg))
                        {
                            $("span[for="+$(object).attr('id')+"]").addClass("required").html('');
                            $(object).removeClass('borderRed');
                            
                            
                        }
                        else
                        {
                            $(object).addClass('borderRed');
                            $("span[for="+$(object).attr('id')+"]").addClass("required").html(Expresiones[clase].Mensaje)
                        }
                    }
                    else
                    {
                        $(object).removeClass('borderRed');
                        $("span[for="+$(object).attr('id')+"]").addClass("required").html('');
                    }
                    
                }
            });

    });

    TextArea.each(function(i, object) 
    {
        
            var Class = $(object).attr("class").split(" ");
            $.each(Class, function(index, clase)
            {
                if(Expresiones.hasOwnProperty(clase))
                {
                    if($(object).val().trim() != '')
                    {
                        if($(object).val().trim().match(Expresiones[clase].Reg))
                        {
                            $("span[for="+$(object).attr('id')+"]").addClass("required").html('');
                            $(object).removeClass('borderRed');
                            
                            
                        }
                        else
                        {
                            $(object).addClass('borderRed');
                            $("span[for="+$(object).attr('id')+"]").addClass("required").html(Expresiones[clase].Mensaje)
                        }
                    }
                    else
                    {
                        $(object).removeClass('borderRed');
                        $("span[for="+$(object).attr('id')+"]").addClass("required").html('');
                    }
                    
                }
            });
    });
    if( requerido > 0)
    {
        notify("Campos marcados en rojo son requeridos","warning");
    }
    callback(respuesta);
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

// Ajax functions(GET And Post)

function getQuery(sUrl, sType, sData, bAsync, LoadModal) 
{
    sData = sData || '';
    bAsync = bAsync || true;
    
    LoadModal = LoadModal || 0;
    
     return $.ajax({
        type: "GET",
        url: sUrl,
        timeout: 60000,
        dataType: sType,
        data: sData,
        async: bAsync,
        beforeSend: function ()
        {
            if(LoadModal == 1)
            {
                $('#modal-loader').modal('show');
            }
        },
        success: function (sResp)
        {
            
        },
        error: function(xmlhttprequest, textstatus, message)
        {
            if(textstatus==="timeout")
            {
                
                Dialog("Se ha excedido el tiempo de respuesta", true, "fa fa-exclamation-circle");
            }
            else
            {
                
            }
        },
        complete: function (sResp)
        {
            if(LoadModal == 1)
            {
                $('#modal-loader').modal('hide');
            }
        }
    });
}

function postQuery(sUrl, oFd, LoadModal) 
{
    LoadModal = LoadModal || 0;
    return $.ajax({
        type: "POST",
        url: sUrl,
        dataType: "json",
        data: oFd,
        timeout: 60000,
        contentType: false,
        processData: false,
        beforeSend: function () 
        {
            if(LoadModal == 1)
            {
                $('#modal-loader').modal('show');
            }
        },
        success: function (sResp)
        {
            
        },
        error: function(xmlhttprequest, textstatus, message)
        {
            if(textstatus==="timeout")
            {
                
                Dialog("Se ha excedido el tiempo de respuesta", true, "fa fa-exclamation-circle");
            }
            else
            {
                
            }
        },
        complete: function () 
        {
           if(LoadModal == 1)
            {
                $('#modal-loader').modal('hide');
            }
        },
        error: function () 
        {
           if(LoadModal == 1)
            {
                $('#modal-loader').modal('hide');
            }
        }
    });
}