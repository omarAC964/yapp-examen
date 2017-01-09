//Scripts José

//Función para mostrar campos y agregar nueva divisa
//La utilizan:
function crear_divisa(opcion){
    if(opcion.value == "nueva"){
        $('#nueva_divisa').html("<div class='input-field col s6'><label for='divisa'>Divisa</label><input class='validate' name='divisa' type='text'></div><div class='input-field col s6'><label for='acronimo_divisa'>Acronimo Divisa</label><input class='validate' name='acronimo_divisa' type='text'></div>");
    }
    else{
        $('#nueva_divisa').html("");
    }
}

//Función para mostrar campos y agregar nueva institución financiera
//La utilizan:
function crear_inst(opcion){
    if(opcion.value == "nueva"){
        $('#nueva_institucion').html("<div class='input-field col s6'><label for='institucion_financiera'>Institucion Financiera</label><input class='validate' name='institucion_financiera' type='text' id='institucion_financiera'></div>");
    }
    else{
        $('#nueva_institucion').html("");
    }
}

//Función para mostrar campos y agregar nuevo proveedor
//La utilizan:
function crear_proveedor(opcion){
    if(opcion.value == "nueva"){
        $('#nuevo_proveedor').html("<div class='input-field col s6'><label for='proveedor'>Proveedor</label><input class='validate' name='proveedor' type='text'></div><div class='input-field col s6'><label for='datos_proveedor'>Datos del Proveedor</label><input class='validate' name='datos_proveedor' type='text'></div>");
    }
    else{
        $('#nuevo_proveedor').html("");
    }
}

//Función para obtener subcuentas contables de una cuenta contable y mostrarlas en un light box
//La utilizan:
function sub_cuentas(boton){
    
    $.get("/cuentas-contables/sub-cuenta-index/"+ boton.id , function(data){
        if(data == 'Empty'){
            alert('No tiene subcuentas');
            $("#sub_cuentas").html(' ');
        }
        else{
            $("#sub_cuentas").html(data);
            $("div.popup-d").css("display", "block");
        }
    });
}

//Función para agregar la divisa de la cuenta de pago seleccionada
function agregar_divisaCP(divisa){
    $.get("/tesoreria/api-divisa-cp/"+ divisa.value , function(data){
        if(data == 'Empty'){
            alert('No tiene divisa');
        }
        else{
            $("#divisa").val(data);
        }
    });
}


function agregar_divisa_lc(divisa){
    $.get("/tesoreria/api-divisa-lc/"+ divisa.value , function(data){
        if(data == 'Empty'){
            alert('No tiene divisa');
        }
        else{
            $("#divisa").val(data.acronimo_divisa);
        }
    });
}

function establecer_empresa(cuenta){
    $.get("/tesoreria/api-empresa-ti/"+ cuenta.value , function(data){
        if(data == 'Empty'){
            alert('No tiene empresa');
        }
        else{
            $("#proveedor").val(data[0]);
            $("#concepto").val("Transferencia Interna a la cuenta: "+data[1]+" "+data[2]);
        }
    });
}


function filtro_divisas(boton){
    $.get("/tesoreria/api-emision-autorizar/"+ boton.id , function(data){
        if(data == 'Empty'){
            alert('No tiene divisa');
        }
        else{
            $("#contenedor").html(data);
        }
    });
}


function cambiar_nombre(nombre){
    $("#autorizador").html(nombre.value);
}



$(function(){
    $("div.operacion").keyup(function()
    {
        var importe = parseFloat($(this).find("input[name=importe]").val()) || 0 ;
        var amortiza_anticipo = parseFloat($(this).find("input[name=amortiza_anticipo]").val()) || 0;
        var iva = (parseInt($(this).find("input[name=iva]").val()))/100 || 0;
        var iva_honorarios = (parseInt($(this).find("input[name=ret_iva_honorarios]").val()))/100 || 0;
        var iva_fletes = (parseInt($(this).find("input[name=ret_iva_fletes]").val()))/100 || 0;
        var iva_arrendamiento = (parseInt($(this).find("input[name=ret_iva_arrendamiento]").val()))/100 || 0;
        var isr = (parseInt($(this).find("input[name=ret_isr]").val()))/100 || 0; 
    
        iva = iva*importe;
        iva_honorarios = iva_honorarios*importe;
        iva_fletes = iva_fletes*importe;
        iva_arrendamiento = iva_arrendamiento*importe;
        isr = isr*importe;
      
        $(this).find("input[name=total]").val((importe-amortiza_anticipo+iva-iva_honorarios-iva_fletes-iva_arrendamiento-isr).toFixed(2));
    });
    
    
    $("div.operacion2").keyup(function()
    {
        var importe = parseFloat($(this).find("input[name=importe]").val()) || 0 ;
        var iva = (parseInt($(this).find("input[name=iva]").val()))/100 || 0;
        
        iva = iva*importe;
      
        $(this).find("input[name=total]").val((importe+iva).toFixed(2));
    });
    
    
    
    $("div.popup-d").click(function(e) {
		if ( e.target == this ) {
			  $("div.popup-d").css('display', "none");
		}
	});
	
	
	$('ul.tabs a').click(function(){
        $('#activo').val(this.dataset.op);
        console.log($("#activo").val());
    });
	
    $('ul.tabs').tabs('select_tab', $('#activo').val());
    
    
	
});











/*inicio script Omar*/

/*inicino cotizacion venta*/
function myFunction(){

            var x = document.getElementById("casa").value;

            var pos = window.location;
            pos = pos.toString().split("/");

            if(pos[5]){
                window.location = x;
            }else{
                window.location = "/cotizaciones/crear/" + x;
            }

        }

        function descuento() {
            var x = document.getElementById("casa").value;
            $.getJSON("/cotizaciones/"+ x +"/descuentoadmon", function(data) {
                if (data[0] != '0') {
                    
                    document.getElementById("descuento_admon_id").value = data[0];
                document.getElementById("descuento_admon").value = data[1];
                }else{
                    bootbox.alert('El descuento es: ' + data[0] + '% , Porque no hay descuento vigente para este inmueble');
                }
            });
        }

        function verVenta() {
            var x = document.getElementById("descuento_vtas").value;
            var proy = document.getElementById("proyecto_id").value;
            $.get("/cotizaciones/"+ proy +"/desven", function(data) {
                if(x > parseInt(data)){
                    /*alert("El valor es myor del permitido en porcentajes debe ser menor de: "+data);*/
                    bootbox.alert("El valor es mayor del permitido en porcentajes debe ser menor de: "+data+" %");
                }else{
                    bootbox.alert("Permitido");
                }
            });

        }

        function paquetes(){
            var x = document.getElementById("casa").value;
            var z = document.getElementById("paquetes_m").value;
            if(z == '$ 0'){
                $.get("/cotizaciones/paquetes/"+ x, function(data){
                    if(data == 'Empty'){
                        alert('No hay paquetes Disponibles');
                        $("#paquetes").html(' ');
                    }else{
                        $("#paquetescotizacion").html(data);
                        $("div.popup-d").css("display", "block");
                        $("#agp").attr("onclick","abrirPaquetes()");
                        var lol = $("#inicio").val();
                        $("#paquetes").val(lol);
                    }
                });
            }else {
                bootbox.alert('Hay paquetes que no son básicos agregados a la cotizacion agregados a la cotización');
            }
        }

        function cerrarPaquetes(){
            $("div.popup-d").css("display", "none");
        }

        
        
        function abrirPaquetes(){
            $("div.popup-d").css("display", "block");
        }

        function agregarpaquete(idd) {
            $.get("/cotizaciones/actpaquete/"+ idd, function(data){
                var x = document.getElementById("paquetes_m").value;
                x = x.split(" ");
                var descuentop = data['descuento'];
                var monto = data['costo']
                var tdesc = data['tipodescuento'];
                if(tdesc == "basico"){
                    var t = parseFloat(x[1]) + (parseFloat(monto));
                    document.getElementById("paquetes_m").value = "$ " + t.toFixed(2);
                    document.getElementById("subtotalpaquetes").value = "$ " + t.toFixed(2);

                    var pauq = document.getElementById("paquetes").value;
                    if(pauq == "0"){
                        document.getElementById("paquetes").value = idd;
                    }else{
                        document.getElementById("paquetes").value = pauq + "," + idd;
                    }

                }else if(tdesc == "fijo"){

                    var t = parseFloat(x[1]) + (parseFloat(monto) - parseFloat(descuentop));
                    document.getElementById("paquetes_m").value = "$ " + t.toFixed(2);
                    document.getElementById("subtotalpaquetes").value = "$ " + t.toFixed(2);

                    var pauq = document.getElementById("paquetes").value;
                    if(pauq == "0"){
                        document.getElementById("paquetes").value = idd;
                    }else{
                        document.getElementById("paquetes").value = pauq + "," + idd;
                    }
                }
                else if(tdesc == "por"){

                    var t = parseFloat(x[1]) + (parseFloat(monto) * parseFloat(descuentop) / 100);
                    document.getElementById("paquetes_m").value = "$ " + t.toFixed(2);
                    document.getElementById("subtotalpaquetes").value = "$ " + t.toFixed(2);

                    var pauq = document.getElementById("paquetes").value;
                    if(pauq == "0"){
                        document.getElementById("paquetes").value = idd;
                    }else{
                        document.getElementById("paquetes").value = pauq + "," + idd;
                    }
                }

            });
        }

        function quitarpaquete(idd) {
            $.get("/cotizaciones/actpaquete/"+ idd, function(data){
                var x = document.getElementById("paquetes_m").value;
                x = x.split(" ");
                var descuentop = data['descuento'];
                var monto = data['costo']
                var tdesc = data['tipodescuento'];
                if(tdesc == "basico"){
                    var t = parseFloat(x[1]) - (parseFloat(monto));
                    document.getElementById("paquetes_m").value = "$ " + t.toFixed(2);
                    document.getElementById("subtotalpaquetes").value = "$ " + t.toFixed(2);
                    var pauq = document.getElementById("paquetes").value;
                    var temp = "";
                    if(pauq == "0"){

                    }else{
                        var sep = pauq.split(",");
                        for(var i =0;i<sep.length;i++){
                            if(sep[i] == idd){

                            }else if(i != 0){
                                temp = temp +  "," + sep[i];
                            }else{
                                temp = sep[i];
                            }
                        }
                        document.getElementById("paquetes").value = temp;
                    }
                }else if(tdesc == "fijo"){
                    var t = parseFloat(x[1]) - (parseFloat(monto) - parseFloat(descuentop))
                    document.getElementById("paquetes_m").value = "$ " + t;
                    document.getElementById("subtotalpaquetes").value = "$ " + t;

                    var pauq = document.getElementById("paquetes").value;
                    var temp = "";
                    if(pauq == "0"){

                    }else{
                        var sep = pauq.split(",")
                        for(var i =0;i<sep.length;i++){
                            if(sep[i] == idd){

                            }else if(i != 0){
                                temp = temp +  "," + sep[i];
                            }else{
                                temp = sep[i];
                            }
                        }
                        document.getElementById("paquetes").value = temp;
                    }
                }
                else if(tdesc == "por"){
                    var t = parseFloat(x[1]) - (parseFloat(monto) * parseFloat(descuentop) / 100);
                    document.getElementById("paquetes_m").value = "$ " + t.toFixed(2);
                    document.getElementById("subtotalpaquetes").value = "$ " + t.toFixed(2);

                    var pauq = document.getElementById("paquetes").value;
                    var temp = "";
                    if(pauq == "0"){

                    }else{
                        var sep = pauq.split(",")
                        for(var i =0;i<sep.length;i++){
                            if(sep[i] == idd){

                            }else if(i != 0){
                                temp = temp +  "," + sep[i];
                            }else{
                                temp = sep[i];
                            }
                        }
                        document.getElementById("paquetes").value = temp;
                    }
                }
            });
        }

        function total() {

            var desceunto = document.getElementById("descuento_admon_id").value;
            var ppaquetes = document.getElementById("paquetes_m").value;
                ppaquetes = ppaquetes.toString().split(" ");
            var descuentov = document.getElementById("descuento_vtas").value;
            var precio = document.getElementById("precio_venta").value;
            alert(precio);
            precio = precio.toString().split(" ");
            var costotextra = document.getElementById("costo_terreno_extra").value;
            costotextra = costotextra.split(" ");
            
            var n = desceunto.toString();

            if(n.search("%") != -1) {
                tempt = desceunto.toString().split(" ");
                
                desceunto = parseFloat(tempt[0]);

                ppaquetes = document.getElementById("paquetes_m").value;
                ppaquetes = ppaquetes.toString().split(" ");
                
                
                var t = parseFloat(precio[1]) ;
                
                
                    t = parseFloat(t) - (parseFloat(precio[1]) * (parseFloat(descuentov) / 100));
                
                t = parseFloat(t) - (parseFloat(precio[1]) * parseFloat(tempt[0]) / 100);
                t = parseFloat(t) + parseFloat(ppaquetes[1]) + parseFloat(costotextra[1]);

                document.getElementById("preciof").value = "$ "+t.toFixed(2);

            }else{
                tempt = desceunto.toString().split(" ");
                
                desceunto = parseFloat(tempt[1]);
                
                var t = parseFloat(precio[1]);
                
                t = parseFloat(t) - (parseFloat(precio[1]) * (parseFloat(descuentov) / 100));
                
                var t = parseFloat(t) - parseFloat(desceunto);
                t = parseFloat(t) + parseFloat(ppaquetes[1]) + parseFloat(costotextra[1]);
                
                document.getElementById("preciof").value = "$ "+t.toFixed(2);
            }

        }

        function calendario() {
            var t = document.getElementById("ctot").value;
            var p = document.getElementById("cpla").value;
            var f = document.getElementById("cfech").value;
            
            if(p == 0){
                bootbox.alert("El plazo no puede ser "+p+" meses");
            }else{
            t = t.split(" ")
            $.get("/cotizaciones/calendario/"+t[1]+"/"+p+"/"+f, function(data){
                $("#calendar").html(data);


            });
            }
        }

        function preCalendario() {
            $.get("/cotizacioness/precalendario", function(data){
                $("#calenario").html(data);
$("#ccal").attr("onclick","abrirCalendario()");
                $("div.popup-dd").css("display", "block");

                document.getElementById("ctot").value = document.getElementById("enganche").value;
                document.getElementById("cpla").value = document.getElementById("plazo_para_enganche").value;
                $("#cpla").attr("max",document.getElementById("plazo_para_enganche").value);
            });

        }
        
        function cerrarCalendario(){
            
            datoscalendario();
            $("div.popup-dd").css("display", "none");
        }
        function abrirCalendario(){
            $("div.popup-dd").css("display", "block");
        }

        function opcion(select,last) {
            var id = select.value;
            select.setAttribute("onchange","opcion(this,"+ id +")");
            $.get("/cotizaciones/actpaquete/"+ id, function(data){
                var tlast = last;
                var nid = id;

                var costoOpcion = document.getElementById(tlast + "co");
                costoOpcion.innerHTML = data['costo'];
                var descuento = document.getElementById(tlast + "d");
                if(data['tipodescuento'] == 'fijo') {
                    descuento.innerHTML = '$ ' + data['descuento'];
                }else{descuento.innerHTML = data['descuento'] + ' %';}
                var costoFinal = document.getElementById(tlast + "cf");
                costoFinal.innerHTML = '$ ' + data['cotsof'];
                var fFinal = document.getElementById(tlast + "fv");
                fFinal.innerHTML = data['vencimiento'];
                var agregar = document.getElementById(tlast + "ag");
                var quitar = document.getElementById(tlast + "qu");
                var temp1 = '"'+data['descuento']+'"';
                var temp2 = '"'+data['costo']+'"';
                var temp3 = '"'+data['tipodescuento']+'"';
                var temp4 = '"'+nid+'"';
                var pauq = document.getElementById("paquetes").value;
                var sep = pauq.split(",");
                var condicional2 = false;
                var q = 0;
                while (q < 10 && condicional2 == false)
                {
                    if(sep[q] == nid){
                        condicional2 = true;
                        break;
                    }else if(q != 0){
                        condicional2 = false;
                    }else{
                        condicional2 = false;
                    }
                    q++;
                }

                var pauq2 = document.getElementById("paquetes").value;
                var sep2 = pauq2.split(",");
                var condicional = false;
                var p = 0;
                while (p < 10 && condicional == false)
                {
                    if(sep2[p] == tlast){
                        condicional = true;
                        break;
                    }else if(p != 0){
                        condicional = false;
                    }else{
                        condicional = false;
                    }
                    p++;
                }


                if(condicional) {
                    quitarpaquete(tlast);
                }else {
                    agregarpaquete(tlast);
                }

                if(condicional2) {
                    quitarpaquete(nid);
                }else {
                    agregarpaquete(nid);
                }
                opcionc(nid,tlast,temp1,temp2,temp3,temp4);


            });
        }

        function opcionc(id,last,temp1,temp2,temp3,temp4) {
            var costoOpcion = document.getElementById(last + "co");
            var descuento = document.getElementById(last + "d");
            var costoFinal = document.getElementById(last + "cf");
            var fFinal = document.getElementById(last + "fv");
            var acciones = document.getElementById(last + "ac");
            var agregar = document.getElementById(last + "ag");
            var quitar = document.getElementById(last + "qu");
            costoOpcion.setAttribute("id", id+"co");
            descuento.setAttribute("id", id+"d");
            costoFinal.setAttribute("id", id+"cf");
            fFinal.setAttribute("id", id+"fv");

        }

        function vendi(x) {

            if(x.value == "1"){
                document.getElementById("ven").style.visibility = "";
                document.getElementById("ven").style.height = "";
            }else{
                document.getElementById("ven").style.visibility = "hidden";
                document.getElementById("ven").style.height = "0px";
            }
        }

        function aparta(x) {
            if(x.value == "1"){
                document.getElementById("fap").style.visibility = "";
                document.getElementById("fap").style.height = "";
            }else{
                document.getElementById("fap").style.visibility = "hidden";
                document.getElementById("fap").style.height = "0px";
            }
        }

        function ce(a){
            document.getElementById("cev").style.visibility = "";
            document.getElementById("cea").style.visibility = "";
            document.getElementById("cev").style.height = "";
            document.getElementById("cea").style.height = "";
            a.setAttribute("onclick","cea(this)");
        }

        function cea(a){
            document.getElementById("cev").style.visibility = "hidden";
            document.getElementById("cea").style.visibility = "hidden";
            document.getElementById("cev").style.height = "0px";
            document.getElementById("cea").style.height = "0px";
            a.setAttribute("onclick","ce(this)");
        }
        
        function datoscalendario() {
     datos = "";
     var rows = document.getElementById('TablaDatos');
     
     if(rows == null){
         bootbox.alert("No se Genero Calendario!!")
         document.getElementById("calendariocalculado").value = "";
     }else{
     
     
     for (var i=1;i < rows.rows.length; i++){
             for (var j=0; j<4; j++){
                    datos = datos + document.getElementById('TablaDatos').rows[i].cells[j].innerHTML + ",";
             }
     } 
     document.getElementById("calendariocalculado").value = datos;
     }
}
/*fin cotizacion venta*/

/* Inicio Script busqueda en tabla de front-end*/
function buscadorTabla(){
			var tableReg = document.getElementById('datos');
			var searchText = document.getElementById('busqueda').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; (j < cellsOfRow.length -1) && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
/*Inicio Script busqueda en tabla de front-end*/
/* inicio scitp barral lateral ocultar mostrar*/
function aslide(){
        document.getElementById("sidebar-wrapper").style.left = "25px";
        document.getElementById("sidebar-wrapper").style.overflowY= "hidden";
        document.getElementById("wrapper").style.paddingLeft = "25px";
        /*document.getElementById("wrapper").style.marginLeft = "-25px";*/
 		document.getElementById("ocultar").setAttribute("onclick","cslide()");
 		document.getElementById("ocultar").innerHTML = '<i class="fa fa-angle-right flechaslide" aria-hidden="true"></i>';
    }
    function cslide(){
 		document.getElementById("sidebar-wrapper").style.left = "250px";
 		document.getElementById("sidebar-wrapper").style.overflowY= "auto";
 		document.getElementById("wrapper").style.paddingLeft = "250px";
 		document.getElementById("wrapper").style.marginLeft = "0px";
 		document.getElementById("ocultar").setAttribute("onclick","aslide()");
 		document.getElementById("ocultar").innerHTML = '<i class="fa fa-angle-left flechaslide" aria-hidden="true"></i>';
    }
    
/*fin de script barra lateral ocultar mostrar*/
/*inicio script de los iconos en los desplegables del submenu*/
$(document).ready(function(){
 $("#demo").on("hide.bs.collapse", function(){

 });
 $("#demo").on("show.bs.collapse", function(){

 });
});
/*fin script de los iconos en los desplegables del submenu*/
/*fin script Omar*/
