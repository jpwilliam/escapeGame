# Escape_Game_College

## Présentation
Cet escape game a été mis en place par les étudiants de BUT Réseaux et télécoms de 2ème année de l'IUT de Kourou. Il a été créé afin d'accueillir des collégiens et des étudiants lors d'évènements comme la JPO (Journée Portes Ouvertes de l'IUT) et les cordées de la Réussite. Il a été testé sur plus 50 collégiens et lycéens avec succès. Il se compose de 9 énigmes sur PC dont une avec un Raspberry PI qui émet sur la bande FM.

Pour fonctionner il faut :
- un PC avec un serveur web qui contient le dossier "ENIGMAHACK".  Il contient les pages web du jeu. (cf explications plus bas)
- un outil de gestion de base de données MariadB ou Mysql (cf explications plus bas)
- recopier sur les postes de chaque ordinateur à disposition des joueurs le dossier "jeux"
- imprimer si besoin les affiches du jeu 'locked.jpg' et les instructions supplémentaires mises sur les tables des joueurs 'annexes.pdf'
- utiliser un Raspberry PI pour émettre un code MORSE audio sur la bande FM et à écouter via une radio FM ou une clef SDR/ADALM pluto/hack RF et une application telle que "gqrx".(cf explications plus bas)

## Installation

### Partie programmes sur les PC des joueurs:
#### - Dépendances : 
 	# À installer sur toutes les machines des joueurs.
 	sudo apt update
  	sudo apt upgrade -y
	sudo apt install g++
	sudo apt install python3
 	sudo apt install steghide
	     
#### - Placer le dossier "jeux" dans la racine pour qu'il soit facile d'accés.

    
### Partie web sur le serveur web : 
#### - Dépendances : 
	# À installer sur la machine serveur de jeu.
 	sudo apt update && sudo apt upgrade -y
	sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql
	sudo apt install php-curl php-gd php-intl php-json php-mbstring php-xml php-zip
 	sudo apt install gqrx-sdr
#### Installer phpmyadmin pour une meilleure gestion de la base de données.(sudo apt install phpmyadmin)
             
#### - Placer le dossier “ENIGMAHACK” dans /var/www/html/ 


### Partie Raspberry PI
# - Configuration initiale du Raspberry PI pour l'énigme code MORSE

>La façon la plus simple d’installer le système sur un raspberry consiste à aller chercher l’image Raspbian packagée par la fondation Raspberry(https://www.raspberrypi.com/software/). Le système ressemble à une Debian assortie de quelques modifications. La procédure est assez bien documentée. Il faut télécharger le fichier zip, le décompresser et le copier sur une carte sd. La carte est insérée dans le Raspberry, un clavier et un écran compatible sont branchés. Ensuite, le système est lancé. À ce stade, le système est en anglais. Le login est pi, le mot de passe raspberry, ou comme le clavier est anglais : raspberry. Pour devenir administrateur, il faut utilser sudo.
>Ensuite, il faut utiliser la commande sudo raspi-config pour changer quelques paramètres :

`4 : localisation options`
- changer les locales (pour disposer des paramètres de la France ;
- la timezone (Europe/Paris)
- keyboard layout (à priori en français)

`5 : interfacing options`
- Enable ssh
>Il est conseillé de changer le nom d’utilisateur et surtout le mot de passe, mais cela ne concerne pas cet article. De même, je change le nom de la machine en pifm dans les fichiers /etc/hosts et /etc/hostname. Après avoir changé le nom de la machine, c’est plus simple de la rebooter.

# - Installation de PiFM (https://github.com/ChristopheJacquet/PiFmRds)
	apt install build-essential
	apt install git
	apt install libsndfile1-dev

# - Installation du programme d'émission FM
 	git clone https://github.com/ChristopheJacquet/PiFmRds.git
	cd PiFmRds/src
	make clean
	make
# - Installation du fichier son de l'énigme MORSE
 	cp Morse_code.wav  ~/PiFmRds/src/
	pi_fm_rds -ps PiRateFM -audio Morse_code.wav -freq 94.3M

## Réponses des énigmes :
Consulter le fichier ENIGMAHACK INSTRUCTIONS.md 

## Fonctionnement du serveur de jeu :
Consulter les fichiers ExplicationBD.pdf et Explication_Connexion.pdf



