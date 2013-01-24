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
use Gadi\SiteBundle\Entity\QuotaEnseignant;
use Gadi\SiteBundle\Entity\Cours;
use Gadi\SiteBundle\Entity\Module;
use JMS\SecurityExtraBundle\Annotation\Secure;
 
class SiteController extends Controller
{
  public function indexAction()
  {
    return $this->render('GadiSiteBundle:Site:index.html.twig');
  }
     
  public function menuAction()
  {
     
    return $this->render('GadiSiteBundle:Site:menu.html.twig');
   }
  
  public function voirCoursAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /site/cours/5
         
    // Ici, on récupèrera depuis la base de données l'cours correspondant à l'id $id
	
	$cours = $this->getDoctrine()->getRepository('GadiSiteBundle:Cours')->find($id);
 
    return $this->render('GadiSiteBundle:Site:voirCour.html.twig', array('cours' => $cours));
  }
  
  public function voirEnseignantAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /site/cours/5
         
    // Ici, on récupèrera depuis la base de données l'cours correspondant à l'id $id
	
	$enseignant = $this->getDoctrine()->getRepository('GadiSiteBundle:Enseignant')->find($id);
 
    return $this->render('GadiSiteBundle:Site:voirEnseignant.html.twig', array('enseignant' => $enseignant));
  }
  
  public function voirModuleAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /site/cours/5
         
    // Ici, on récupèrera depuis la base de données l'cours correspondant à l'id $id
	
	$module = $this->getDoctrine()->getRepository('GadiSiteBundle:Module')->find($id);
 
    return $this->render('GadiSiteBundle:Site:voirModule.html.twig', array('module' => $module));
  }
  
 
 
 
	  public function voirQuotaGroupeAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /site/cours/5
         
    // Ici, on récupèrera depuis la base de données l'cours correspondant à l'id $id
	
	$quotagroupe = $this->getDoctrine()->getRepository('GadiSiteBundle:QuotaGroupe')->find($id);
 
    return $this->render('GadiSiteBundle:Site:voirQuotaGroupe.html.twig', array('quotagroupe' => $quotagroupe));
  }

    public function voirAction($type)
  {
	if($type=="cours") {
		$array_url=array();
		$array_cours = $this->getDoctrine()->getRepository('GadiSiteBundle:Cours')->findAll();
		foreach ($array_cours as $cours) {
		
			$array_url[$cours->getId()] = $this->generateUrl('gadisite_voir_cours', array('id' => $cours->getId() ));
		}
		return $this->render('GadiSiteBundle:Site:consultCours.html.twig', array('Array_url'=>$array_url));
		
		
	}
	  elseif($type=="quotagroupe") {
		  $array_url=array();
		$array_quota_groupe = $this->getDoctrine()->getRepository('GadiSiteBundle:QuotaGroupe')->findAll();
		foreach ($array_quota_groupe as $quotagroupe) {
		
			$array_url[$quotagroupe->getId()] = $this->generateUrl('gadisite_voir_quota_groupe', array('id' => $quotagroupe->getId() ));
		}
		return $this->render('GadiSiteBundle:Site:consultQuotaGroupe.html.twig', array('Array_url'=>$array_url));
		
	}
  }
  
  /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
    */
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
			->add('typeEnseignant', 'entity', array('class' => 'GadiSiteBundle:TypeEnseignant', 'property' => 'intitule'));
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
			->add('prenom', 'text')
			->add('groupe', 'entity', array('class' => 'GadiSiteBundle:Groupe', 'property' => 'nomg'));
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
				echo "<script>alert(\"Le type d'enseignant est ajouté\")</script>"; 
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
			->add('nomG',    'text')
			->add('semestre', 'entity', array('class' => 'GadiSiteBundle:Semestre', 'property' => 'libelle'));
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
	else if ($type=="quotagroupe") {
		  // On crée un objet quotagroupe
		  $quotagroupe = new QuotaGroupe();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($quotagroupe);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('heuresemaine',    'integer')
			->add('groupe', 'entity', array('class' => 'GadiSiteBundle:Groupe', 'property' => 'nomg'))
			->add('semaine', 'entity', array('class' => 'GadiSiteBundle:Semaine', 'property' => 'numero'));
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
				echo "<script>alert(\"Le quota du groupe est ajouté\")</script>";
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
			->add('dateDebut', 'date' , array('format' =>' dd-MM-yyyy',))
			->add('dateFin',     'date' , array('format' =>' dd-MM-yyyy',));
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
				$em->flush();
				$nbsemaine = $semestre->nombreSemaines();
				$date = $semestre->getDateDebut();
				$date2 = $date;
				
				for ($i = 1; $i <=$nbsemaine+1; $i++) {	
					$semaine = new Semaine($semestre, $i, $date,  $date2);
					$semaine->setDateFin($date);
					$sm = $this->getDoctrine()->getManager();
					$sm->persist($semaine);
					$sm->flush();
					$date->modify('+7 day');
				}
				echo "<script>alert(\"Le semestre a été ajouté avec ses semaines\")</script>";
				}
			}
		  return $this->render('GadiSiteBundle:Site:ajouterSemestre.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="quotaenseignant") {
		  // On crée un objet quotagroupe
		  $quotaenseignant = new QuotaEnseignant();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($quotaenseignant);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('heureSemaine',    'integer')
			->add('enseignant', 'entity', array('class' => 'GadiSiteBundle:Enseignant', 'property' => 'nomen'))
			->add('semaine', 'entity', array('class' => 'GadiSiteBundle:Semaine', 'property' => 'numero'));	
			;
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
				$em->persist($quotaenseignant);
				$em->flush();
				echo "<script>alert(\"Le quota enseignant a été ajouté\")</script>";
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterQuotaEnseignant.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="cours") {
		  // On crée un objet quotagroupe
		  $cours = new Cours();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($cours);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('type',    'text')
			->add('typesalle', 'text')
			->add('duree', 'integer')
			->add('date', 'date', array('format' => 'dd-MM-yyyy'))
			->add('enseignant', 'entity', array('class' => 'GadiSiteBundle:Enseignant', 'property' => 'nomen'))
			->add('module', 'entity', array('class' => 'GadiSiteBundle:Module', 'property' => 'libelle'))	
			;
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
				$em->persist($cours);
				$em->flush();
				echo "<script>alert(\"Le cours a été ajouté\")</script>";
				// On redirige vers la page de visualisation de l'article nouvellement créé
				return $this->redirect($this->generateUrl('gadisite_voir_cours', array('id' => $cours->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterCours.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
	else if ($type=="module") {
		  // On crée un objet quotagroupe
		  $module = new Module();
		 
		  // On crée le FormBuilder grâce à la méthode du contrôleur
		  $formBuilder = $this->createFormBuilder($module);
		 
		  // On ajoute les champs de l'entité que l'on veut à notre formulaire
		  $formBuilder
			->add('ue',    'text')
			->add('libelle', 'text')
			->add('heurecm', 'integer')
			->add('typesallecm', 'text')
			->add('nbgroupes', 'integer')
			->add('heuretd', 'integer')
			->add('typesalletd', 'text')
			->add('nbgroupestd', 'integer')
			->add('heuretp', 'integer')
			->add('typesalletp', 'text')
			->add('nbgroupestp', 'integer')
			->add('coefglobal', 'integer')
			->add('enseignant', 'entity', array('class' => 'GadiSiteBundle:Enseignant', 'property' => 'nomen'))
			->add('semestre', 'entity', array('class' => 'GadiSiteBundle:Semestre', 'property' => 'libelle'))	
			;
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
				$em->persist($module);
				$em->flush();
				echo "<script>alert(\"Le module a été ajouté\")</script>";
				// On redirige vers la page de visualisation de l'article nouvellement créé
				//return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
			  }
			}
		 
		  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		  return $this->render('GadiSiteBundle:Site:ajouterModule.html.twig', array(
			'form' => $form->createView(),
		  ));
	}
  }
}