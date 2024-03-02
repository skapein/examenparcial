function init() {
  $("#form_libros").on("submit", (e) => {
    GuardarEditar(e);
  });
}
var ruta = "../../controllers/libro.controllers.php?op=";
$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(ruta + "todos", (ListLibro) => {
      ListLibro = JSON.parse(ListLibro); 
    $.each(ListLibro, (index, libro) => { 
      html += `<tr>
            <td>${index + 1}</td>
            <td>${libro.Título}</td>
            <td>${libro.Género}</td>
            <td>${libro.Año_publicación}</td> <!-- Corregido el nombre del campo -->
            <td>${libro.Editorial}</td> <!-- Corregido el nombre del campo -->
<td>
<button class='btn btn-primary' onclick='uno(${
        libro.ID_libro 
      })'   data-bs-toggle="modal" data-bs-target="#ModalLibros">Editar</button> <!-- Corregido el nombre del campo -->
<button class='btn btn-danger' onclick='eliminar(${
        libro.ID_libro 
      })'>Eliminar</button> <!-- Corregido el nombre del campo -->
            `;
    });
    $("#ListaProyectos").html(html); 
  });
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioLibro = new FormData($("#form_libros")[0]); 
  var accion = "";

  if (document.getElementById("ID_libro").value != "") { 
    accion = ruta + "actualizar";
  } else {
    accion = ruta + "insertar";
  }
  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioLibro, 
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire({
          title: "Libro",
          text: "Se guardó con éxito",
          icon: "success",
        });
        CargaLista();
        LimpiarCajas();
      } else {
        Swal.fire({
          title: "Libro",
          text: "Error al guardar",
          icon: "error",
        });
      }
    },
  });
};

var uno = async (ID_libro) => {

  document.getElementById("tituloModal").innerHTML = "Actualizar Libro";
  $.post(ruta + "uno", { ID_libro: ID_libro }, (libro) => { 
    libro = JSON.parse(libro); 
    document.getElementById("ID_libro").value = libro.ID_libro; 
    document.getElementById("Título").value = libro.Título;
    document.getElementById("Género").value = libro.Género; 
    document.getElementById("Año_publicación").value = libro.Año_publicación; 
    document.getElementById("Editorial").value = libro.Editorial; 


  });
};


var eliminar = (ID_libro) => { 
  Swal.fire({
    title: "Libro",
    text: "¿Está seguro que desea eliminar el Libro?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(ruta + "eliminar", { ID_libro: ID_libro }, (respuesta) => { 
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          CargaLista();
          Swal.fire({
            title: "Libro",
            text: "Se eliminó con éxito",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Libro",
            text: "Error al eliminar",
            icon: "error",
          });
        }
      });
    }
  });
};

var LimpiarCajas = () => {
  document.getElementById("ID_libro").value = "";
  document.getElementById("Título").value = "";
  document.getElementById("Género").value = "";
  document.getElementById("Año_publicación").value = "";
  document.getElementById("Editorial").value = "";
  document.getElementById("tituloModal").innerHTML = "Insertar Libro";
  $("#ModalLibros").modal("hide");
};
init();
