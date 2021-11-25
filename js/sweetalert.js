

function alertaRegistro(title, text, ico){

    if(ico == 'success'){
        Swal.fire({
            position: 'center',
            icon: ico,
            title: title,
            showConfirmButton: false,
            timer: 1500
        })
    }else if(ico == 'warning'){
        Swal.fire({
            icon: ico,
            title: title,
            text: text
        })
    }else if(ico == 'error'){
        Swal.fire({
            icon: ico,
            title: title,
            text: text
        })
    }
} 




function alertaEliminar(type){
    if(type != 'Empleado'){
        Swal.fire({
            title: '¿Quieres eliminar este registro?',
            text: "Si eliminar un " + type + " puede provocar que se eliminen registros dependientes",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    type + 'Eliminado!',
                    'Registro eliminado satisfactoriamente',
                    'success'
                )
            }
        })
    }else{
        Swal.confirm({
            title: '¿Quieres eliminar este registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    '¡' + type + ' Eliminado!',
                    'Registro eliminado satisfactoriamente',
                    'success',
                )
            }
        })
    }
}


