<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423102148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_rouge_id INTEGER NOT NULL, id_bleu_id INTEGER NOT NULL, id_gagnant_id INTEGER DEFAULT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME DEFAULT NULL, CONSTRAINT FK_59B1F3D4377B521 FOREIGN KEY (id_rouge_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_59B1F3DB4DD5052 FOREIGN KEY (id_bleu_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_59B1F3DA773C26F FOREIGN KEY (id_gagnant_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_59B1F3D4377B521 ON partie (id_rouge_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_59B1F3DB4DD5052 ON partie (id_bleu_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_59B1F3DA773C26F ON partie (id_gagnant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE partie');
    }
}
