var ValidarCamposVacios = function (id) {
    var valor = document.getElementById(id).value;
    valor = valor.replace(/ /g, "");
    if (valor === "" || valor == undefined) {
        return false;
    }
    return true;
};
var ValidarRangoNumerico = function (numero, min, max) {
    if (numero >= min && numero <= max) {
        return true;
    }
    return false;
};
var ValidarCombo = function (id, incorrecto) {
    var valor = document.getElementById(id).value;
    if (valor !== incorrecto) {
        return true;
    }
    return false;
};
var ObtenerTurnoSeleccionado = function () {
    var elemento = (document.querySelectorAll('input[name="rdoTurno"]'));
    var flag = 0;
    if (elemento != null) {
        for (var i = 0; i < elemento.length; i++) {
            if (elemento[i].checked) {
                flag = parseInt(elemento[i].value);
                break;
            }
        }
    }
    if (flag === 1) {
        return "Tarde";
    }
    else if (flag === 2) {
        return "Noche";
    }
    return "Mañana";
};
var ObtenerSueldoMaximo = function (turno) {
    switch (turno) {
        case "Mañana":
            return 20000;
        case "Tarde":
            return 18500;
        default:
            return 25000;
    }
};
var AdministrarSpanError = function (id, bool) {
    var span = document.getElementById(id);
    if (bool) {
        span.style.display = "block";
    }
    else {
        span.style.display = "none";
    }
};
var VerificarValidacionesLogin = function () {
    var spanDni = document.getElementById("spanTxtDni").style.display;
    var spanApellido = document.getElementById("spanTxtApellido").style.display;
    if (spanDni === "none" && spanApellido === "none") {
        return true;
    }
    return false;
};
var AdministrarValidaciones = function (e) {
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    var dni = parseInt(document.getElementById("txtDni").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    if (!ValidarCamposVacios("txtApellido")) {
        AdministrarSpanError("spanTxtApellido", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtDni", false);
    }
    if (!ValidarCamposVacios("txtNombre")) {
        AdministrarSpanError("spanTxtNombre", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtNombre", false);
    }
    if (!ValidarCombo("cboSexo", "---")) {
        AdministrarSpanError("spanCboSexo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanCboSexo", false);
    }
    if (!ValidarRangoNumerico(dni, 1000000, 55000000)) {
        AdministrarSpanError("spanTxtDni", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtDni", false);
    }
    if (!ValidarRangoNumerico(legajo, 100, 550)) {
        AdministrarSpanError("spanTxtLegajo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtLegajo", false);
    }
    if (!ValidarRangoNumerico(sueldo, 8000, sueldoMaximo)) {
        AdministrarSpanError("spanTxtSueldo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtSueldo", false);
    }
};
var AdministrarValidacionesLogin = function (e) {
    var dni = parseInt(document.getElementById("txtDni").value);
    if (!ValidarRangoNumerico(dni, 1000000, 55000000)) {
        AdministrarSpanError("spanTxtDni", true);
    }
    else {
        AdministrarSpanError("spanTxtDni", false);
    }
    if (!ValidarCamposVacios("txtApellido")) {
        AdministrarSpanError("spanTxtApellido", true);
    }
    else {
        AdministrarSpanError("spanTxtApellido", false);
    }
    if (!VerificarValidacionesLogin()) {
        e.preventDefault();
    }
};
