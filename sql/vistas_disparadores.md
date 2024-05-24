# Vistas y Disparadores

## Vistas

### Horizontal

Esta vista muestra todos los datos de los rescatistas, contactos y derrumbes en una fila para cada registro de derrumbe.

```sql
CREATE VIEW Vista_Horizontal AS
SELECT Rescatista.Nombre AS Nombre_Rescatista, Rescatista.Telefono AS Telefono_Rescatista,
	  Contacto.Nombre AS Nombre_Contacto, Contacto.Telefono AS Telefono_Contacto,
	  Derrumbe.Descripcion, Derrumbe.Necesidades, Derrumbe.Tipo_de_Dano, Derrumbe.Estatus
FROM Derrumbe
INNER JOIN Rescatista ON Derrumbe.ID_Contacto = Rescatista.ID
INNER JOIN Contacto ON Derrumbe.ID_Contacto = Contacto.ID;
```

```sql
SELECT * FROM Vista_Horizontal;
```

### Vertical

Esta vista muestra todos los datos de los rescatistas, contactos y derrumbes en columnas separadas para cada registro de derrumbe.

```sql
CREATE VIEW Vista_Vertical AS
SELECT 'Rescatista' AS Tipo, ID, Nombre, Telefono, Horas, Puesto, NULL AS Descripcion, NULL AS Necesidades, NULL AS Tipo_de_Dano, NULL AS Estatus
FROM Rescatista
UNION ALL
SELECT 'Contacto' AS Tipo, ID, Nombre, Telefono, NULL AS Horas, NULL AS Puesto, NULL AS Descripcion, NULL AS Necesidades, NULL AS Tipo_de_Dano, NULL AS Estatus
FROM Contacto
UNION ALL
SELECT 'Derrumbe' AS Tipo, ID, NULL AS Nombre, NULL AS Telefono, NULL AS Horas, NULL AS Puesto, Descripcion, Necesidades, Tipo_de_Dano, Estatus
FROM Derrumbe;
```

```sql
SELECT * FROM Vista_Vertical;
```

### Agrupada

Esta vista muestra la cantidad de derrumbes por estado.

```sql
CREATE VIEW Vista_Agrupada AS
SELECT Estado.Nombre AS Estado, COUNT(Derrumbe.ID) AS Cantidad_Derrumbes
FROM Derrumbe
INNER JOIN Direccion ON Derrumbe.ID_Direccion = Direccion.ID
INNER JOIN Estado ON Direccion.ID_Estado = Estado.ID
GROUP BY Estado.Nombre;
```

```sql
SELECT * FROM Vista_Agrupada;
```

## Disparadores

```sql
DELIMITER //
CREATE TRIGGER UpdateRescatistaHours AFTER INSERT ON Derrumbe
FOR EACH ROW
BEGIN
    DECLARE rescatista_id INT;
    DECLARE horas_derrumbe INT;
    
    -- Get the Rescatista ID associated with the Derrumbe
    SELECT ID_Contacto INTO rescatista_id FROM Derrumbe WHERE ID = NEW.ID_Derrumbe;
    
    -- Get the hours associated with the Derrumbe
    SELECT horas INTO horas_derrumbe FROM Rescatista WHERE ID = rescatista_id;
    
    -- Update Rescatista hours
    UPDATE Rescatista SET Horas = Horas + horas_derrumbe WHERE ID = rescatista_id;
END //
DELIMITER ;
```

```sql
DELIMITER //
CREATE TRIGGER UpdateDerrumbeStatus AFTER UPDATE ON Direccion
FOR EACH ROW
BEGIN
    DECLARE derrumbe_id INT;
    DECLARE estatus_actual VARCHAR(30);
    
    -- Get the Derrumbe ID associated with the updated Direccion
    SELECT ID_Derrumbe INTO derrumbe_id FROM Direccion WHERE ID = NEW.ID_Direccion;
    
    -- Get the current Estatus of the Derrumbe
    SELECT Estatus INTO estatus_actual FROM Derrumbe WHERE ID = derrumbe_id;
    
    -- Update Derrumbe Estatus based on Direccion update
    IF NEW.Colonia IS NULL THEN
        UPDATE Derrumbe SET Estatus = 'Dirección actualizada sin colonia' WHERE ID = derrumbe_id;
    ELSE
        UPDATE Derrumbe SET Estatus = 'Dirección actualizada con colonia' WHERE ID = derrumbe_id;
    END IF;
END //
DELIMITER ;
```

```sql
DELIMITER //
CREATE TRIGGER set_default_ids
AFTER INSERT ON Direccion
FOR EACH ROW
BEGIN
    SET NEW.ID_Ubicacion = NEW.ID;
    SET NEW.ID_Municipio = NEW.ID;
    SET NEW.ID_Estado = NEW.ID;
END;
//
DELIMITER ;
```