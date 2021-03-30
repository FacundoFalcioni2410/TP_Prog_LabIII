const AdministrarValidaciones = (e: Event) =>{
    let sueldoMaximo: number = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    let dni: number = parseInt((<HTMLInputElement> document.getElementById("txtDni")).value);
    let sueldo: number = parseInt((<HTMLInputElement> document.getElementById("txtSueldo")).value);
    let legajo: number = parseInt((<HTMLInputElement> document.getElementById("txtLegajo")).value);
    
    if(!ValidarCamposVacios("txtApellido")
      || !ValidarCamposVacios("txtNombre"))
    {
        alert("Hay campo/s vacio/s");
        e.preventDefault();
        return;
    }
    if(!ValidarCombo("cboSexo","---"))
    {
        alert("Debe seleccionar el campo sexo");
        e.preventDefault();
        return;
    }
    if(!ValidarRangoNumerico(dni,1000000,55000000))
    {
        alert("El Dni debe ser mayor igual a 1 Millon y menor igual a 55 millones");
        e.preventDefault();
        return;
    }
    if(!ValidarRangoNumerico(legajo,100,550))
    {
        alert("El legajo debe ser mayor igual a 100 y menor igual a 550");
        e.preventDefault();
        return;
    }
    if(!ValidarRangoNumerico(sueldo,8000,sueldoMaximo))
    {
        alert(`El sueldo debe ser mayor igual a 8000 y menor igual a ${sueldoMaximo}`);
        e.preventDefault();
        return;
    }
}