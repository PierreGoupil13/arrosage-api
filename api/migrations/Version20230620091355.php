<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620091355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_utilisateur (annonce_id INT NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(annonce_id, utilisateur_id))');
        $this->addSql('CREATE INDEX IDX_69B3C5FC8805AB2F ON annonce_utilisateur (annonce_id)');
        $this->addSql('CREATE INDEX IDX_69B3C5FCFB88E14F ON annonce_utilisateur (utilisateur_id)');
        $this->addSql('ALTER TABLE annonce_utilisateur ADD CONSTRAINT FK_69B3C5FC8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE annonce_utilisateur ADD CONSTRAINT FK_69B3C5FCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE annonce_utilisateur DROP CONSTRAINT FK_69B3C5FC8805AB2F');
        $this->addSql('ALTER TABLE annonce_utilisateur DROP CONSTRAINT FK_69B3C5FCFB88E14F');
        $this->addSql('DROP TABLE annonce_utilisateur');
    }
}
