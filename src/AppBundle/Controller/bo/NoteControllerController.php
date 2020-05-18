<?php

namespace AppBundle\Controller\bo;

use AppBundle\Entity\Matiere;
use AppBundle\Entity\Note;
use AppBundle\Entity\User;
use AppBundle\Form\NoteType;
use AppBundle\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class NoteControllerController extends Controller
{

    /**
     * @Route("/admin/note/add", name="admin_add_note")
     */
    public function admin_add_noteAction(Request $request)
    {
        $note=new Note();
        $form=$this->createForm(NoteType::class,$note);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $note->setMoyen(($request->get('appbundle_note')['noteDs']*0.4)+($request->get('appbundle_note')['noteExamen']*0.6));
            $this->getDoctrine()->getManager()->persist($note);
            $this->getDoctrine()->getManager()->flush();
            $helperemail=$this->get('app.sendmail');
            $body =  $this->renderView('email/notifNoteClient.html.twig',array('note'=>$note));

            $helperemail->sendEmail('itshool-note',$note->getUsers()->getEmail(),$body);

            return $this->redirectToRoute('admin_add_note');


        }
        // replace this example code with whatever you need
        return $this->render('bo/note/add.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/admin/note/edit/{id}", name="admin_edit_note")
     */
    public function admin_edit_note(Request $request,$id)
    {
        $entity=$this->getDoctrine()->getManager()->getRepository(Note::class)->find($id);
        $form=$this->createForm(NoteType::class,$entity);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $entity->setCreatedAt(new \DateTime());
            $entity->setMoyen(($request->get('appbundle_note')['noteDs']*0.4)+($request->get('appbundle_note')['noteExamen']*0.6));
            $helperemail=$this->get('app.sendmail');
            $body =  $this->renderView('email/notifNoteClient.html.twig',array('note'=>$entity));

            $helperemail->sendEmail('itshool-changement note',$entity->getUsers()->getEmail(),$body);

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_edit_note',['id'=>$id]);


        }
        // replace this example code with whatever you need
        return $this->render('bo/note/edit.html.twig', ['form'=>$form->createView()]);
    }


    /**
     * @Route("/admin/note", name="note_admin")
     */
    public function note_adminAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST'))
        {
            $note=$em->getRepository(Note::class)->search($request);

        }
        else
        {
            $note=$em->getRepository(Note::class)->findAll();

        }
        $student=$em->getRepository(User::class)->findAll();
        $matiere=$em->getRepository(Matiere::class)->findAll();
        return $this->render('bo/note/index.html.twig', ['note'=>$note,'student'=>$student,'matiere'=>$matiere]);
    }
}
