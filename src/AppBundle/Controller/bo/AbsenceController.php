<?php

namespace AppBundle\Controller\bo;

use AppBundle\Entity\Absence;
use AppBundle\Entity\Matiere;
use AppBundle\Entity\Note;
use AppBundle\Entity\User;
use AppBundle\Form\AbsenceType;
use AppBundle\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AbsenceController extends Controller
{
    /**
     * @Route("/admin/absence/add", name="admin_add_absence")
     */
    public function admin_add_absenceAction(Request $request)
    {
        $absence=new Absence();
        $form=$this->createForm(AbsenceType::class,$absence);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $absence->setDate(new \DateTime($request->get('appbundle_absence')['date']));
            $this->getDoctrine()->getManager()->persist($absence);
            $this->getDoctrine()->getManager()->flush();
           /* $helperemail=$this->get('app.sendmail');
            $body =  $this->renderView('email/notifNoteClient.html.twig',array('absence'=>$absence));

            $helperemail->sendEmail('itshool-note',$absence->getUsers()->getEmail(),$body);*/

            return $this->redirectToRoute('admin_add_absence');


        }
        // replace this example code with whatever you need
        return $this->render('bo/absence/add.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/admin/absence/edit/{id}", name="admin_edit_absence")
     */
    public function admin_edit_note(Request $request,$id)
    {
        $entity=$this->getDoctrine()->getManager()->getRepository(Absence::class)->find($id);
        $form=$this->createForm(AbsenceType::class,$entity);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $entity->setDate(new \DateTime());
          /*  $helperemail=$this->get('app.sendmail');
            $body =  $this->renderView('email/notifNoteClient.html.twig',array('note'=>$entity));

            $helperemail->sendEmail('itshool-changement note',$entity->getUsers()->getEmail(),$body);*/

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_edit_absence',['id'=>$id]);


        }
        // replace this example code with whatever you need
        return $this->render('bo/absence/edit.html.twig', ['form'=>$form->createView(),'entity'=>$entity]);
    }


    /**
     * @Route("/admin/absence", name="absence_admin")
     */
    public function absence_adminAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST'))
        {
            $absence=$em->getRepository(Absence::class)->search($request);

        }
        else
        {
            $absence=$em->getRepository(Absence::class)->findAll();

        }
        $student=$em->getRepository(User::class)->findAll();
        $matiere=$em->getRepository(Matiere::class)->findAll();
        return $this->render('bo/absence/index.html.twig', ['absence'=>$absence,'student'=>$student,'matiere'=>$matiere]);
    }
}
