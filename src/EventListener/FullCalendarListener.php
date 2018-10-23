<?php 

namespace App\EventListener;

use App\Entity\Disponibilite;
use Doctrine\ORM\EntityManagerInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;


class FullCalendarListener{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    
    


    public function __construct(EntityManagerInterface $em){
        $this->em= $em;
    }

    public function loadEvents(CalendarEvent $calendar){
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();

        $disponibilite = $this->em->getRepository(Disponibilite::class)->createQueryBuilder('d')
        ->andWhere('d.dateDispoStart BETWEEN :startDate and :endDate')
        ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))->setParameter('endDate', $endDate->format('Y-m-d H:i:s')) ->getQuery()->getResult();
        
        foreach($disponibilite as $dispo){
            $dispoEvent = new Event(
                'DISPONIBLE',
                $dispo->getDateDispoStart(),
                $dispo->getDateDispoEnd()
            );
            $calendar->addEvent($dispoEvent);
        }
        
    }    

}

?>