<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 

class PropertyController extends AbstractController
{


    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this-> repository = $repository;
       
    }





    /**
     *@Route("/biens",name="property.index")
     *@return Response     
     */
    public function index(): Response 
    {

        $em = $this->getDoctrine()->getManager();
        
        $property =   $this->repository->findAllVisible();
    
        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties'
        ]);
    }



     /**
     *@Route("/biens/{title}-{id}",name="property.show")
     *@return Response     
     */
    public function show(Property $property): Response 
    {

        
        
        
    
        return $this->render('property/show.html.twig',[
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }


   

}