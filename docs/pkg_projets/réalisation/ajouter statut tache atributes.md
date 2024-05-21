---
layout: default
chapitre: true
package: pkg_projets
order: 646
---
### Ajouter statut tache atributes


````bash
php artisan make:migration add_nom_and_description_to_statut_taches_table --table=statut_taches
php artisan migrate 
````