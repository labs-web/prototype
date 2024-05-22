---
layout: default
chapitre : true
package: pkg_competences
order:  625
---

### Création de la base de données 


````bash

php artisan make:model Notification -m

php artisan make:migration add_title_message_isVue_to_notifications_table --table=notifications

````