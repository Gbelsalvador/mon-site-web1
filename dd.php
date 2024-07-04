<?php
$serveur = "localhost";
$utilisateur = "gg";
$motDepasse = "ppppp";
$basededonner = "boboto";
$connexion = new mysqli($serveur, $utilisateur, $motDepasse, $basededonner);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Obtenir les statistiques
$totalReservations = $connexion->query("SELECT COUNT(*) AS total FROM inscription")->fetch_assoc()['total'];
$maleStudents = $connexion->query("SELECT COUNT(*) AS total FROM inscription WHERE sexstudent = 'masculin'")->fetch_assoc()['total'];
$femaleStudents = $connexion->query("SELECT COUNT(*) AS total FROM inscription WHERE sexstudent = 'feminin'")->fetch_assoc()['total'];

$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord de l'administrateur</title>
    <link rel="stylesheet" href="CSS/dd.css">
</head>

<body>
    <h1>GESTION D'INSCRIPTION</h1>
    <div class="card">
        <h2>Nombre total d'élèves ayant réservé une inscription</h2>
        <p><?php echo $totalReservations; ?></p>
        <a href="#" class="view-students" data-category="total">Voir la liste des élèves</a>
        <div class="student-list hidden" id="totalStudentList"></div>
    </div>

    <div class="card">
        <h2>Nombre d'élèves du sexe masculin</h2>
        <p><?php echo $maleStudents; ?></p>
        <a href="#" class="view-students" data-category="male">Voir la liste des élèves</a>
        <div class="student-list hidden" id="maleStudentList"></div>
    </div>

    <div class="card">
        <h2>Nombre d'élèves du sexe féminin</h2>
        <p><?php echo $femaleStudents; ?></p>
        <a href="#" class="view-students" data-category="female">Voir la liste des élèves</a>
        <div class="student-list hidden" id="femaleStudentList"></div>
    </div>
    </body>
    <script>
        // ecoute tous les lien avec la classe vieuw-student
        document.querySelectorAll('.view-students').forEach(link =>
        {
            link.addEventListener('click', function(event){
                event.preventDefault(); // emepeche le comportement par default du lien
                const category = this.getAttribute('data-category'); // recupere la categorie depuis l'attribut data-category
                const listDiv = document.getElementById(category + 'StudentList'); //selectionne la div correspondant
                //verifie si la liste est cachée ou non
                if(listDiv.classList.contains('hidden')){
                    // effectue une requete fetch vers dd2 la categories comme parametre
                    fetch('dd2.php?category=' + category).then(response => response.json()) // transformr la reponse en JSON
                    .then(data =>{
                        listDiv.innerHTML =''; // vider le contenu
                        if(data.length > 0){ // verifie si il ya des donnees
                            const ul = document.createElement('ul'); // cree une liste non ordonnée
                            data.forEach(student => {
                                const li = document.createElement('li'); // cree un element de liste
                                li.textContent = student; // ajoute le nom de l'eleve a l'element liste
                                ul.appendChild(li); // ajoutr l'element de liste a la liste non ordonnée
                            });
                            listDiv.appendChild(ul);
                        }else{
                            listDiv.textContent = 'aucun eleve trouve';
                        }
                        listDiv.classList.remove('hidden');
                    });
                }else{
                    listDiv.classList.add('hidden');
                }
            });
        });
    </script>
</html>
