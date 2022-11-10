<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017100544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258E48FD905');
        $this->addSql('DROP INDEX UNIQ_96C22258E48FD905 ON teams');
        $this->addSql('ALTER TABLE teams DROP game_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258E48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_96C22258E48FD905 ON teams (game_id)');
    }
}
