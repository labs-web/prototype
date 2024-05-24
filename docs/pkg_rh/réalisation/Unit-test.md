---
layout: default
chapitre : true
package: gestion_rh
order:  627
---

### Création de la base de données 


````bash

php artisan make:test  pkg_rh/GroupeTest
php artisan make:test  pkg_rh/PersonneTest


php artisan test --filter=GroupeTest
php artisan test --filter=PersonneTest


````


![test](/prototype/pkg_rh/réalisation/images/testdone.png){: width="600px" }*Figure : Test pour la class groupe*