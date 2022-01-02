<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function index(PaginatorInterface $paginator,Request $request): Response 
    {

        $properties  = $paginator->paginate(
            $this->repository->findAllVisibleQuery(),
            $request->query->getInt('page', 1), 
            4 
        );
       

        $em = $this->getDoctrine()->getManager();
        
        
        dump($properties);
    
        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties',
            'properties' => $properties
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