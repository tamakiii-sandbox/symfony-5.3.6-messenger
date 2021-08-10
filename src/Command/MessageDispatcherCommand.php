<?php

namespace App\Command;

use App\Messenger\Message\SmsNotification;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:message-dispatcher',
    description: 'Add a short description for your command',
)]
class MessageDispatcherCommand extends Command
{
    public function __construct(
        private MessageBusInterface $bus,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $notification = new SmsNotification('Look! I created a message!');
        $this->bus->dispatch($notification);
        // $this->dispatchMessage(new SmsNotification('Look! I created a message!'));

        $io->success(sprintf('dispatched: %s', $notification->getContent()));

        return Command::SUCCESS;
    }
}
