
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}






function Registrar_Aeropuerto(aer_id, accion){
nombre = document.frmAeropuerto.nombre.value;
ciudad = document.frmAeropuerto.ciudad.value;
estado = document.frmAeropuerto.estado.value;

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "../baseDatos/Registrar_Aeropuerto.php", true);
}else if(accion=='E'){
ajax.open("POST", "../baseDatos/Actualizar_Aeropuerto.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("aer_id="+aer_id+"&aer_nombre="+nombre+"&aer_ciudad="+ciudad+"&aer_estadoLog="+estado)
}

function Eliminar_Aeropuerto(aer_id){
if(confirm("En realizad desea eliminar este registro?")){
ajax = objetoAjax();
ajax.open("POST", "baseDatos/Eliminar_Aeropuerto.php", true);
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('El registro fue eliminado con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("aer_id="+aer_id)
}else{
  //Sin acciones
}
}


function Registrar_Avion(avi_id, accion){
nombre = document.frmAeropuerto.nombre.value;
asiento = document.frmAeropuerto.asiento.value;
aerolinea = document.frmAeropuerto.aerolinea.value;
estado = document.frmAeropuerto.estado.value;
aeropuerto = document.frmAeropuerto.aeropuerto1.value;

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "../baseDatos/Registrar_Avion.php", true);
}else if(accion=='E'){
ajax.open("POST", "../baseDatos/Actualizar_Avion.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("avi_id="+avi_id+"&avi_nombre="+nombre+"&avi_asientos="+asiento+"&avi_aerolinea="+aerolinea+"&avi_estadoLog="+estado+"&aer_id="+aeropuerto)
}


function Registrar_Ruta(rut_id, accion){
ciudadOrigen = document.frmRuta.ciudadOrigenC1.value;
ciudadDestino = document.frmRuta.ciudadDestinoC1.value;
estado = document.frmRuta.estado.value;

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "../baseDatos/Registrar_Ruta.php", true);
}else if(accion=='E'){
ajax.open("POST", "../baseDatos/Actualizar_Ruta.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("rut_id="+rut_id+"&rut_estadoLog="+estado+"&aer_id_origen="+ciudadOrigen+"&aer_id_destino="+ciudadDestino)
}


function Registrar_Vuelo(vue_id, accion){


vue_fechaVLlegada = document.frmVuelo.fllegada.value;
vue_fechaVSalida = document.frmVuelo.fsalida.value;
vue_horaVLlegada = document.frmVuelo.hllegada.value;
vue_horaVSalida = document.frmVuelo.hsalida.value;
vue_tipo = document.frmVuelo.tipo.value;
vue_visa= document.frmVuelo.visa.value;
vue_costo= document.frmVuelo.costo.value;
vue_estadoLog = document.frmVuelo.estado.value;
rut_id = document.frmVuelo.ruta1.value;
avi_id = document.frmVuelo.avion1.value;

 

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "../baseDatos/Registrar_Vuelo.php", true);
}else if(accion=='E'){
ajax.open("POST", "../baseDatos/Actualizar_Vuelo.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("vue_id="+vue_id+"&vue_fechaVLlegada="+vue_fechaVLlegada+"&vue_fechaVSalida="+vue_fechaVSalida+"&vue_horaVLlegada="+vue_horaVLlegada+"&vue_horaVSalida="+vue_horaVSalida+"&vue_tipo="+vue_tipo+"&vue_visa="+vue_visa+"&vue_costo="+vue_costo+"&vue_estadoLog="+vue_estadoLog+"&rut_id="+rut_id+"&avi_id="+avi_id)
}