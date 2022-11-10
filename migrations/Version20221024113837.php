<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024113837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats_events DROP FOREIGN KEY FK_3B2F8559D6A1065');
        $this->addSql('DROP INDEX IDX_3B2F8559D6A1065 ON etats_events');
        $this->addSql('ALTER TABLE etats_events DROP events_id');
        $this->addSql('ALTER TABLE events ADD etatevents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A2E7FFD95 FOREIGN KEY (etatevents_id) REFERENCES etats_events (id)');
        $this->addSql('CREATE INDEX IDX_5387574A2E7FFD95 ON events (etatevents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats_events ADD events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etats_events ADD CONSTRAINT FK_3B2F8559D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('CREATE INDEX IDX_3B2F8559D6A1065 ON etats_events (events_id)');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A2E7FFD95');
        $this->addSql('DROP INDEX IDX_5387574A2E7FFD95 ON events');
        $this->addSql('ALTER TABLE events DROP etatevents_id');
    }
}
