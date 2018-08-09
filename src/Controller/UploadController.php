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
    	try {
		    $files = $request->files->get('file');

		    foreach ($files as $f) {
			    $newName = md5($f->getClientOriginalName()) . uniqid() . time() . '.' . $f->guessExtension();

			    $f->move($this->getParameter('upload_folder'), $newName);
		    }

		    $this->addFlash('success', 'Upload realizado com sucesso!');
		    return $this->redirectToRoute('home_upload');
	    } catch (\Exception $e) {
		    $this->addFlash('error', 'Erro ao realizar upload: ' . $e->getMessage());
		    return $this->redirectToRoute('home_upload');
	    }
    }
}
