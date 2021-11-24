

function mascara(valor) {
    
    if (valor.length==3 && event.keyCode != 8) {
      return valor + '-';
      
    } else if (valor.length==7 && event.keyCode != 8) {
    
        return valor + '-';
    }
      
    return valorretorno;
}


function validarkey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;
    

    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}


function validarlong(valor){
    if(valor.length > 12){
        return false;
    } else{
        return true;
    }
}