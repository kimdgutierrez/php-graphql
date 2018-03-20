<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
// use PandoraBundle\Resolver\WalletDepositResolver;
// use PandoraBundle\Service\SystemVariableService;

class DepositNewCronCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('cronjob:deposit-new-extract-from-pandora-db')
        ->setHelp('Extract new deposits from Pandora.')
        ->setDescription('New Deposits will be extracted from Pandora and saved to localdatase and to be disseminated to subcribed users.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Starting Deposit Extract...',
            '===========================',
        ]);
        
//         $systemVariable = $this->getContainer()->get(SystemVariableService::class);
//         $depositResolver = $this->getContainer()->get(WalletDepositResolver::class);
//         $lastDepositId = $systemVariable->get('DEPOSIT_NOTIF_LAST_ID', 0);
        
//         // INITIALIZATION OF VARIABLE
//         if(!$lastDepositId){
//             $lastDepositId = $depositResolver->getDepositLastId();
//             $systemVariable->set('DEPOSIT_NOTIF_LAST_ID', $lastDepositId);
//         }
//         $newDeposit = $depositResolver->getNewlyDeposits($lastDepositId);
        
//         // UPDATE LAST FETCHED DEPOSIT ID
//         if(count($newDeposit) > 0){
//             $systemVariable->set('DEPOSIT_NOTIF_LAST_ID', $newDeposit[count($newDeposit)-1]['Id']);
//         }
        
//         $output->writeln([count($newDeposit)]);
        
//         if(count($newDeposit) > 0){
//             $entryData = [
//                 'cat'     => 'new_deposits',
//                 'data'   => $newDeposit,
//             ];
            
//             $context = new \ZMQContext();
//             $container = $this->getContainer();
//             $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'notification_pusher'); // changed from 'my pusher'
//             $socket->connect('tcp://'.$container->getParameter('tcp_host').':'.$container->getParameter('tcp_port'));
//             $socket->send(json_encode($entryData));
//         }
    }
}