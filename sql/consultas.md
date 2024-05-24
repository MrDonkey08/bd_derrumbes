# Consulta

## Multitabla con JOIN

```sql
SELECT Derrumbe.Descripcion, Derrumbe.Necesidades, Contacto.Nombre, Contacto.Telefono
FROM Derrumbe
INNER JOIN Contacto ON Derrumbe.ID_Contacto = Contacto.ID;
```

```sql
SELECT c.Nombre AS Nombre_Contacto, de.Descripcion
FROM Contacto c
INNER JOIN Derrumbe de ON c.ID = de.ID_Contacto;
```

```sql
SELECT Derrumbe.Descripcion, Derrumbe.Tipo_de_Dano, Municipio.Nombre AS Municipio, Estado.Nombre AS Estado
FROM Derrumbe
INNER JOIN Direccion ON Derrumbe.ID_Direccion = Direccion.ID
INNER JOIN Municipio ON Direccion.ID_Municipio = Municipio.ID
INNER JOIN Estado ON Direccion.ID_Estado = Estado.ID;
```

## Simple

```sql
SELECT Contacto.Nombre, Contacto.Telefono
FROM Contacto
INNER JOIN Derrumbe ON Contacto.ID = Derrumbe.ID_Contacto
WHERE Derrumbe.Estatus = 'En curso';
```

```sql
SELECT Municipio.Nombre AS Municipio, Estado.Nombre AS Estado, Ubicacion.Enlace
FROM Ubicacion
INNER JOIN Direccion ON Ubicacion.ID = Direccion.ID_Ubicacion
INNER JOIN Municipio ON Direccion.ID_Municipio = Municipio.ID
INNER JOIN Estado ON Direccion.ID_Estado = Estado.ID;
```

## Con Funciones Agregadas

```sql
SELECT COUNT(*) AS Total_Derrumbes
FROM Derrumbe;
```

```sql
SELECT AVG(Horas) AS Promedio_Horas
FROM Rescatista;
```

## Con Campos Calculados

```sql
SELECT Nombre, YEAR(NOW()) - YEAR(Fecha_Nacimiento) AS Edad
FROM Rescatista;
```

```sql
SELECT 
    ACOS(SIN(RADIANS(Ubicacion1.Latitud)) * SIN(RADIANS(Ubicacion2.Latitud)) +
    COS(RADIANS(Ubicacion1.Latitud)) * COS(RADIANS(Ubicacion2.Latitud)) *
    COS(RADIANS(Ubicacion2.Longitud) - RADIANS(Ubicacion1.Longitud))) * 6371 AS Distancia_Km
FROM Ubicacion Ubicacion1, Ubicacion Ubicacion2
WHERE Ubicacion1.ID = 1 AND Ubicacion2.ID = 2;
```