---
layout: default
chapitre: true
package : pkg_autorisations
order: 620
---

### Création de la base de données 


````bash
php artisan make:migration create_posts_table
php artisan make:migration create_tags_table
php artisan make:migration create_post_tag_table
````