# Slab template

## Previsualización
Para previsualizar el proyecto se tiene que hacer uso de un servidor local, utilizando herramientas como XAMPP o MAMP. 

Adicionalmente, para evitar la muestra de errores durante la previsualización, se necesitará crear las siguientes tablas en **PhpMyAdmin**:


**metrics:**
  | Columna | Tipo de dato | Default | Key |
| ------------- | :-------------: | :-------------: | :-------------: |
| user_id  | int  | AUTO_INCREMENT | PK |
| deck_id  | int | NULL | FK |
| slab_id  | int  | NULL | FK |
| progress  | int  | 0 | - |
| created_at  | timestamp | CURRENT_TIMESTAMP  | - |


**deck:**
  | Columna | Tipo de dato | Default | Key |
| ------------- | :-------------: | :-------------: | :-------------: |
| id  | int  | AUTO_INCREMENT  | PK |
| user_id  | int | - | - |
| tracker_1  | tinyint  | 0  | - |
| tracker_2  | tinyint  | 0  | - |
| current_slab  | int  | 1  | - |
| slab_1_id  | int  | NULL | FK |
| slab_2_id  | int  | NULL | FK |
| slab_3_id  | int  | NULL | FK |
| slab_4_id  | int  | NULL | FK |
| slab_5_id  | int  | NULL | FK |
| slab_6_id  | int  | NULL | FK |
| slab_7_id  | int  | NULL | FK |
| slab_8_id  | int  | NULL | FK |
| slab_9_id  | int  | NULL | FK |
| slab_10_id  | int  | NULL | FK |


**slab:**
 | Columna | Tipo de dato | Default | Key |
| ------------- | :-------------: | :-------------: | :-------------: |
| id  | int  | AUTO_INCREMENT  | PK |
| deck_id  | int  | NULL  | - |
| user_id  | int | NULL | - |
| slab_num  | int  | NULL  | - |
| slab_progress  | int  | 0  | - |
| rating  | int  | NULL  | - |
| ts_1  | tinyint  | 0 | - |
| ts_2  | tinyint  | 0 | - |
| ts_3  | tinyint  | 0 | - |
| ts_4  | tinyint  | 0 | - |
| ts_5  | tinyint  | 0 | - |
| ts_6  | tinyint  | 0 | - |
| ts_7  | tinyint  | 0 | - |
| ts_8  | tinyint  | 0 | - |
| ts_9  | tinyint  | 0 | - |
| act_1  | tinyint  | 0 | - |
| act_2  | tinyint  | 0 | - |
| act_3  | tinyint  | 0 | - |
