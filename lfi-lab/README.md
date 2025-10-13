# LFI Lab (Local File Inclusion)

## Endpoint vulnérable
- `GET /view?path=<chemin>`
- Exemple d'exploitation (Linux runner GitHub) :
  - `/view?path=../../etc/hosts`  → doit afficher un contenu contenant "localhost"

## Pourquoi c'est vulnérable ?
Le chemin de fichier vient **directement** du paramètre `path`, sans liste blanche ni confinement.

## Comment corriger (pistes rapides)
- Utiliser une **liste blanche** d'identifiants (ex: "notice", "help") mappés vers des fichiers connus.
- Restreindre la lecture à un **répertoire** précis et refuser toute sortie (pas de `..`).
- Ne **jamais** prendre un chemin brut d'un paramètre utilisateur.
