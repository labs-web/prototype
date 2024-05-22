---
layout: default
chapitre : true
package: pkg_competences
order:  625
---

### Les requêtes sql

- Donnez le niveau des apprenants par compétence

```sql
    SELECT 
    a.nom AS Apprenant,
    c.nom AS Competence,
    n.nom AS Niveau
FROM 
    arber_competences.apprenant AS a
JOIN 
    arber_competences.apprenantcompetence AS ac ON a.id = ac.apprenant_id
JOIN 
    arber_competences.competence AS c ON ac.competence_id = c.id
JOIN 
    arber_competences.niveaucompetence AS n ON ac.niveau_id = n.id;
```


- Donnez le pourcentage d’avancement de chaque compétence

```sql
SELECT 
    c.nom AS Competence,
    AVG(ac.avancement) AS Pourcentage_Avancement
FROM 
    arber_competences.competence AS c
JOIN 
    arber_competences.apprenantcompetence AS ac ON c.id = ac.competence_id
GROUP BY 
    c.nom;
```