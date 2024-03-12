# Escape_Game_College

## Installation

### Partie programmes :
#### - Dépendances : 
 	# À installer sur toutes les machines des joueurs.
 	sudo apt update
  	sudo apt upgrade -y
	sudo apt install g++
	sudo apt install python3
 	sudo apt install steghide
	     
#### - Placer le dossier "escapeGame" dans la racine pour qu'il soit facile d'accés.

    
### Partie web : 
#### - Dépendances : 
	# À installer sur la machine serveur de jeu.
 	sudo apt update && sudo apt upgarde -y
	sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql
	sudo apt install php-curl php-gd php-intl php-json php-mbstring php-xml php-zip
 	sudo apt install gqrx-sdr
#### Installer phpmyadmin pour une meilleure gestion de la base de données.(sudo apt install phpmyadmin)
             
#### - Placer le dossier “ENIGMAHACK” dans /var/www/html/ 


### Partie raspberry pi
# - Configuration initial de raspberry
1 Installation du Raspberry
La fa¸con la plus simple d’installer le syst`eme sur un raspberry consiste `a aller
chercher l’image Raspbian packag´ee par la fondation Raspberry[2]. Le syst`eme
ressemble `a une Debian assortie de quelques modifications. La proc´edure est
assez bien document´ee. Il faut t´el´echarger le fichier zip, le d´ecompresser et le
copier sur une carte sd. La carte est ins´er´ee dans le Raspberry, un clavier et
un ´ecran compatible sont branch´es. Ensuite, le syst`eme est lanc´e. `A ce stade, le
syst`eme est en anglais. Le login est pi, le mot de passe raspberry, ou comme le
clavier est anglais : rqspberry. Pour devenir administrateur, il faut utilser sudo.
Ensuite, il faut utiliser la commande sudo raspi-config pour changer
quelques param`etres :
4 : localisation options
- changer les locales (pour disposer des param`etres de la France ;
- la timezone (Europe/Paris)
- keyboard layout (`a priori en fran¸cais)
5 : interfacing options
- Enable ssh
Il est conseill´e de changer le nom d’utilisateur et surtout le mot de passe,
mais cela ne concerne pas cet article. De mˆeme, je change le nom de la machine
en pifm dans les fichiers /etc/hosts et /etc/hostname. Apr`es avoir chang´e le
nom de la machine, c’est plus simple de la rebooter.
Pour pr´eparer l’installation de PiFM, il faut installer le paquet git, le support
des codecs audio (sndfile) et les paquets de compilation. Sur la Rasbian Debian
lite, le paquet build-essential est d´ej`a install´e.
apt install git
apt install libsndfile1-dev
