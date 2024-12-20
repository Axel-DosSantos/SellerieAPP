<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\User;

class AddAdminRoleCommand extends Command
{
    // Définition du nom de la commande
    protected static $defaultName = 'app:add-admin-role'; // NOM DE LA COMMANDE

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        // Description de la commande et ajout de l'argument 'email'
        $this->setDescription('Add an admin role to a user')
             ->addArgument('email', InputArgument::REQUIRED, 'The email address of the user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Récupération de l'email depuis l'argument
        $email = $input->getArgument('email');
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            $output->writeln('User not found');
            return Command::FAILURE;
        }

        // Ajout du rôle admin à l'utilisateur
        $user->setRoles(['ROLE_ADMIN']);
        $this->entityManager->flush();

        $output->writeln('Admin role added to ' . $email);

        return Command::SUCCESS;
    }
}
