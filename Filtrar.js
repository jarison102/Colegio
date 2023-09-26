function actualizarDepartamentos() {
    var Pais = document.getElementById("Pais").value;
    var departamentoSelect = document.getElementById("Departamento");

    // Eliminamos las opciones anteriores
    while (departamentoSelect.options.length > 0) {
        departamentoSelect.remove(0);
    }

    // Aquí debes tener una función que obtenga los departamentos del país ingresado desde tu base de datos
    // y los almacene en un array o un objeto JSON.
    var departamentosDelPais = obtenerDepartamentos(Pais);

    // Creamos las opciones en el select
    for (var i = 0; i < departamentosDelPais.length; i++) {
        var option = document.createElement("option");
        option.text = departamentosDelPais[i];
        departamentoSelect.add(option);
    }
}

// Esta función simula la obtención de los departamentos del país ingresado.
// Puedes reemplazar esta función con una llamada AJAX a tu servidor para obtener los departamentos reales.
function obtenerDepartamentos(Pais) {
    var Departamento = [];
    if (Pais === "Colombia") {
        Departamento = ["Antioquia", "Bogotá D.C.", "Valle del Cauca", "Cundinamarca", "Santander", "Atlántico", "Nariño", "Córdoba"];
    } else if (Pais === "Peru") {
        Departamento = ["Lima", "Arequipa", "Cusco", "Piura", "La Libertad", "Lambayeque", "Junín", "Ancash"];
    } else if (Pais==="Ecuador"){
        Departamento = ["Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "El Oro", "Esmeraldas", "Guayas"];
    }// Agrega más países y sus departamentos según tus necesidades.

    return Departamento;
}

