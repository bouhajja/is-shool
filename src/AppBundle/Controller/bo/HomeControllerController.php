<?php

namespace AppBundle\Controller\bo;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeControllerController extends Controller
{

    /**
     * @Route("/admin/", name="home_admin")
     */
    public function home_adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('bo/index.html.twig', []);
    }
}
