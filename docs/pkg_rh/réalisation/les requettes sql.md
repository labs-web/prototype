---
layout: default
chapitre : true
package: gestion_rh
order:  629
---




## pkg_rh

### Variant 3 : class - Personne avec héritage

#### Requêtes SQL :
- Donnez la liste des formateurs
- Donnez la liste des apprenants
- Donnez les apprenants qui n’ont pas des tâches à faire



#### Reponse 
- Donnez la liste des formateurs

```bash

SELECT nom, prenom
FROM prototypecc.personnes
WHERE type = 'formateurs';
```



- Donnez la liste des apprenants


```bash

SELECT nom, prenom
FROM prototypecc.personnes
WHERE type = 'apprenant';





```
- Donner les apprenants qui n’ont pas des tâches  
- Donnez les apprenants qui n’ont pas des tâches à faire

```bash


SELECT p.*
FROM personnes p
LEFT JOIN projets pr ON pr.personne_id = p.id
LEFT JOIN taches t ON t.projet_id = pr.id
WHERE p.type = 'apprenant' AND t.id IS NULL;



SELECT DISTINCT p.nom, p.prenom
FROM personnes p
JOIN projets pr ON p.id = pr.personne_id
JOIN taches t ON pr.id = t.projet_id
LEFT JOIN statut_taches st ON t.id = st.tache_id
WHERE p.type = 'apprenant'
AND (st.nom NOT LIKE '%a faire%' OR st.nom IS NULL);


```