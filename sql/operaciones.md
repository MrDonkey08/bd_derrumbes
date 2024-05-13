# Implementación de Operaciones de Actualización

## Sistema de Gestión de Derrumbes

### Inserción

```sql
INSERT INTO Contacto (Nombre, Apellido, Telefono, Correo) VALUES
	('Juan', 'Pérez', '555-1234', 'juanperez@gmail.com'),
	('María', 'García', '555-5678', 'magarcia@hotmail.com'), 
	('Carlos', 'López', '555-9012', 'carlopez@outlook.com'),
	('Ana', 'Martínez', '555-3456', 'anamartinez@yahoo.com'),
	('Pedro', 'Ramírez', '555-7890', 'ramirezpedro@gmail.com');

INSERT INTO Ubicacion (Enlace, Latitud, Longitud) VALUES
	('https://maps.google.com/?q=19.4326,-99.1332', 19.4326, -99.1332),
	('https://maps.google.com/?q=25.6866,-100.3161', 25.6866, -100.3161),
	('https://maps.google.com/?q=20.6597,-103.3496', 20.6597, -103.3496),
	('https://maps.google.com/?q=22.3964,-97.6569', 22.3964, -97.6569),
	('https://maps.google.com/?q=16.7569,-93.1292', 16.7569, -93.1292);

INSERT INTO Municipio (Nombre) VALUES
	('Ciudad de México'),
	('Monterrey'),
	('Guadalajara'),
	('Veracruz'),
	('Tuxtla Gutiérrez');

INSERT INTO Estado (Nombre) VALUES
	('Ciudad de México'),
	('Nuevo León'),
	('Jalisco'),
	('Veracruz'),
	('Chiapas');

INSERT INTO Direccion (Calle, Numero_exterior, Colonia, Tipo_de_Residencia, ID_Ubicacion, ID_Municipio, ID_Estado) VALUES
	('Av. Reforma', 123, 'Centro', 'Casa'),
	('Av. Constitución', 456, 'Centro', 'Departamento'),
	('Av. Chapultepec', 789, 'Providencia', 'Casa'),
	('Av. Juárez', 1011, 'Centro', 'Casa'),
	('Av. Central', 1213, 'Centro', 'Departamento');

INSERT INTO Derrumbe (Descripcion, Necesidades, Tipo_de_Dano, Estatus, ID_Contacto, ID_Direccion) VALUES
	('Derrumbe en edificio de oficinas', 'Equipo de rescate', 'Estructural', 'En curso'),
	('Deslizamiento de tierra en cerro', 'Equipo de excavación', 'Geomorfológico', 'En espera'),
	('Derrumbe de muro de contención', 'Material de construcción', 'Estructural', 'Finalizado'),
	('Desprendimiento de rocas en carretera', 'Equipo de limpieza', 'Geomorfológico', 'En curso'),
	('Colapso de techo en casa habitación', 'Equipo de rescate', 'Estructural', 'En espera');

INSERT INTO Rescatista (Nombre, Apellido, Telefono, Correo, Horas, Puesto) VALUES
	('Luis', 'Hernández', '555-1111', 'luis_hernandez@gmail.com', 40, 'Coordinador'),
	('Laura', 'Rodríguez', '555-2222', 'laura_rodriguez@gmail.com', 30, 'Médico'),
	('Jorge', 'Pérez', '555-3333', 'jorge_perez@outlook.com', 50, 'Rescatista'),
	('María'. 'González', '555-4444', 'gonzalez_maria@gmail.com', 45, 'Rescatista'),
	('José', 'Martínez', '555-5555', 'martinez_jose@hotmail.com', 35, 'Voluntario');
```

### Actualización

```sql
UPDATE Contacto
SET Nombre = 'Juan', Telefono = '1111111111'
WHERE ID = 1;

UPDATE Direccion
SET Calle = 'Avenida Reforma', Numero_exterior = 250
WHERE ID = 2;

UPDATE Derrumbe
SET Descripcion = 'Derrumbe en construcción abandonada', Estatus = 'En proceso'
WHERE ID = 3;
```

### Eliminación

```sql
DELETE FROM Derrumbe
WHERE ID_Contacto = 4 OR ID_Direccion = 5;

DELETE FROM Contacto
WHERE ID = 4;

DELETE FROM Direccion
WHERE ID = 5;
```

### Muestreo

```sql
\dt
```

```sql
SELECT * FROM Contacto;
SELECT * FROM Ubicacion;
SELECT * FROM Municipio;
SELECT * FROM Estado;
SELECT * FROM Direccion;
SELECT * FROM Derrumbe;
SELECT * FROM Rescatista;
```

### Vaciado

```sql
DELETE FROM Contacto;
DELETE FROM Ubicacion;
DELETE FROM Municipio;
DELETE FROM Estado;
DELETE FROM Direccion;
DELETE FROM Derrumbe;
DELETE FROM Rescatista;
```

```sql
ALTER SEQUENCE contacto_id_seq RESTART WITH 1;
ALTER SEQUENCE ubicacion_id_seq RESTART WITH 1;
ALTER SEQUENCE municipio_id_seq RESTART WITH 1;
ALTER SEQUENCE estado_id_seq RESTART WITH 1;
ALTER SEQUENCE direccion_id_seq RESTART WITH 1;
ALTER SEQUENCE derrumbe_id_seq RESTART WITH 1;
ALTER SEQUENCE rescatista_id_seq RESTART WITH 1;
```
