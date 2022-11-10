<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221006193759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, event_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, img_art VARCHAR(255) DEFAULT NULL, INDEX IDX_BFDD3168A76ED395 (user_id), INDEX IDX_BFDD316871F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, game_id INT NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, tournament TINYINT(1) NOT NULL, INDEX IDX_5387574AA76ED395 (user_id), INDEX IDX_5387574AE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events_teams (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, team_id INT NOT NULL, place INT NOT NULL, INDEX IDX_267EEA7E71F7E88B (event_id), INDEX IDX_267EEA7E296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, name_game VARCHAR(255) NOT NULL, img_game VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE players (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, nickname VARCHAR(255) NOT NULL, age INT NOT NULL, nationality VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, INDEX IDX_264E43A6296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name_team VARCHAR(255) NOT NULL, logo_team VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316871F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE events_teams ADD CONSTRAINT FK_267EEA7E71F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE events_teams ADD CONSTRAINT FK_267EEA7E296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE players ADD CONSTRAINT FK_264E43A6296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A76ED395');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316871F7E88B');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AA76ED395');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AE48FD905');
        $this->addSql('ALTER TABLE events_teams DROP FOREIGN KEY FK_267EEA7E71F7E88B');
        $this->addSql('ALTER TABLE events_teams DROP FOREIGN KEY FK_267EEA7E296CD8AE');
        $this->addSql('ALTER TABLE players DROP FOREIGN KEY FK_264E43A6296CD8AE');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE events_teams');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE players');
        $this->addSql('DROP TABLE teams');
    }
}
