<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013123702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316871F7E88B');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A76ED395');
        $this->addSql('DROP TABLE articles');
        $this->addSql('ALTER TABLE events ADD content LONGTEXT DEFAULT NULL, ADD img_art VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, event_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, img_art VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_BFDD316871F7E88B (event_id), INDEX IDX_BFDD3168A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316871F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE events DROP content, DROP img_art');
    }
}
