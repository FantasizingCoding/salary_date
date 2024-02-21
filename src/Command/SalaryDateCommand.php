<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Command to determine the payment date of base salary and monthly bonus.
 * 
 * Expections of the command:
 * Sales staff get a regular monthly fixed base salary and a monthly bonus.
 * The base salaries are paid on the last day of the month unless that day is a Saturday
 * or a Sunday (weekend).
 * On the 15th of every month bonuses are paid for the previous month, unless that day
 * is a weekend. In that case, they are paid the first Wednesday after the 15th.
 */
#[AsCommand(
    name: 'salary-date',
    description: 'Determine the payment date of base salary and monthly bonus',
    hidden: false
)]
class SalaryDateCommand extends Command
{
    /**
     * Executes the current command.
     * 
     * This method is where the logic for determining the salary dates is implemented.
     *
     * @param InputInterface $input An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     * 
     * @return int Command exit code (0 for success, 1 for error)
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // will write logic here......

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;
    }

    /**
     * Configures the current command.
     */
    protected function configure(): void
    {
        $this
            // the command help shown when running the command with the "--help" option
            ->setHelp('This command allows you to process the salary payment dates.')
            // the csv file path will be the only argument
            ->addArgument('csv_file', InputArgument::REQUIRED, 'Path to the CSV file')
        ;
    }
}