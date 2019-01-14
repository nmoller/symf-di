<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 14/01/19
 * Time: 9:27 AM
 */

namespace Uqam\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Uqam\Moodle\DB\Mdl;


class InscriptionCommand extends Command
{
    private $mdl;

    protected function configure()
    {
        $this->setName('uqam:inscriptions')
             ->setDescription('Verifier le status des inscriptions');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mdl = $this->mdl;
        $mysqli = $mdl->connect();
        $stmt = $mysqli->prepare('select * from employee where id = ?');
        $id = 3;
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($emp = $result->fetch_object()) {
            $output->writeln("$emp->first_name $emp->last_name");
        }
        $stmt->close();
    }

    /**
     * TODO ce serait mieux une interface....
     * Apellé par le di-container
     * @param Mdl $
     */
    public function setDB(Mdl $mdl) {
        $this->mdl = $mdl;

    }
}