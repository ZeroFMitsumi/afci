<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706141250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civil_state ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE civil_state ADD CONSTRAINT FK_1721D6F59D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1721D6F59D86650F ON civil_state (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civil_state DROP FOREIGN KEY FK_1721D6F59D86650F');
        $this->addSql('DROP INDEX UNIQ_1721D6F59D86650F ON civil_state');
        $this->addSql('ALTER TABLE civil_state DROP user_id_id');
    }
}
