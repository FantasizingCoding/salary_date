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
   or install it directly:
   ```sh
   composer require league/csv:^9.0
   ```


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage
1. Run the command:
   ```sh
   php bin/console salary-date salary-date.csv
   ```
2. Run the test:
   ```sh
   php bin/phpunit
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>
