<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215113411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE centre_analyse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, region VARCHAR(100) NOT NULL, tel VARCHAR(100) NOT NULL, horaire TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_don (id INT AUTO_INCREMENT NOT NULL, groupesanguin VARCHAR(10) NOT NULL, region VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, groupesanguin VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emplacement (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(100) NOT NULL, gouvernorat VARCHAR(100) NOT NULL, delegation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_equipement_med (id INT AUTO_INCREMENT NOT NULL, numero_stock INT NOT NULL, date DATE NOT NULL, stock_desc VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stocksang (id INT AUTO_INCREMENT NOT NULL, numero_stock INT NOT NULL, date DATE NOT NULL, stock_desc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE centre_analyse');
        $this->addSql('DROP TABLE demande_don');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE stock_equipement_med');
        $this->addSql('DROP TABLE stocksang');
    }
}
