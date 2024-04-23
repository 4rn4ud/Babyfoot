<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423100556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartenir (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_joueur_id INTEGER NOT NULL, id_equipe_id INTEGER NOT NULL, date_creation DATE NOT NULL, CONSTRAINT FK_A2A0D90C29D76B4B FOREIGN KEY (id_joueur_id) REFERENCES joueur (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A2A0D90CEDB3A7AE FOREIGN KEY (id_equipe_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A2A0D90C29D76B4B ON appartenir (id_joueur_id)');
        $this->addSql('CREATE INDEX IDX_A2A0D90CEDB3A7AE ON appartenir (id_equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE appartenir');
    }
}
