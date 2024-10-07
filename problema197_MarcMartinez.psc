Algoritmo problema197
    Escribir "HTML"
    Escribir "Creamos formulario con method GET"
    Escribir "Mostrar campo de entrada"
    Escribir "El usuario ingresa un valor"
    Escribir "Mostramos un Input type submit"
    Escribir "Enviamos el formulario"
	
    Escribir "Creamos la función esVocal(letra)"
    vocales = "aeiouAEIOU"
    Escribir "Introduce la frase encriptada"
    
    Definir x1 Como Caracter
    Leer x1  // Leer el valor ingresado por el usuario
	
    Funcion esVocal(letra)
        Si Encontrar(letra, vocales) > 0 Entonces
            Retornar Verdadero
        Sino
            Retornar Falso
        FinSi
    Fin Funcion
	
    Funcion X1toX(x1)
        Definir x Como Caracter
        x <- ""
        Definir consonantes Como Caracter
        consonantes <- ""
		
        // Convertimos la cadena x1 en un array de caracteres
        Para i = 1 Hasta Longitud(x1) Hacer
            letra = Subcadena(x1, i, 1)
            // Si la letra es vocal
            Si esVocal(letra) Entonces
                // Si el buffer consonantes no está vacío
                Si Longitud(consonantes) > 0 Entonces
                    x = x + Invertir(consonantes)  // Añadimos las consonantes invertidas a x
                    consonantes = ""  // Vaciamos el buffer de consonantes
                FinSi
                x = x + letra  // Añadimos la vocal a x
            Sino
                consonantes = consonantes + letra  // Añadimos la consonante al buffer
            FinSi
        Fin Para
		
        // Si quedan consonantes al final
        Si Longitud(consonantes) > 0 Entonces
            x = x + Invertir(consonantes)  // Añadimos las consonantes invertidas a x
        FinSi
        
        Retornar x  // Devolvemos la cadena decodificada x
		// Lógica principal
		Escribir "Lógica PHP"
		Si x1 <> "" Entonces  // Verificamos si el formulario ha sido enviado
			x = X1toX(x1)  // Ejecutamos la función X1toX con el valor ingresado
			Escribir "Resultado: ", x  // Mostramos el resultado en pantalla
		Sino
			Escribir "Por favor, introduzca un valor."  // Mostramos advertencia
		FinSi
    Fin Funcion
Fin Algoritmo
