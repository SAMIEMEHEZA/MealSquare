<?php

namespace MealSquare\RecetteBundle\Entity\Repository;

/**
 * RecetteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RecetteRepository extends \Doctrine\ORM\EntityRepository {

    public function findAnnonceByParametres($data) {
        $difficultes = array(
            '0' => 'Très facile',
            '1' => 'Facile',
            '2' => 'Moyen',
            '3' => 'Difficile',
            '4' => 'Délicat'
        );


        $specialites = array('0' => 'Saint-Valentin', '1' => 'Enfants et ados', '2' => 'Recettes anglo-saxonne', '3' => 'Française', '4' => 'Chic et facile', '5' => 'Recettes méditerranéennes', '6' => 'Cuisine brésilienne', '7' => 'Spécialités antillaises', '8' => 'Recettes italiennes', '9' => 'Exotique', '10' => 'Suisse', '11' => 'Recettes de Chef', '12' => 'Inde', '13' => 'Pâques', '14' => 'Provence', '15' => 'Cuisine marocaine', '16' => 'Orientale', '17' => 'Repas de fête', '18' => 'Cuisine légère', '19' => 'Cuisine rapide', '20' => 'Mardi Gras', '21' => 'Asie', '22' => 'Nordique', '23' => 'Bretagne', '24' => 'Recettes végétariennes', '25' => 'Recettes japonaises', '26' => 'Sud-ouest', '27' => 'Spécialités ibériques', '28' => 'Normandie', '29' => 'Recettes chinoises', '30' => 'Thanksgiving', '31' => 'Auvergne', '32' => 'Halloween', '33' => 'Recettes américaines', '24' => 'Pentecôte');
     
        $query = $this->createQueryBuilder('a');

        $query->where('a.titre LIKE  :titre ');
        $query->setParameter('titre','%' . $data['titre'] . '%');
       
        if ($data['difficulte'] != null) {
            $difficulte = $difficultes[$data['difficulte']];
            $query->andWhere('a.difficulte = :difficulte');
            $query->setParameter('difficulte',$difficulte);
                
        } 
        
        if ($data['specialite'] != null) {
            $specialite = $difficultes[$data['specialite']];
            $query->andWhere('a.specialite = :specialite');
            $query->setParameter('specialite',$specialite);
        }              
        
        return $query->getQuery()->getResult();
    }

}
