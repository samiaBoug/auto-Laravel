## Auto-formation : 

**1- Introduction à Blade :**

- Présenter Blade, le moteur de templates simple et puissant inclus avec Laravel. 
- Expliquez comment Blade compile les templates en code PHP pur et les met en cache jusqu'à modification, assurant ainsi une performance optimale. - Mentionnez que les fichiers Blade utilisent l'extension .blade.php et sont généralement stockés dans le répertoire resources/views. 

**2- Affichage des données :**
 - Afficher des données passées aux vues Blade en utilisant des accolades doubles {{ }}. 
 - Soulignez que ces expressions sont automatiquement échappées pour prévenir les attaques XSS. 
 
 - Pour afficher des données non échappées, utilisez **{!! !!}**, en précisant les risques potentiels liés à cette méthode. 

**HTML Entity Encoding :**
donner un exemple de script
**The @ symbol**
donner un exemple @{{ $name }}
**Rendering JSON**

**3- Héritage de templates :**
 Expliquez le concept d'héritage de templates avec Blade. Créez un layout principal utilisant les directives @section et @yield, puis montrez comment les vues enfants peuvent étendre ce layout avec @extends et définir le contenu des sections avec @section. 
LARAVEL

**4- Composants et slots :**
 Introduisez les composants Blade, qui permettent de créer des blocs réutilisables de code. Discutez des composants anonymes et des slots, en montrant comment ils facilitent la création de vues modulaires et maintenables. 
LARAVEL

**5- Structures de contrôle :**
 Présentez les structures de contrôle disponibles dans Blade, telles que les directives @if, @unless, @isset, @empty, ainsi que les boucles @for, @foreach, @forelse et @while. Expliquez comment ces directives simplifient l'écriture de conditions et de boucles dans les templates. 
LARAVEL

**6- Inclusion de sous-vues :**
 Montrez comment inclure des sous-vues ou des fragments de vue à l'aide de la directive @include, ce qui permet de structurer les vues de manière plus efficace et de réutiliser des parties communes. 
LARAVEL

**7- Formulaires et CSRF :**
 Expliquez comment Blade facilite la création de formulaires, en incluant automatiquement les tokens CSRF pour sécuriser les soumissions de formulaires. Mentionnez les directives @csrf et @method pour gérer les formulaires de manière sécurisée. 
LARAVEL

**7- Extensions de Blade :**
 Discutez de la possibilité d'étendre les fonctionnalités de Blade en créant des directives personnalisées, permettant d'ajouter des logiques spécifiques aux besoins de l'application.
-  Laravel Livewire

## Références : 
https://laravel.com/docs/11.x/frontend#php-and-blade