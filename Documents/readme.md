\# Guide de déploiement de mon application web en local avec PHP, MySQL et MongoDB

Cette guide explique comment déployer mon application web en PHP localement en utilisant Visual Studio Code comme éditeur de code, XAMPP pour le serveur web et la base de données MySQL avec PHPMyAdmin, ainsi que MongoDB Compass pour la base de données NoSQL MongoDB.

\## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :

\- [Visual Studio Code](<https://code.visualstudio.com/>):

Pour Visual Studio Code c'est important d'instaler les extensions PHP, du type:'PHP **v1.46.15409'** , et 'PHP bulit in Server' disponibles dans la rubrique «'Extensions » de VS Code.

\- [XAMPP](https://www.apachefriends.org/index.html) (pour PHP et MySQL)

\- [MongoDB Compass](https://www.mongodb.com/try/download/compass) (pour MongoDB)

-Ajouter PHP dans le path de variables de votre système,si vous etes sur Windows, taper sur la recherche :'Modifier les variables d'environnempent systeme',apres 'Variables d'environnement',dans Variables systeme,clquez sur Path,'modifer',''nouveau','parcourir',rendez vous sur emplacement du fichier que normalement c'est dans le chemin 'C:\xampp\php' et selectionner le fichier  PHP.exe.

\### 1. Cloner ou créer l'application PHP

Dans le répertoire C:\xampp\htdocs clonez l'application PHP existant depuis un dépôt distant ou créez un nouveau projet (copier tous les fichiers après les avoir téléchargé de github)dans le répertoire de votre choix.

Avec Git Bash :

Ouvrez Git Bash a l 'intérieur du  fichier vide et tapez :

git clone <URL\_du\_dépôt>

Pour télécharger un dossier depuis GitHub, accédez à votre dépôt souhaité, sélectionnez le dossier que vous souhaitez télécharger depuis GitHub, copiez l'URL, accédez à <https://download-directory.github.io/> et collez l'URL dans la zone de texte, puis appuyez sur Entrée.


\### 2. Ouvrez le projet dans Visual Studio Code :

Ouvrez Visual Studio Code et naviguez vers le répertoire de votre projet.
(l'structure des fichiers du projet sera automatiquement créée et vous aurez les librairies bootstrap.bundle.min.js et bootstrap.min.css stockées dans les dossiers du projet js et styles respectivement).



\### 3. Démarrer les services XAMPP

Lancez XAMPP et démarrez les services Apache et MySQL.


\### 4. Importer la base de données MySQL

Utilisez PHPMyAdmin pour importer votre base de données MySQL.

Ouvrez votre navigateur et accédez à http://localhost/phpmyadmin.

Créez une nouvelle base de données ou sélectionnez une base de données existante.

Importez votre fichier SQL contenant la structure et les données de votre base de données.



\### 5.  Configurer la connexion à MySQL dans votre application PHP

Dans votre application PHP, assurez-vous que les paramètres de connexion à MySQL sont correctement configurés pour se connecter à votre base de données locale.

Dans le cas de mon application il faut aller et éditer le fichier 'config.inc.php' ou on trouvera :

define('BDD\_LOGIN', '');

define('BDD\_PASSWORD', '');

define('BDD\_SERVER', 'localhost');

define('BDD\_DATABASE', '');

remplissez les guillemets vides par les paramètres de votre base des données.

\### 6.  Installer MongoDB et démarrer le service

Assurez-vous que MongoDB est installé sur votre système .


\### 7. Utiliser MongoDB Compass pour gérer la base de données MongoDB

Ouvrez MongoDB Compass et connectez-vous à votre instance locale de MongoDB.


\### 8. Modifier votre application PHP pour utiliser MongoDB

Modifiez votre application PHP pour interagir avec MongoDB en utilisant le pilote MongoDB approprié pour PHP, tel que [MongoDB PHP Library](https://docs.mongodb.com/drivers/php/).

Un exemple serait :

Téléchargez le pilote mongo pour Windows depuis pecl.php.net. Téléchargez la dernière version stable en cliquant sur le lien DLL. Sur la page suivante, une liste de DLL s'affiche. Assurez-vous de choisir la bonne en fonction de :

la version de PHP installée avec votre XAMPP,

l'architecture x86 ou x64,

si la sécurité des threads est activée ou désactivée.

Lorsque la sécurité des threads est activée, vous devez télécharger la version Thread Safe (TS).

Décompressez la version téléchargée du pilote mongo et allez sur:(Si vous avez installé XAMPP sur le lecteur C, le chemin complet vers le dossier ext serait) : C:\xampp\php\ext.

Enregistrez le fichier mongodb.dll dans php.ext..

Ajoutez la ligne suivante dans le fichier php.ini(dans C:\xampp\php\php.ini) ouvrez-le avec un éditeur de texte de type bloc de notes :

` `extension=php\_mongodb.dll

extension=mongodb.so

Redémarrez XAMPP et aller sur http:/localhost/ et allez sur la rubrique  phpinfo, actualisez la page et puis  appuyez sur CTRL+F et tapez mongodb, vous devriez trouver des informations sur le pilote MongoDB nouvellement installé.



\### 9. Tester votre application

Lancez votre application web dans votre navigateur et vérifiez qu'elle fonctionne correctement en interagissant avec les données dans les bases de données MySQL et MongoDB.

Pour faire ce-ci il y a deux façons possibles :

`	`-écrire sur votre navigateur web : http./localhost/nom\_dossier\_projet/index.php/

ou

`	`-en Visual Studio Code cliquez sur le fichier index.php et dans le menu de navigation supérieur cliquez sur 'Run','Run without debuggin' et 'Launch in built-in server'.





