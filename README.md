# NetKart-S1
  
SAE S3 IUT Informatique Aix

Nom des variables, commentaires... en anglais

## Conventions de nommage
  
* Pour les variables et fonctions, suivre la Snake Case : mots en minuscules séparés par des underscores '_'.
  
* Noter les arguments de fonctions, classes en majuscules préfixés de A_, les variables locales préfixées de l_, les constantes préfixées de K_ et en majuscules.
  
* Pour les fonctions commencer par : 
    * check : test, renvoit un booléen
    * get : renvoit une valeur
    * set : affecte une valeur
    * find: recherche


## Normes sur les commit
  
Les commit se font sous cette forme :
<pre>
<b><a href="#types">&lt;type&gt;(task)</a></b></font>: <b><a href="#sujet">&lt;sujet&gt;</a></b>
</pre>

### Types
* API changements majeurs
    * `feat` Commits, nouvelle fonctionnalité
    * `fix` Commits, bug corrigé
* `refactor` Commits, qui modifient l'arborescence mais qui n'affectent pas le fonctionnement
    * `perf` Commits spéciaux de `refactor` qui améliorent la performance
* `style` Commits,qui n'affectent pas le sens (espace, format, point-virgule...)
* `test` Commits, qui ajoutent ou corrigent un test
* `docs` Commits, sur la documentation seulement
* `build` Commits, qui affectent des composants comme les pipeline, versions...
* `ops` Commits, sauvegarde, restauration...
* `chore`modifient `.gitignore`

### Sujets
Le `sujet` contient une description du changement.
* Pas de majuscule à la première lettre
* Pas de point à la fin

## Normes sur les fichiers

Les fichiers sont a nommer selon la Snake_Case
