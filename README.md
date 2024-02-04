<h1>Checkpoint 4</h1>

<p>Projet réalisé dans le cadre du checkpoint de fin de formation de la Wild Code School. </p>

<h2>Base de données</h2>

<img src="images/BDD-Checkpoint.jpg" alt="BDD du projet portfolio">
<p>La base de données du projet se construit autour de 5 tables :</p>
<ul>
  <li>Admin : contient les identifiants nécessaires à l'accès admin.</li>
  <li>Formation : Le portfolio agit ici comme un CV en ligne, il contient donc toutes les informations concernant mon background universitaire.</li>
  <li>Expérience : Ici une liste des postes pouvant être intéressants pour les employeurs potentiels.</li>
  <li>Projet web : L'idée ici est de contenir toutes les informations des projets réalisés dans le cadre de la formation. Etant en relation Many-To-Many, cette table est liée à la table "Stack" par la table de jointure "Projet_stacks".</li>
  <li>Stacks : Liste des langages utilisés et donc su pour chacun des projets. Une ou plusieurs stacks doivent pouvoir catégorisées un ou plusieurs projets, d'où la création d'une table de jointure.</li>
  <li>Contact : Table créé afin de gérer les messages provenant d'employeurs potentiels.</li>
</ul>

<h2>Le projet</h2>
<p>Pour ce checkpoint, j'ai décidé de réaliser un portfolio simple afin de mettre en avant les différents projets que j'ai pu réaliser au cours de la formation, mais qui contiendrait par la suite les différents visuels de communication réalisés lors de mes précédentes expériences professionnelles et mon évolution sur différents projets personnelles.</p>
<br>
<p>Le portfolio a été pensé pour être utilisable par n'importe qui, il était donc nécessaire de réfléchir à une interface simple de mise en ligne et de gestion des contenus. J'ai donc choisi de réaliser le dashboard en utilisant le bundle EasyAdmin de PHP qui agit comme gestionnaire des différents cruds générés pour chaque table ajouté au dashboard.</p>