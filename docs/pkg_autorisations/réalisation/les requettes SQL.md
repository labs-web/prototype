---
layout: default
chapitre: true
package : pkg_autorisations
order:  6224
---




## pkg_rh

### Variant 3 : class - Autorisation

#### Requêtes SQL :
- Donnez les actions non autorisées pour l’apprenant “Madani Ali”.




#### Réponse 
- Donnez les actions non autorisées pour l’apprenant “Madani Ali”.


```bash
SELECT a.nom AS ActionNonAutorisee
FROM actions a
LEFT JOIN autorisations au ON a.id = au.action_id
LEFT JOIN roles r ON au.role_id = r.id
LEFT JOIN model_has_roles mr ON r.id = mr.role_id
LEFT JOIN users u ON mr.model_id = u.id AND mr.model_type = 'App\\Models\\User'
WHERE a.id NOT IN (
    SELECT a2.id
    FROM actions a2
    JOIN autorisations au2 ON a2.id = au2.action_id
    JOIN model_has_roles mr2 ON au2.role_id = mr2.role_id
    JOIN users u2 ON mr2.model_id = u2.id AND mr2.model_type = 'App\\Models\\User'
    WHERE u2.name = 'Madani Ali'
);


```
