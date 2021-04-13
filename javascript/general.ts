const AdministrarValidaciones = (e: Event) =>{
    let sueldoMaximo: number = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    let dni: number = parseInt((<HTMLInputElement> document.getElementById("txtDni")).value);
    let sueldo: number = parseInt((<HTMLInputElement> document.getElementById("txtSueldo")).value);
    let legajo: number = parseInt((<HTMLInputElement> document.getElementById("txtLegajo")).value);
    
    if(!ValidarCamposVacios("txtApellido"))
    {
        AdministrarSpanError("spanTxtApellido", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanTxtDni", false);
    }


    if(!ValidarCamposVacios("txtNombre"))
    {
        AdministrarSpanError("spanTxtNombre", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanTxtNombre", false);
    }

    
    if(!ValidarCombo("cboSexo","---"))
    {
        AdministrarSpanError("spanCboSexo", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanCboSexo", false);
    }

    if(!ValidarRangoNumerico(dni,1000000,55000000))
    {
        AdministrarSpanError("spanTxtDni", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanTxtDni", false);
    }

    if(!ValidarRangoNumerico(legajo,100,550))
    {
        AdministrarSpanError("spanTxtLegajo", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanTxtLegajo", false);
    }

    if(!ValidarRangoNumerico(sueldo,8000,sueldoMaximo))
    {
        AdministrarSpanError("spanTxtSueldo", true);
        e.preventDefault();
    }
    else
    {
        AdministrarSpanError("spanTxtSueldo", false);
    }
}

const AdministrarValidacionesLogin: Function = (e: Event) =>
{
    let dni: number = parseInt((<HTMLInputElement> document.getElementById("txtDni")).value);
    
    if(!ValidarRangoNumerico(dni,1000000,55000000))
    {
        AdministrarSpanError("spanTxtDni", true);
    }
    else
    {
        AdministrarSpanError("spanTxtDni", false);
    }
    
    if(!ValidarCamposVacios("txtApellido"))
    {
        AdministrarSpanError("spanTxtApellido", true);
    }
    else
    {
        AdministrarSpanError("spanTxtApellido", false);
    }

    // if(!ValidarCamposVacios("file"))
    // {
    //     alert("hola1");
    //     AdministrarSpanError("spanFile", true);
    // }
    // else
    // {
    //     alert("chau1");
    //     AdministrarSpanError("spanFile", false);
    // }

    // if(!ValidarFile("file"))
    // {
    //     alert("hola");
    //     AdministrarSpanError("spanFile", true);
    // }
    // else
    // {
    //     alert("chau");
    //     AdministrarSpanError("spanFile", false);
    // }

    if(!VerificarValidacionesLogin())
    {
        e.preventDefault();
    }
}