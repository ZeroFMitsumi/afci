<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706135900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A4392681');
        $this->addSql('DROP INDEX IDX_1483A5E9A4392681 ON users');
        $this->addSql('ALTER TABLE users CHANGE session_id_id session_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9613FECDF FOREIGN KEY (session_id) REFERENCES information_session (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9613FECDF ON users (session_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9613FECDF');
        $this->addSql('DROP INDEX IDX_1483A5E9613FECDF ON users');
        $this->addSql('ALTER TABLE users CHANGE session_id session_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A4392681 FOREIGN KEY (session_id_id) REFERENCES information_session (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9A4392681 ON users (session_id_id)');
    }
}
