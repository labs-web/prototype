---
layout: default
chapitre: true
package : pkg_autorisations
order: 620
---

### Création de la base de données 


````bash

php artisan make:model Action -m
php artisan make:model Controller -m
php artisan make:model Autorisation -m

 php artisan make:migration add_nom_and_controller_id_to_actions_table --table=actions
 php artisan make:migration add_role_id_and_action_id_to_autorisations_table --table=autorisations
 php artisan migrate 
````