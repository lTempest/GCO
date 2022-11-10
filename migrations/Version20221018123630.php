<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018123630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events_teams DROP FOREIGN KEY FK_267EEA7E296CD8AE');
        $this->addSql('ALTER TABLE events_teams DROP FOREIGN KEY FK_267EEA7E71F7E88B');
        $this->addSql('DROP TABLE events_teams');
        $this->addSql('ALTER TABLE players ADD photograph VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE events_teams (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, team_id INT NOT NULL, place INT NOT NULL, INDEX IDX_267EEA7E296CD8AE (team_id), INDEX IDX_267EEA7E71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE events_teams ADD CONSTRAINT FK_267EEA7E296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE events_teams ADD CONSTRAINT FK_267EEA7E71F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE players DROP photograph');
    }
}
