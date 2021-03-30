var AdministrarValidaciones = function (e) {
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    var dni = parseInt(document.getElementById("txtDni").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    if (!ValidarCamposVacios("txtApellido")
        || !ValidarCamposVacios("txtNombre")) {
        alert("Hay campo/s vacio/s");
        e.preventDefault();
        return;
    }
    if (!ValidarCombo("cboSexo", "---")) {
        alert("Debe seleccionar el campo sexo");
        e.preventDefault();
        return;
    }
    if (!ValidarRangoNumerico(dni, 1000000, 55000000)) {
        alert("El Dni debe ser mayor igual a 1 Millon y menor igual a 55 millones");
        e.preventDefault();
        return;
    }
    if (!ValidarRangoNumerico(legajo, 100, 550)) {
        alert("El legajo debe ser mayor igual a 100 y menor igual a 550");
        e.preventDefault();
        return;
    }
    if (!ValidarRangoNumerico(sueldo, 8000, sueldoMaximo)) {
        alert("El sueldo debe ser mayor igual a 8000 y menor igual a " + sueldoMaximo);
        e.preventDefault();
        return;
    }
};
