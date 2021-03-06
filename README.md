# Domotique
Projet de box domotique (projet en cours de réalisation)


# Objectifs:
*Ce projet a pour but de mettre en oeuvre un reseau de communication Zigbee pour créer une box domotique. 
Les composants utilisés sont les suivants:

[Raspberry PI 3B](https://fr.rs-online.com/web/p/raspberry-pi/1828032/?r=f&redirect-relevancy-data=7365617263685F636173636164655F6F726465723D31267365617263685F696E746572666163655F6E616D653D4931384E525353746F636B4E756D626572267365617263685F6C616E67756167655F757365643D656E267365617263685F6D617463685F6D6F64653D6D61746368616C6C267365617263685F7061747465726E5F6D6174636865643D5E2828282872737C5253295B205D3F293F285C647B337D5B5C2D5C735D3F5C647B332C347D5B705061415D3F29297C283235285C647B387D7C5C647B317D5C2D5C647B377D29292924267365617263685F7061747465726E5F6F726465723D31267365617263685F73745F6E6F726D616C697365643D59267365617263685F726573706F6E73655F616374696F6E3D5265646972656374267365617263685F747970653D52535F53544F434B5F4E554D424552267365617263685F77696C645F63617264696E675F6D6F64653D4E4F4E45267365617263685F6B6579776F72643D3839362D38363630267365617263685F6B6579776F72645F6170703D38393638363630267365617263685F636F6E6669673D3126&searchHistory=%7B%22enabled%22%3Atrue%7D)

[Ecran tactile](https://fr.rs-online.com/web/p/ecrans-raspberry-pi/8997466/?relevancy-data=7365617263685F636173636164655F6F726465723D31267365617263685F696E746572666163655F6E616D653D4931384E525353746F636B4E756D626572267365617263685F6C616E67756167655F757365643D656E267365617263685F6D617463685F6D6F64653D6D61746368616C6C267365617263685F7061747465726E5F6D6174636865643D5E2828282872737C5253295B205D3F293F285C647B337D5B5C2D5C735D3F5C647B332C347D5B705061415D3F29297C283235285C647B387D7C5C647B317D5C2D5C647B377D29292924267365617263685F7061747465726E5F6F726465723D31267365617263685F73745F6E6F726D616C697365643D59267365617263685F726573706F6E73655F616374696F6E3D267365617263685F747970653D52535F53544F434B5F4E554D424552267365617263685F77696C645F63617264696E675F6D6F64653D4E4F4E45267365617263685F6B6579776F72643D3839392D37343636267365617263685F6B6579776F72645F6170703D38393937343636267365617263685F636F6E6669673D3126&searchHistory=%7B%22enabled%22%3Atrue%7D)

[Antenne Zigbee](https://phoscon.de/en/raspbee2/)

[Capteur de temperature]( https://expo.tuya.com/product/712038)

[Prise connectée]( https://www.batna24.com/en/p/xiaomi-mi-smart-plug-zigbee-wall-plug-rmmmh#support)




## Hardware
Installation de l'ecran et de la RPI 
installation du capteur Zigbee
### Electronique
relier l'ecran et l'antenne Raspbee sur la Raspberry PI. (utiliser la carte kicad si besoin)

### Support
un modèle fusion 360 est disponible dans le dossier Hardware. Il est inspiré du modèle [thingiverse]( https://www.thingiverse.com/thing:2756684 )

le modèle a été imprimé en PLA et TPU avec une Creality CR10

## Software
###installer Raspbian sur la RPI

### Mettre à jour

```
sudo apt update
sudo apt upgrade
```

### Installation de deCONZ et de la puce RaspBee

#### Désactivation de la console Serie 

```
sudo raspi-config
```
Advanced Options -> Serial -> Disable Commandline over Serial

#### Désactivation du service getty
```
sudo systemctl disable serial-getty@ttyAMA0.service
```
#### Désactivation du bluetooth 

1. Ajouter la ligne suivant dans le fichier /boot/config.txt:
```
sudo nano /boot/config.txt
```
```
dtoverlay=pi3-disable-bt
```
2. Désactivation du modem Bluetooth
```
sudo systemctl disable hciuart
```
#### Installation de l'application DeCONZ
```
sudo gpasswd -a $USER dialout
wget -O - http://phoscon.de/apt/deconz.pub.key | sudo apt-key add -
sudo sh -c "echo 'deb http://phoscon.de/apt/deconz $(lsb_release -cs) main' > /etc/apt/sources.list.d/deconz.list"
sudo apt update
sudo apt install deconz
sudo systemctl edit deconz-gui
```

ajouter l'option

```
–ws-port=8081
```

#### Lancement de l'application
```
sudo systemctl disable deconz
sudo systemctl stop deconz
sudo systemctl enable deconz-gui
```

#### Redémarrage
```
sudo reboot
```

[Tuto]( https://presentationdeconz.wordpress.com/installation/)



### Installation d'Apache2
```
sudo apt install apache2 -y
```
```
sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/
```

###Installation de PHP

```
sudo apt install php -y

sudo service apache2 restart

```

### placer les fichiers de l'application Web "Software" dans le dossier /var/www/html 

```
sudo cp -r /home/pi/Desktop/Software /var/www/html
```

