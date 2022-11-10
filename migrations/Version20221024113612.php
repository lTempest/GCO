<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024113612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats_events ADD events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etats_events ADD CONSTRAINT FK_3B2F8559D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('CREATE INDEX IDX_3B2F8559D6A1065 ON etats_events (events_id)');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A2603673');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AF53C907D');
        $this->addSql('DROP INDEX IDX_5387574AF53C907D ON events');
        $this->addSql('DROP INDEX IDX_5387574A2603673 ON events');
        $this->addSql('ALTER TABLE events DROP etatevent_id, DROP etats_events_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats_events DROP FOREIGN KEY FK_3B2F8559D6A1065');
        $this->addSql('DROP INDEX IDX_3B2F8559D6A1065 ON etats_events');
        $this->addSql('ALTER TABLE etats_events DROP events_id');
        $this->addSql('ALTER TABLE events ADD etatevent_id INT DEFAULT NULL, ADD etats_events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A2603673 FOREIGN KEY (etatevent_id) REFERENCES etats_events (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AF53C907D FOREIGN KEY (etats_events_id) REFERENCES etats_events (id)');
        $this->addSql('CREATE INDEX IDX_5387574AF53C907D ON events (etats_events_id)');
        $this->addSql('CREATE INDEX IDX_5387574A2603673 ON events (etatevent_id)');
    }
}
