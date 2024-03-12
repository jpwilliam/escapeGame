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

>La façon la plus simple d’installer le système sur un raspberry consiste à aller chercher l’image Raspbian packagée par la fondation Raspberry. Le système ressemble à une Debian assortie de quelques modifications. La procédure est assez bien documentée. Il faut télécharger le fichier zip, le décompresser et le copier sur une carte sd. La carte est insérée dans le Raspberry, un clavier et un écran compatible sont branchés. Ensuite, le système est lancé. À ce stade, le système est en anglais. Le login est pi, le mot de passe raspberry, ou comme le clavier est anglais : raspberry. Pour devenir administrateur, il faut utilser sudo.
>Ensuite, il faut utiliser la commande sudo raspi-config pour changer quelques paramètres :
`4 : localisation options`
- changer les locales (pour disposer des paramètres de la France ;
- la timezone (Europe/Paris)
- keyboard layout (à priori en français)

`5 : interfacing options`
- Enable ssh
>Il est conseillé de changer le nom d’utilisateur et surtout le mot de passe, mais cela ne concerne pas cet article. De même, je change le nom de la machine en pifm dans les fichiers /etc/hosts et /etc/hostname. Après avoir changé le nom de la machine, c’est plus simple de la rebooter.

>Pour préparer l’installation de PiFM, il faut installer le paquet git, le support des codecs audio (sndfile) et les paquets de compilation. Sur la Rasbian Debian lite, le paquet build-essential est déjà installé.
	apt install git
	apt install libsndfile1-dev
