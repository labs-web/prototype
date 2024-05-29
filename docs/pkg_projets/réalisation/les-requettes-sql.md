---
layout: default
chapitre : true
package: pkg_projets
order:  647
---

### Variant 5 : class - Tache

#### Requêtes SQL :

- Donnez les tâches non affectées
- Donnez les tâches non affecté à “Madani Ali”



#### Reponse

- Donnez les tâches non affectées

```sql
SELECT *
FROM taches
WHERE personne_id IS NULL;
```



- Donnez les tâches non affecté à “Madani Ali”


```sql
-- “Madani Ali” id = 14
UPDATE taches SET personne_id = 14 
WHERE personne_id IS NULL;
```
