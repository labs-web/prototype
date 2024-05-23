---
layout: default
chapitre : true
package: gestion_rh
order:  628
---

### Ajouter le nom , prenom et type dans la table personnes 



````bash
    php artisan make:migration add_nom_prenom_to_personnes_table --table=personnes

     php artisan make:migration add_type_to_personnes_table --table=personnes

     php artisan migrate 
     
````