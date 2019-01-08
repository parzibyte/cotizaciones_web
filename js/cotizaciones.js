document.addEventListener("DOMContentLoaded", () => {
    const menu = document.querySelector("#menu"),
        botonMenu = document.querySelector("#botonMenu");
    if (menu) {
        botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
    }
    const minutosATiempo = minutos => {
        const leyenda = (numero, palabra, plural) => numero === 0 || numero > 1 ? `${numero} ${palabra}${plural || "s"}` : `${numero} ${palabra}`;
        const MINUTOS_POR_HORA = 60,
            HORAS_POR_DIA = 24,
            DIAS_POR_SEMANA = 7,
            DIAS_POR_MES = 30,
            MESES_POR_ANIO = 12;
        if (minutos < MINUTOS_POR_HORA) return leyenda(minutos, "minuto");
        let horas = Math.floor(minutos / MINUTOS_POR_HORA),
            minutosSobrantes = minutos % MINUTOS_POR_HORA;
        if (horas < HORAS_POR_DIA) return leyenda(horas, "hora") + (minutosSobrantes > 0 ? ", " + minutosATiempo(minutosSobrantes) : "");
        let dias = Math.floor(horas / HORAS_POR_DIA);
        minutosSobrantes = minutos % (MINUTOS_POR_HORA * HORAS_POR_DIA);
        if (dias < DIAS_POR_SEMANA) return leyenda(dias, "día") + (minutosSobrantes > 0 ? ", " + minutosATiempo(minutosSobrantes) : "");
        let semanas = Math.floor(horas / (HORAS_POR_DIA * DIAS_POR_SEMANA));
        minutosSobrantes = minutos % (MINUTOS_POR_HORA * HORAS_POR_DIA * DIAS_POR_SEMANA);
        if (dias < DIAS_POR_MES) return leyenda(semanas, "semana") + (minutosSobrantes > 0 ? ", " + minutosATiempo(minutosSobrantes) : "");
        let meses = Math.floor(horas / (HORAS_POR_DIA * DIAS_POR_MES));
        minutosSobrantes = minutos % (MINUTOS_POR_HORA * HORAS_POR_DIA * DIAS_POR_MES);
        if (meses < MESES_POR_ANIO) return leyenda(meses, "mes", "es") + (minutosSobrantes > 0 ? ", " + minutosATiempo(minutosSobrantes) : "");
        let anios = Math.floor(horas / (HORAS_POR_DIA * DIAS_POR_MES * MESES_POR_ANIO));
        minutosSobrantes = minutos % (MINUTOS_POR_HORA * HORAS_POR_DIA * DIAS_POR_MES * MESES_POR_ANIO);
        return leyenda(anios, "año") + (minutosSobrantes > 0 ? ", " + minutosATiempo(minutosSobrantes) : "");
    };
    const aMoneda = (numero, opciones) => {
        // Valores por defecto
        opciones = opciones || {};
        opciones.simbolo = opciones.simbolo || "$ ";
        opciones.separadorDecimal = opciones.separadorDecimal || ".";
        opciones.separadorMiles = opciones.separadorMiles || ",";
        opciones.numeroDeDecimales = opciones.numeroDeDecimales >= 0 ? opciones.numeroDeDecimales : 2;
        opciones.posicionSimbolo = opciones.posicionSimbolo || "i";
        const CIFRAS_MILES = 3;

        // Redondear y convertir a cadena
        let numeroComoCadena = numero.toFixed(opciones.numeroDeDecimales);

        // Comenzar desde la izquierda del separador o desde el final de la cadena si no se proporciona
        let posicionDelSeparador = numeroComoCadena.indexOf(opciones.separadorDecimal);
        if (posicionDelSeparador === -1) posicionDelSeparador = numeroComoCadena.length;
        let formateadoSinDecimales = "", indice = posicionDelSeparador;
        // Ir cortando desde la derecha de 3 en 3, y concatenar en una nueva cadena
        while (indice >= 0) {
            let limiteInferior = indice - CIFRAS_MILES;
            // Agregar separador si cortamos más de 3
            formateadoSinDecimales = (limiteInferior > 0 ? opciones.separadorMiles : "") + numeroComoCadena.substring(limiteInferior, indice) + formateadoSinDecimales;
            indice -= CIFRAS_MILES;
        }
        let formateadoSinSimbolo = `${formateadoSinDecimales}${numeroComoCadena.substr(posicionDelSeparador, opciones.numeroDeDecimales + 1)}`;
        return opciones.posicionSimbolo === "i" ? opciones.simbolo + formateadoSinSimbolo : formateadoSinSimbolo + opciones.simbolo;
    };
    Vue.filter("minutosATiempo", function (minutos) {
        return minutosATiempo(minutos);
    });
    Vue.filter("dinero", function (cantidad) {
        return aMoneda(cantidad);
    });
});