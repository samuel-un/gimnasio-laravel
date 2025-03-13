async function buscar() {
    const inputBusqueda = document
        .getElementById("busqueda")
        .value.trim()
        .toLowerCase();
    const resultadosContainer = document.getElementById("resultados");
    const mapaIframe = document.getElementById("mapa");

    resultadosContainer.innerHTML = "";

    if (!inputBusqueda) {
        resultadosContainer.innerHTML =
            "<p>Por favor, ingrese una provincia.</p>";
        return;
    }

    try {
        const response = await fetch("data/gimnasios.json");
        if (!response.ok) {
            console.error("Error al cargar el JSON. Código: ", response.status);
            resultadosContainer.innerHTML =
                "<p>Error al cargar el archivo JSON.</p>";
            return;
        }

        const gimnasios = await response.json();
        const resultados = gimnasios.filter((gym) =>
            gym.provincia.toLowerCase().includes(inputBusqueda)
        );

        if (resultados.length === 0) {
            resultadosContainer.innerHTML =
                "<p>No se encontraron gimnasios.</p>";
            return;
        }

        resultados.forEach((gym) => {
            resultadosContainer.innerHTML += `
          <div class="gym-item">
            <h3>${gym.nombre}</h3>
            <p><strong>Provincia:</strong> ${gym.provincia}</p>
            <p><strong>Dirección:</strong> ${gym.direccion}</p>
            <p><strong>Horario Lectivo:</strong> ${gym.horario_lectivo}</p>
            <p><strong>Horario Festivo:</strong> ${gym.horario_festivo}</p>
          </div>
        `;
        });

        mostrarEnIframe(resultados[0]);
    } catch (error) {
        console.error("Error en la búsqueda:", error);
        resultadosContainer.innerHTML = "<p>Error al procesar la búsqueda.</p>";
    }
}

function mostrarEnIframe(gym) {
    if (!gym.direccion) {
        console.error("No hay dirección disponible para este gimnasio.");
        return;
    }

    const mapsUrl = `https://www.google.com/maps?q=${encodeURIComponent(
        gym.direccion
    )}&output=embed`;

    document.getElementById("mapa").src = mapsUrl;
}
