<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211226034727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donor (id INT AUTO_INCREMENT NOT NULL, cin_passport VARCHAR(10) NOT NULL, first_name VARCHAR(10) NOT NULL, last_name VARCHAR(10) NOT NULL, email VARCHAR(15) NOT NULL, country VARCHAR(15) NOT NULL, city VARCHAR(15) NOT NULL, phone VARCHAR(10) NOT NULL, age DATETIME NOT NULL, job VARCHAR(10) NOT NULL, genre VARCHAR(8) NOT NULL, date_post DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE donor');
    }
}
