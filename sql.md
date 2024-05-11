# Base de Datos

```sql
CREATE DATABASE appdatabase;
```

```sql
USE appdatabase;
```

```sql
CREATE TABLE tblcontact(id INT(11) AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, apellido VARCHAR(50) NOT NULL, telefono VARCHAR(20) NOT NULL, correo VARCHAR(50) NOT NULL, mensaje VARCHAR(500), PRIMARY KEY(id));
```

```sql
DESCRIBE tblcontact;
```

```sql
SELECT * FROM tblcontact;
```