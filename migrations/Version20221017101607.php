<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017101607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31D6365F12');
        $this->addSql('DROP INDEX IDX_FF232B31D6365F12 ON games');
        $this->addSql('ALTER TABLE games DROP teams_id');
        $this->addSql('ALTER TABLE teams ADD games_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C2225897FFC673 FOREIGN KEY (games_id) REFERENCES games (id)');
        $this->addSql('CREATE INDEX IDX_96C2225897FFC673 ON teams (games_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE games ADD teams_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31D6365F12 ON games (teams_id)');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C2225897FFC673');
        $this->addSql('DROP INDEX IDX_96C2225897FFC673 ON teams');
        $this->addSql('ALTER TABLE teams DROP games_id');
    }
}
