<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021121553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etats_events (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events ADD etatevent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A2603673 FOREIGN KEY (etatevent_id) REFERENCES etats_events (id)');
        $this->addSql('CREATE INDEX IDX_5387574A2603673 ON events (etatevent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A2603673');
        $this->addSql('DROP TABLE etats_events');
        $this->addSql('DROP INDEX IDX_5387574A2603673 ON events');
        $this->addSql('ALTER TABLE events DROP etatevent_id');
    }
}
