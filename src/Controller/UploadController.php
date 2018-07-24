<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UploadController extends Controller
{
    /**
     * @Route("/", name="home_upload")
     */
    public function index()
    {
        return $this->render('upload/index.html.twig');
    }

	/**
	 * @Route("/upload", name="upload", methods="POST")
	 */
    public function upload(Request $request)
    {
    	print '<pre>';
    	var_dump($request->files->all());

    	return new Response('Teste...');
    }
}
