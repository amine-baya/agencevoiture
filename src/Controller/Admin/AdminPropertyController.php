<?php
namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Entity\Option;


use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route; 

class AdminPropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }







    /**
     * @Route("/admin", name="admin.property.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $properties = $this->repository->findAll();
        return $this-> render('admin/property/index.html.twig', compact('properties'));
    }

    /**
     * @Route("/admin/property/create", name="admin.property.new")
     * @param Request $request
     * 
     */

     public function new( Request $request )
     {
         $property = new Property();
         $form =  $this->createForm(PropertyType::class, $property);
         $form->handleRequest($request);
 
         $em = $this->getDoctrine()->getManager();
 
         if ($form-> isSubmitted() && $form->isValid()){
             $em->persist($property);
             $em->flush();
            $this->addFlash('success', 'Bien crée avec succés');

             return $this->redirectToRoute('admin.property.index');
 
         }

         return $this-> render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form-> createView()
        ]);

     }



    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods="GET|POST")
     * @param Property $property
     * @param Request $request
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function edit(Property $property, Request $request )
    {
        $form =  $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form-> isSubmitted() && $form->isValid()){
            $em->flush();
            $this->addFlash('success', 'Bien modifié avec succés');
            return $this->redirectToRoute('admin.property.index');

        }

        return $this-> render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form-> createView()
        ]);
    }



     /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods="DELETE")
     * @param Property $property
     * @param Request $request
  
     */

    public function delete(Property $property, Request $request )
    {
       

        $em = $this->getDoctrine()->getManager();

        if($this->isCsrfTokenValid('delete' . $property->getId(), $request->get('_token'))){

            
            $em->remove($property);
            $em->flush();
            $this->addFlash('success', 'supprimé avec succés');

           
        }

            return $this->redirectToRoute('admin.property.index');

        }


}