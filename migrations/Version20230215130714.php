<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215130714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur ADD participant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D7739D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id)');
        $this->addSql('CREATE INDEX IDX_4493D7739D1C3019 ON donneur (participant_id)');
        $this->addSql('ALTER TABLE infermier ADD participant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infermier ADD CONSTRAINT FK_C82E95C29D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id)');
        $this->addSql('CREATE INDEX IDX_C82E95C29D1C3019 ON infermier (participant_id)');
        $this->addSql('ALTER TABLE responsable ADD participant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D079D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id)');
        $this->addSql('CREATE INDEX IDX_52520D079D1C3019 ON responsable (participant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D7739D1C3019');
        $this->addSql('DROP INDEX IDX_4493D7739D1C3019 ON donneur');
        $this->addSql('ALTER TABLE donneur DROP participant_id');
        $this->addSql('ALTER TABLE infermier DROP FOREIGN KEY FK_C82E95C29D1C3019');
        $this->addSql('DROP INDEX IDX_C82E95C29D1C3019 ON infermier');
        $this->addSql('ALTER TABLE infermier DROP participant_id');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D079D1C3019');
        $this->addSql('DROP INDEX IDX_52520D079D1C3019 ON responsable');
        $this->addSql('ALTER TABLE responsable DROP participant_id');
    }
}
