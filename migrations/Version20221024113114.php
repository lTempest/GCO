<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024113114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events ADD etats_events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AF53C907D FOREIGN KEY (etats_events_id) REFERENCES etats_events (id)');
        $this->addSql('CREATE INDEX IDX_5387574AF53C907D ON events (etats_events_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AF53C907D');
        $this->addSql('DROP INDEX IDX_5387574AF53C907D ON events');
        $this->addSql('ALTER TABLE events DROP etats_events_id');
    }
}
