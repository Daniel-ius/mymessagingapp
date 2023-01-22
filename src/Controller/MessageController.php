<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MessageType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\SerializerInterface;


class MessageController extends AbstractController
{
    #[Route('/', name: 'messages_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('messages/index.html.twig');
    }

    #[Route('/show_message', name: 'messages_list', methods: ['GET'])]
    public function list(SerializerInterface $serializer,MessageRepository $messageRepository): JsonResponse
    {
        $messages = $messageRepository->findBy([], ['timestamp' => 'ASC']);
        $data = $serializer->serialize($messages, 'json');

        return new JsonResponse($data, 200, [], true);

    }

    #[Route('/create_message', name: 'messages_create', methods: ['POST'])]
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        $message = new Message();
        $message->setUsername($data['username']);
        $message->setMessage($data['message']);
        $message->setTimestamp(new DateTime());
        $entityManager->persist($message);
        $entityManager->flush();

        $data = $serializer->serialize($message, 'json');

        return new JsonResponse($data, 201, [], true);

    }
}

