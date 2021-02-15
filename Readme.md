
# ABOUT PROJECT
#### [ PetCare ] Développement Site Web : Recherche de chenils pour chien, Communication avec les gardiens particuliers, Déclaration de perte de chiens <br><span style="font-size:15px">*( 2020.09.16 ~ 2020.12.02 )*</span>

## 1. Membres de l'équipe

|*Members*|*Contact*|
|:---:|---|
|**Joohyun ANN**|[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white)](http://github.com/catwithhumanface) [![Gmail Badge](https://img.shields.io/badge/-annjh11@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:annjh11@gmail.com)](mailto:annjh11@gmail.com)|
|**Maimouna Bah**|[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white)](https://github.com/MaimounaBah) [![Gmail Badge](https://img.shields.io/badge/-maimounab537@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:maimounab537@gmail.com)](mailto:maimounab537@gmail.com)|
|**Cailler Dylan**|[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white)](https://github.com/) [![Gmail Badge](https://img.shields.io/badge/-cailler.dylan@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:cailler.dylan@gmail.com)](mailto:cailler.dylan@gmail.com)|

## 2. Installation du projet
1. Copier Code Github 
2. Connexion WampServer 
3. Import Projet
4. Connexion DB to Phpmyadmin
   1. src/main/webapp/WEB-INF/views/sql
      1. Exécution SQL (petcare.sql)
5. Changement de paramètres
   1. connexionBD.php
      1. dbname
      2. username
      3. password
6. Exécution du WampServer
   
## 3. Présentation du projet
&nbsp; Affirme près de 25% de la population française. En effet, des statistiques montrent qu’un foyer sur deux possède un chien. Néanmoins, la population canine ne cesse de décroître, ce qui engage les défenseurs des animaux à **sensibiliser** les propriétaires, ou futurs propriétaires, du travail que cet animal demande. Ces animaux, devenus domestiques, ont donc besoin de beaucoup d’attention à leur égard, tant au niveau de **leur santé qu’au niveau de leur gardiennage**. L’homme est le meilleur ami du chien, et par extension également la personne qui s’occupe de lui en général, par rapport à toutes les tâches quotidiennes régulières ou irrégulières.<br>Ceci amène plusieurs difficultés, spécialement quand le propriétaire souhaite s’absenter pour un certain temps ;<span style="font-size:13px">*Que faire ? Prendre le chien ? Le laisser ? le faire garder ? Par qui? Quelles options s’offrent à lui?*
</span>
&nbsp; Pour répondre à ces besoins, nous avons décidé de réaliser un site web qui permet de **rechercher** les chenils dans la région, et de **contacter** les gardiens particuliers, ainsi que **déclarer** la perte de chiens.
## 4. Technologie 
![tech](md_imgs/moyen.png)
# Results
## 1. Résultat
### *Main Page*
  
![MainPage](md_imgs/main_page.gif)
<br>
&nbsp;Présentation des trois services que l'on offre ; **Recherche de chenils**, **Contact des gardiens particuliers**, **Déclaration de perte de chien**
### *Chenils*
![AdminPage](md_imgs/chenils.gif)
<br>
&nbsp; L'importation de API de **OpenStreetMap** permet de savoir où se trouve les chenils. Grâce aux bulle d'infos en **javascript**, les utilisateurs peuvent également savoir le nom de chenils lié. L'entrepôt de donnés possédent les chenils existant dans la région toulousaine. Selon les chenils, les informations sur le site ou leur contact sont mise à dispositin.<br><br>
### *Log-in / Log-out*
 - **Se Connecter**
 ![Login](md_imgs/login.gif)
 <br>
 &nbsp;L'inscription se fait avec **l'adresse mail**. Une fois se connectée, la déconnexion est demandée afin de se reconnecter.
 - **Password**
 ![Password](md_imgs/find_password.png)
 <br>
 &nbsp;Dès l'inscription, le mot de passe entré est crypté dans notre base de donnée afin de protéger les donnés personnelles des clients.
 <br>
---
### *Recherche*
![search-flow](md_imgs/system_flow.gif)
<br>
![Search](md_imgs/search.gif)
<br>
&nbsp;Le fonctionnement de recherche se fait en fonction du mot entré, dans les noms de chenils. Les résultats sont montrés par l'ordre alphabet et la recherche en majuscule ou miniscule n'apporte pas de différence.
<br>
<br>
&nbsp;
1. L'image de chenils
2. L'adresse locale du chenils
3. L'URL de site web
4. Le numéro de chenils 
5. L'adreesse mail de chenils 
<br>
   
<br/>

### *Particuliers*
![Particuliers1](md_imgs/particuliers1.png)
<br>
&nbsp;La liste de gardiens particuliers sont montrés.
![particuliers2](md_imgs/particuliers2.png)
<br>
&nbsp;Il est possible de lui envoyer un message afin de comminiquer plus de besoins.
![import2](md_imgs/import.png)
<br>
&nbsp;Les informations de base sont déjà implanté grâce à Session. Le gardein particuliers auquel le message a été envoyé peut consulter les messages dans 'mon compte' lors de sa connexion.
---

### *My Page*
![Mon Compte](md_imgs/mypage.gif)
<br>
&nbsp;La page Mon Compte est différent selon le status du compte (Client ou Gardien). Cela est différencié dès l'inscription.
  - Client
  1. Consultation de son profil, modification
  2. Présentation
  3. Informations de son chien
  - Gardien
  1. Consultation de son profil, modification
  2. Présentation
  3. Les messages recus
  ---
### *Perte de chien*
&nbsp;Tous les utilisateurs peuvent consulter et déclarer la perte de chien.
1. Déclaration de perte de chien
![pertechien](md_imgs/pertechien.png)

## 2. Défis
 - **Base de données** : 
    &nbsp;La base de données devait au mieux représenter les informations par rapport au **besoin exprimé**, qui était donc de mettre en place un site fonctionnel et interactif entre les propriétaires de chiens et des gardiens, professionnels ou particuliers, ou d'autres propriétaires. Il a donc fallu **reflechir à la structure** de la Base de Données afin de pouvoir enregistrer chaque information nécessaire à **l'exploitation et le lien au site web.**<br><br>

&nbsp;En effet, ne connaissant que peu de langages de Bases de Données, nous avons tout d'abord dû décider duquel utiliser afin de faciliter au plus la connexion avec le Site web. Ayant choisi **MySQL Workbench**, nous nous sommes rapidement lancés dans sa création. Mysql est similaire à Oracle, mais le langage n'est pas pas exactement le même. La difficulté était donc d'adapter nos scripts dans le bon langage, par apprentissage numérique de ce dernier et de son environnement. En raison du manque de cours MySQL clairs, certains problèmes sont survenus pendant ce processus de conversion.<br><br>

&nbsp;Par la suite, une **insertion de données** dans la BD était nécessaire par rapport aux informations qui devaient être présents sur le site, notamment ceux des chenils. Pour cela, nous avons utilisé l'outil "web scaper" pour obtenir des données. La plus part du temps, les bases de données n’était pas accessibles et il fallait passer par l’administrateur du site pour pouvoir récolter les données. Néanmoins, pour certains sites Web, ses sections sont reguliers, et l'acquisition de données est autorisé et facile. Cependant, certains sites Web ont des sections confus alors on ne peut pas utiliser le "web scraper" pour **obtenir automatiquement des données**. Cela nous oblige à les **compléter manuellement**, ce qui prend beaucoup de temps. Un autre problème rencontré était par rapport à **l'abondance et répétitions de donées** entre différents sites Web, Cela nous oblige à les trier et à les filtrer manuellement.<br><br>

&nbsp;Finalement, par la mise en place d'un groupe interdisciplinaire et grâce à l’implication de chacun, nous avons réussi à mettre en place une base de données facile à gérer, favorisant la transparence et la qualité de l’information.<br><br>

    
- **Site Web** : 
    
    &nbsp;Notre objectif était de créer un site qui présente clairement les services que PETCARE propose (au niveau du Front-end). Il s'agissait de les faire fonctionner correctement dans le langage PHP & HTML, avec des outils comme **API OpenStreetMap, Bootstrap, Javascript, et JQuery (au niveau du back-end).** En ayant eu peu d'expérience dans la création de site web pour certains membres, il était donc nécessaire d'être avide de connaissances et d'appliquer les apprentissages des cours de Site Web et de Programmation Structurée.<br><br>

En effet, en réalisant le projet, nous avons rencontré quelques difficultés, notamment par rapport à l'utilisation du langage PHP, qui était nouveau pour certains membres de l'équipe. Mais grâce à **la cohésion de l'équipe**, nous avons vite appris à l'utiliser et cette expérience nous a aidé à **avoir confiance dans l'apprentissage de nouvelles technologies.**<br><br>

Cependant, certains services que l'on avait prévu d'intégrer ont dû être abandonnés par manque de temps. Par exemple, **la géolocalisation des utilisateurs** et la création de **l'espace Forum** n'ont pas pu être réalisés.<br><br>

Enfin, **l'interdisciplinarité et le travail d'équipe** nous ont permis de créer un site fonctionnel et interactif qui comprend les fonctions essentielles.<br><br>
