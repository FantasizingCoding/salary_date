<a name="readme-top"></a>
<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Command for Salary Date</h3>
  <p align="center">
    Determine the date of base salary and monthly bonus
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

This is the assessment for the interview. It's required to create a small command-line utility to help a fictional company determine the dates they need to pay salaries to their sales department.

### Built With

The command-line utility is built with Symfony framework, with the test framework being PHPUnit.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

Use the stable version Symfony 7 as the environment.

### Installation

1. Install Symfony, composer and PHP 8 [https://symfony.com/doc/current/setup.html](https://symfony.com/doc/current/setup.html)
2. Clone the repo or open with Github Desktop
3. At the root directory, install the required League CSV library:
   ```sh
   composer install
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage
1. Run the command:
   ```sh
   php bin/console salary-date salary-date.csv
   ```
   <img width="475" alt="result-1" src="https://github.com/FantasizingCoding/salary_date/assets/61125278/f7499ef6-c2cc-4d03-82f9-41b59b43af7c">

2. Run the test:
   ```sh
   php bin/phpunit
   ```
   <img width="727" alt="result-2" src="https://github.com/FantasizingCoding/salary_date/assets/61125278/dc971d58-0953-4d4e-b3b0-462585f316b7">

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Documentation
I have a own domain which is not being used, so here I'll deploy Symfony 7 on it and create web content in the "Symfony" way.
The url "https://housesexpats.nl/doc" is set up to show the introduction of the "salary-date" command, where I'll employ twig template, symfony controllers, etc to practice the symfony knowledge.
