<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use League\Csv\Reader;
use League\Csv\Writer;

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
        $csvFile = $input->getArgument('csv_file');
        // check if the file exists
        if (!file_exists($csvFile)) {
            $writer = Writer::createFromPath($csvFile, 'w+'); // create the csv file if it doesn't exist
            $writer->insertOne(['Month','Salary-payment-date','Bonus-payment-date']); // insert headers of columns into the CSV file
        }

        // read and process the CSV file
        $reader = Reader::createFromPath($csvFile);
        $records = $reader->getRecords();

        // collect all the items to determine if a specific month is processed or not later
        $allRecords = [];
        foreach ($records as $record) {
            $allRecords = array_merge($allRecords, $record);
        }

        // get the full name of months (e.g., "January", "February", etc.) from current month until end of the year
        $monthNames = [];
        $currentMonth = intval(date('m'));
        $currentYear = date('Y');
        for ($month = $currentMonth; $month <= 12; $month++) {
            $date = new \DateTime($currentYear . '-' . $month . '-01');
            $monthNames[] = $date->format('F');
        }

        $writer = Writer::createFromPath($csvFile, 'a+');
        // iterate all months, and the results will be in order from current month to the last month
        foreach($monthNames as $monthName) {
            if (!in_array($monthName, $allRecords)) {
                $fifthteenDay = new \DateTime('15 ' . $monthName);
                $lastDay = new \DateTime('last day of ' . $monthName);

                // determine bonus day
                // rules: on the 15th of every month bonuses are paid, unless that day is a weekend. In that case, they are paid the first Wednesday after the 15th
                if($fifthteenDay->format('N') <= 5) {
                    $bonusDay = '15';
                } else {
                    for($i = 16; ; $i++) {
                        $day = new \DateTime($i . ' ' . $monthName);
                        if($day->format('N') == 3) {
                            $bonusDay = $i;
                            break;
                        }
                    }
                }

                // determine base salary day
                // rules: base salaries are paid on the last day of the month unless that day is a weekend
                if($lastDay->format('N') <= 5) {
                    $salaryDay = $lastDay->format('j');
                } else {
                    for($i = $lastDay->format('j') - 1; ; $i--) {
                        $day = new \DateTime($i . ' ' . $monthName);
                        if($day->format('N') <= 5) {
                            $salaryDay = $i;
                            break;
                        }
                    }
                }

                $writer->insertOne([$monthName, $salaryDay, $bonusDay]);
            }
        }

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