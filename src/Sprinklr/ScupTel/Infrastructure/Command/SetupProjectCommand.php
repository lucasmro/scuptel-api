<?php

namespace Sprinklr\ScupTel\Infrastructure\Command;

use Knp\Command\Command;
use Sprinklr\ScupTel\Domain\Exception\IOException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetupProjectCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('project:setup')
            ->setDescription('Creates the project data directories.')
            ->addArgument('owner', InputArgument::REQUIRED, 'Owner')
            ->setHelp(<<<EOF
The <info>%command.name%</info> creates the project data directories.

<info>Usage:</info>
<info>php %command.full_name% [owner]</info>

<info>Example:</info>
<info>php %command.full_name% www-data</info>

EOF
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $destination = $this->getProjectDirectory() . '/app';
        $owner = $input->getArgument('owner');

        if (!is_writable($destination)) {
            throw new IOException(sprintf('The destination path "%s" is not writable', $destination));
        }

        $directories = array(
            'cache',
            'logs'
        );

        $output->writeLn('<comment>Creating project data directories.</comment>');
        foreach ($directories as $dir) {
            $directory = $destination.'/'.$dir;

            if (file_exists($directory)) {
                $output->writeLn('<info>The directory "' . $directory . '" already exists</info>');
                continue;
            }

            $umaskBackup = umask(0);
            mkdir($directory, 0775, true);
            chown($directory, $owner);
            umask($umaskBackup);

            $output->writeLn('<info>Created directory "' . $directory . '"</info>');
        }
    }
}
