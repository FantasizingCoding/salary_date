<?php

namespace App\Tests\Command;

use App\Command\SalaryDateCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class SalaryDateCommandTest extends KernelTestCase
{
    public function testExecute(): void
    {
        self::bootKernel();

        $application = new Application();
        $application->add(new SalaryDateCommand());

        $command = $application->find('salary-date');
        $commandTester = new CommandTester($command);

        // Set the test CSV file path
        $testCsvFile = 'tests/test.csv';

        // Execute the command with the test CSV file path
        $commandTester->execute([
            'csv_file' => $testCsvFile,
        ]);

        // Get the content of the test CSV file
        $csvContent = file_get_contents($testCsvFile);

        // Assert that December's salary and bonus dates are correct in the CSV content
        $this->assertStringContainsString('December,31,18', $csvContent);
    }
}