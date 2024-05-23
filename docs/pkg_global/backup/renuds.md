---
layout: default
chapitre: true
package: pkg_global
presentationPackage: pkg_global
order: 1200
---


# Backup base de donnee

```bash

SELECT *
INTO OUTFILE 'C:/backup'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
FROM information_schema.tables
WHERE table_schema = 'prototype';

```
