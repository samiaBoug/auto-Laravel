## Atelier Blade : 

### introduction :

#### Introduction à Blade :

- Présenter Blade, le moteur de templates simple et puissant inclus avec Laravel. 
- Expliquez comment Blade compile les templates en code PHP pur et les met en cache jusqu'à modification, assurant ainsi une performance optimale. - Mentionnez que les fichiers Blade utilisent l'extension .blade.php et sont généralement stockés dans le répertoire resources/views. 

### Affichage des données :
#### Codage d'entité HTML :
 - Afficher des données passées aux vues Blade en utilisant des accolades doubles {{ }}. 
 - Soulignez que ces expressions sont automatiquement échappées pour prévenir les attaques XSS. 
 - Pour afficher des données non échappées, utilisez **{!! !!}**, en précisant les risques potentiels liés à cette méthode. 
- HTML Entity Encoding : donner un exemple de script

#### Blade et les frameworks JavaScript
- Blade utilise @ pour éviter des conflits avec les expressions de frameworks comme Vue.js ou React : donner un exemple @{{ name }}
- Rendering JSON 
- @verbatim  

### Blade directives :
- if statement 
  - @if ,  @elseif , 
  - @unless
  - @isset , @empty
- 
### Components : 

### comonents anonymes :

### 
### formulaires : 
### Piles
### Injection de service
### Rendu des modèles de lames en ligne
### Rendu des fragments de lame
### Lame extensible
## Références : 
https://laravel.com/docs/11.x/frontend#php-and-blade