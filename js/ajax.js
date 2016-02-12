
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
asiento = document.frmAeropuerto.asiento.value;
aerolinea = document.frmAeropuerto.aerolinea.value;
estado = document.frmAeropuerto.estado.value;
aeropuerto = document.frmAeropuerto.aeropuerto.value;

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
ajax.send("avi_id="+avi_id+"&avi_asientos="+asiento+"&avi_aerolinea="+aerolinea+"&avi_estadoLog="+estado+"&aer_id="+aeropuerto)
}
