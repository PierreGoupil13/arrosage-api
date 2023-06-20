<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620090057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_plante (annonce_id INT NOT NULL, plante_id INT NOT NULL, PRIMARY KEY(annonce_id, plante_id))');
        $this->addSql('CREATE INDEX IDX_31DD6A598805AB2F ON annonce_plante (annonce_id)');
        $this->addSql('CREATE INDEX IDX_31DD6A59177B16E8 ON annonce_plante (plante_id)');
        $this->addSql('ALTER TABLE annonce_plante ADD CONSTRAINT FK_31DD6A598805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE annonce_plante ADD CONSTRAINT FK_31DD6A59177B16E8 FOREIGN KEY (plante_id) REFERENCES plante (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE annonce_plante DROP CONSTRAINT FK_31DD6A598805AB2F');
        $this->addSql('ALTER TABLE annonce_plante DROP CONSTRAINT FK_31DD6A59177B16E8');
        $this->addSql('DROP TABLE annonce_plante');
    }
}
