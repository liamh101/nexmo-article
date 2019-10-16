<?php

namespace App\Controller;

use App\Service\NexmoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /** @var NexmoService */
    private $nexmoService;

    public function __construct(NexmoService $nexmoService)
    {
        $this->nexmoService = $nexmoService;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('form.html.twig');
    }

    /**
     * @Route("/call", name="call")
     */
    public function call(Request $request): Response
    {
        $message = $request->request->get('message');
        $number = $request->request->get('number');

        $this->nexmoService->makeCall($message, $number);
        return $this->render('success.html.twig');
    }

    /**
     * @Route("/recieve", name="recieve")
     */
    public function recieve(Request $request): Response
    {
        $data = $request->getContent();

        if (isset($data['status']) && $data['status'] === 'failed') {
            $this->nexmoService->sendSMS('Phone System is down!!!');
        }

        return  $this->json(json_encode('Success'));
    }
}
