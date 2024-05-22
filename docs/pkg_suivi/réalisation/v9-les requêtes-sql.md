---
layout: default
chapitre: true
package: pkg_suivi
order: 625
---

### Suivi de l’état d’avancement des apprenants

#### Requêtes

1. Donnez les apprenants qui ont validé la compétence C2

```bash
SELECT p.id AS id_projet, p.nom AS nom_projet, COUNT(t.id) AS nb_taches_non_realisees
FROM projet p
JOIN taches t ON p.id = t.id_projet
JOIN statut_taches st ON t.id = st.id_tache
WHERE st.nom = 'afaire'
GROUP BY p.id, p.nom;

```

2. Donnez les tâches qui ont des livrables sans github

```bash
SELECT p.id AS id_projet, p.nom AS nom_projet
FROM projet p
JOIN livrables l ON p.id = l.id_projet
WHERE l.github_link IS NULL;

```

3. Donnez les tâches les plus lentes à réaliser

```bash
SELECT p.id AS id_projet, p.nom AS nom_projet, p.completion_time
FROM projet p
ORDER BY p.completion_time DESC
LIMIT 10;

```

