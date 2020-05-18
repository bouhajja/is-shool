<?php

namespace AppBundle\Controller\bo;

use AppBundle\Entity\Matiere;
use AppBundle\Form\MatiereType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MatiereControllerController extends Controller
{
    /**
     * @Route("/admin/matiere", name="matiere_admin")
     */
    public function matiere_adminAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $matiere=$em->getRepository(Matiere::class)->findAll();
        return $this->render('bo/matiere/index.html.twig', ['matiere'=>$matiere]);
    }

    /**
     * @Route("/admin/matiere/add", name="add_matiere_admin")
     */
    public function add_matiere_adminAction(Request $request)
    {
        $matiere=new Matiere();
        $form=$this->createForm(MatiereType::class,$matiere);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $this->getDoctrine()->getManager()->persist($matiere);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('add_matiere_admin');


        }
        // replace this example code with whatever you need
        return $this->render('bo/matiere/add.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/admin/matiere/edit/{id}", name="edit_matiere_admin")
     */
    public function edit_matiere_adminAction(Request $request,$id)
    {
        $matiere=$this->getDoctrine()->getManager()->getRepository(Matiere::class)->find($id);
        $form=$this->createForm(MatiereType::class,$matiere);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('edit_matiere_admin',['id'=>$id]);


        }
        // replace this example code with whatever you need
        return $this->render('bo/matiere/edit.html.twig', ['form'=>$form->createView()]);
    }
}
