---
layout: default
chapitre : true
package: pkg_notifications
order:  630
---


### Création de la base de données 


````bash

php artisan make:model Notification -m

php artisan make:migration add_title_message_isVue_to_notifications_table --table=notifications
php artisan make:migration add_apprenant_id_to_notifications_table --table=notifications

````