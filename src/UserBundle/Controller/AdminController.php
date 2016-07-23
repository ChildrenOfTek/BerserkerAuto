<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        /**
         * Comme @Template() est vide, il va chercher par défaut le fichier dans UserBundle/views/Admin/index.html.twig
         */
        return array();
    }
}
