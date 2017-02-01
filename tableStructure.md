mysql> use cabBills;
Database changed
mysql> show tables;
+--------------------+
| Tables_in_cabbills |
+--------------------+
| collectdata        |
| employee           |
+--------------------+
2 rows in set (0.35 sec)

mysql> desc employee;
+--------------+-------------+------+-----+---------+-------+
| Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| id           | varchar(7)  | YES  |     | NULL    |       |
| name         | varchar(50) | YES  |     | NULL    |       |
| acc          | varchar(25) | YES  |     | NULL    |       |
| manager_name | varchar(50) | YES  |     | NULL    |       |
| exp_nature   | varchar(30) | YES  |     | NULL    |       |
| pmtdt        | varchar(20) | YES  |     | NULL    |       |
+--------------+-------------+------+-----+---------+-------+
6 rows in set (1.28 sec)

mysql> desc collectdata;
+-----------------+--------------+------+-----+---------+-------+
| Field           | Type         | Null | Key | Default | Extra |
+-----------------+--------------+------+-----+---------+-------+
| id              | varchar(7)   | YES  |     | NULL    |       |
| submission_date | varchar(10)  | YES  |     | NULL    |       |
| date            | varchar(10)  | YES  |     | NULL    |       |
| brdtm           | varchar(7)   | YES  |     | NULL    |       |
| amount          | decimal(7,2) | YES  |     | NULL    |       |
| rate            | decimal(5,2) | YES  |     | NULL    |       |
+-----------------+--------------+------+-----+---------+-------+
6 rows in set (0.02 sec)