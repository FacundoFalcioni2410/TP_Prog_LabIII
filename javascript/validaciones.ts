const ValidarCamposVacios: Function = (id: string): boolean =>{
    let valor: string = (<HTMLInputElement> document.getElementById(id)).value;
    valor = valor.replace(/ /g, "");
    if(valor === "" || valor == null || valor == undefined)
    {
        return false;
    }
    return true;
}

// const ValidarFile: Function = (id: string): boolean =>{
//     let input: HTMLInputElement = (<HTMLInputElement> document.getElementById(id));
//     if(input.files?.item.)
//     {
//         return true;
//     }
    
//     return false;
// }

const ValidarRangoNumerico: Function = (numero: number, min: number, max: number): boolean =>{
    if(numero >= min && numero <= max)
    {
        return true;
    }
    return false;
}

const ValidarCombo: Function = (id: string, incorrecto: string): boolean =>{
    let valor: string = (<HTMLInputElement> document.getElementById(id)).value;
    if(valor !== incorrecto)
    {
        return true;
    }
    return false;
}

const ObtenerTurnoSeleccionado: Function = (): string =>{
    let elemento: NodeListOf<HTMLInputElement> | null = (document.querySelectorAll('input[name="rdoTurno"]'));
    let flag: number = 0;

    if(elemento != null)
    {
        for(let i: number = 0; i < elemento.length; i++)
        {
            if(elemento[i].checked)
            {
                flag = parseInt(elemento[i].value);
                break;
            }
        }
    }

    if(flag === 1)
    {
        return "Tarde";
    }
    else if(flag === 2)
    {
        return "Noche"
    }

    return "Mañana";
}

const ObtenerSueldoMaximo: Function = (turno: string): number =>{
    switch(turno)
    {
        case "Mañana":
            return 20000;
        case "Tarde":
            return 18500;
        default:
            return 25000;
    }
}

const AdministrarSpanError: Function = (id: string, bool: boolean):void =>{
    let span: HTMLElement = (<HTMLElement> document.getElementById(id));
    if(bool)
    {
        span.style.display = "block";
    }
    else
    {
        span.style.display = "none";
    }
}

const VerificarValidacionesLogin: Function = (): boolean =>{

    let spanDni: string = (<HTMLElement> document.getElementById("spanTxtDni")).style.display;
    let spanApellido: string = (<HTMLElement> document.getElementById("spanTxtApellido")).style.display;
    if(spanDni === "none" && spanApellido === "none")
    {
        return true;
    }

    return false;
}

const AdministrarModificar: Function = (dni: string):void =>{
    let input: HTMLInputElement = (<HTMLInputElement> document.getElementById("hiddenInput"));
    var myForm = <HTMLFormElement>document.getElementById('formMostrar');
    input.value = dni;
    myForm.submit();
}