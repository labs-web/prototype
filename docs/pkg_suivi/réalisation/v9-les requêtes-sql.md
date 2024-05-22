---
layout: default
chapitre: true
package: pkg_suivi
order: 625
---

### Suivi de l’état d’avancement des apprenants

#### Requêtes

1. Donnez les projets qui ont plus des tâches non réalisé

```bash
SELECT
    p.id,
    p.nom,
    COUNT(t.id) AS NonRealiseTaches
FROM
    projets p
JOIN
    taches t ON p.id = t.projet_id
JOIN
    statut_taches st ON t.statut_tache_id = st.id
WHERE
    st.nom = 'afaire'
GROUP BY
    p.id, p.nom
HAVING
    COUNT(t.id) > 0;

```

2. Donnez les projets qui ont des livrables sans github

```bash
SELECT
    p.id,
    p.nom AS nom_projet,
    d.id AS id_livrable,
    d.nom AS nom_livrable
FROM
    projets p
JOIN
    livrables d ON p.id = d.projet_id
LEFT JOIN
    github g ON d.id = g.livrable_id
WHERE
    g.livrable_id IS NULL;

```

3. Donnez les projets les plus lents à réalisé

```bash
SELECT
    p.id,
    p.nom AS nom_projet,
    DATEDIFF(MAX(t.dateEcheance), MIN(t.dateDebut)) AS duree_totale
FROM
    projets p
JOIN
    taches t ON p.id = t.projet_id
GROUP BY
    p.id, p.nom
ORDER BY
    duree_totale DESC
LIMIT 1;
```
