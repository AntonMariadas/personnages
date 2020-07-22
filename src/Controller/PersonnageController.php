<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig', [
        ]);
    }


    /** 
     * @Route("/persos", name="persos")
     */
    public function persos()
    {
        Personnage::creerPersonnages();
        return $this->render('personnage/persos.html.twig', [
            'players' => Personnage::$personnages
        ]);
    }

    /** 
     * @Route("/persos/{nom}", name="afficher_personnage")
     */
    public function afficherPersonnage($nom)
    {
        Personnage::creerPersonnages();
        $perso = Personnage::getpersonnageParNom($nom);

        return $this->render('personnage/perso.html.twig', [
            'perso' => $perso
        ]);
    }

    /**
     * @Route("/armes", name="armes")
     */
    public function armes() {

        $arme1 = [
            'nom' => 'épée',
            'description' => 'Une superbe épée tranchante',
            'degat' => 10
        ];

        $arme2 = [
            'nom' => 'hache',
            'description' => 'Une superbe hache puissante',
            'degat' => 30
        ];

        $arme3 = [
            'nom' => 'arc',
            'description' => 'Une superbe arc précise',
            'degat' => 10
        ];

        $armes = [
            'arme1' => $arme1,
            'arme2' => $arme2,
            'arme3' => $arme3
        ];

        return $this->render('personnage/armes.html.twig', [
            'armes' => $armes
        ]);
    }

    /**
     * @Route("/armes/{nom}", name="arme")
     */
    public function arme($nom) {

        $arme1 = [
            'nom' => 'épée',
            'description' => 'Une superbe épée tranchante',
            'degat' => 10
        ];

        $arme2 = [
            'nom' => 'hache',
            'description' => 'Une superbe hache puissante',
            'degat' => 30
        ];

        $arme3 = [
            'nom' => 'arc',
            'description' => 'Une superbe arc précise',
            'degat' => 10
        ];

        $armes = [
            'arme1' => $arme1,
            'arme2' => $arme2,
            'arme3' => $arme3
        ];

        // Boucle foreach, permet de récupérer la clé ou la valeur 
        // foreach($tableau as $value)
        // foreach($tableau as $key => $value)
        
        foreach ($armes as $arme) {
            foreach ($arme as  $value) {
                if ($value == $nom) {
                    $armeChoisie = $arme;
                }
            }
        }


        return $this->render('personnage/arme.html.twig', [
            'arme' => $armeChoisie
        ]);
    }




}