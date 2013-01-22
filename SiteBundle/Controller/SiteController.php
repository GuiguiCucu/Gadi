<?php
 
// src/Gadi/SiteBundle/Controller/SiteController.php
// src/Gadi/SiteBundle/Entity/Enseignant.php
 
namespace Gadi\SiteBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gadi\SiteBundle\Entity\Enseignant;
use Gadi\SiteBundle\Entity\TypeEnseignant;
use Gadi\SiteBundle\Entity\Etudiant;
use Gadi\SiteBundle\Entity\Groupe;
use Gadi\SiteBundle\Entity\QuotaGroupe;
use Gadi\SiteBundle\Entity\Semestre;
use Gadi\SiteBundle\Entity\Semaine;
 
class SiteController extends Controller
{
  public function indexAction()
  {
    return $this->render('GadiSiteBundle:Site:index.html.twig', array(
	'articles' => array()
	));
  }
     
  public function menuAction($nombre) // Ici, nouvel argument $nombre, on a transmis via le with depuis la vue
  {
    // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
    // On pourra récupérer $nombre articles depuis la BDD, avec $nombre un paramètre qu'on peut changer lorsqu'on appelle cette action
    $liste = array(
      array('id' => 2, 'titre' => 'Mon dernier weekend !'),
      array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
      array('id' => 9, 'titre' => 'Petit test')
    );
     
    return $this->render('GadiSiteBundle:Site:menu.html.twig', array(
      'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
    ));
   }
  
  public function voirAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /site/article/5
         
    // Ici, on récupèrera depuis la base de données l'article correspondant à l'id $id
    // Puis on passera l'article à la vue pour qu'elle puisse l'afficher
 
    // On récupère la requête
    $request = $this->get('request');
 
    // On récupère notre paramètre tag
    $tag = $request->query->get('tag');
 
    return new Response("Affichage de l'article d'id : ".$id.", avec le tag : ".$tag);
  }
  
   // On récupère tous les paramètres en argument de la méthode
  public function voirSlugAction($slug, $annee, $format)
  {
    // Ici le contenu de la méthode
    return new Response("On pourrait afficher l'article correspondant au slug '".$slug."', créé en ".$annee." et au format ".$format.".");
  }
  
  public function ajouterAction($type)
  {
	if($type=="enseignant") {
		  // On crée un objet Enseignant
		  $enseignant = new Enseignant();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($enseignant);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('nomEn',    'text')
			->add('prenomEn', 'text')
			->add('typeEnseignant', 'choice', array("choices" => $this->getTypeEnseignants()));
		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  // (Nous verrons la validation des objets en détail plus bas dans ce chapitre)
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($enseignant);
				$em->flush();
				echo "<script>alert(\"L'enseignant est ajouté\")</script>"; 
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterEnseignant.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="etudiant") {
		  // On crée un objet Etudiant
		  $etudiant = new Etudiant();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($etudiant);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('nom',    'text')
			->add('prenom', 'text');
		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  // (Nous verrons la validation des objets en détail plus bas dans ce chapitre)
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($etudiant);
				$em->flush();
				echo "<script>alert(\"L'étudiant est ajouté\")</script>"; 
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterEtudiant.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="typeEn") {
		  // On crée un objet Etudiant
		  $typeEn = new TypeEnseignant();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($typeEn);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('intitule',    'text')
			->add('heureMaxSem', 'integer')
			->add('heureMaxAnn', 'integer');
		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  // (Nous verrons la validation des objets en détail plus bas dans ce chapitre)
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($typeEn);
				$em->flush();
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterTypeEnseignant.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	
	else if ($type=="groupe") {
		  // On crée un objet groupe
		  $groupe = new Groupe();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($groupe);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('NomG',    'text');

		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  // (Nous verrons la validation des objets en détail plus bas dans ce chapitre)
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($groupe);
				$em->flush();
				echo "<script>alert(\"Le groupe est ajouté\")</script>"; 
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterGroupe.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	
	
	else if ($type=="typeEn") {
		  // On crée un objet Etudiant
		  $typeEn = new TypeEnseignant();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($typeEn);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('NomG',    'text');
		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  // (Nous verrons la validation des objets en détail plus bas dans ce chapitre)
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($typeEn);
				$em->flush();
		 
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterGroupe.html.twig', array(
			'form' => $form->createView(),
		  ));
	}

	else if ($type=="quotagroupe") {
		  // On crée un objet quotagroupe
		  $quotagroupe = new QuotaGroupe();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($quotagroupe);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('heureSemaine',    'integer');
		  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
		 
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes			 
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($quotagroupe);
				$em->flush();
		 
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterQuotaGroupe.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="semestre") {
		  // On crée un objet semestre
		  $semestre = new Semestre();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($semestre);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder		  
			->add('libelle',        'text')
			->add('dateDebut', 'date')
			->add('dateFin',     'date');
		  // À partir du formBuilder, on génère le formulaire
		  $form = $formBuilder->getForm();
		  
		      // On récupère la requête
			$request = $this->get('request');
		 
			// On vérifie qu'elle est de type POST
			if ($request->getMethod() == 'POST') {
			  // On fait le lien Requête <-> Formulaire
			  $form->bind($request);
		 
			  // On vérifie que les valeurs rentrées sont correctes
			  if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine()->getManager();
				$em->persist($semestre);
				//$em->flush();
				$nbsemaine = $semestre->nombreSemaines();
				$date = $semestre->getDateDebut();
				$date2 = $date;
				echo "<script>alert($nbsemaine)</script>";
				/*
				for ($i = 1; $i <= $nbsemaine; $i++) {
					$date2->add(new \DateInterval('P6D'));
					$semaine = new Semaine($i, $date,  $date2, $semestre);
					$sm = $this->getDoctrine()->getManager();
					$sm->persist($semaine);
					$sm->flush();
					$date2->add(new \DateInterval('P1D'));
					$date->add(new \DateInterval('P7D'));
				}
				echo "<script>alert(\"Le semestre a été ajouté avec ses semaines\")</script>";*/
				}
			}
		  return $this->render('GadiSiteBundle:Site:ajouterSemestre.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
  }
  // permet de retourner dans un tableau tous les intitulés des types enseignants, utilisée dans ajouterEnseignant
  public function getTypeEnseignants()
    {
		$array_return = array();
        $array_typeEnseignants = $this->getDoctrine()->getRepository('GadiSiteBundle:TypeEnseignant')->findAll();
		foreach ($array_typeEnseignants as $typeEnseignant) {
			$array_return[$typeEnseignant->getId()] = $typeEnseignant->getIntitule();
		}
		return $array_return;
  }
}