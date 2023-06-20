<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620091850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE commentaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE commentaire (id INT NOT NULL, annonce_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_67F068BC8805AB2F ON commentaire (annonce_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCFB88E14F ON commentaire (utilisateur_id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE commentaire_id_seq CASCADE');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC8805AB2F');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BCFB88E14F');
        $this->addSql('DROP TABLE commentaire');
    }
}
