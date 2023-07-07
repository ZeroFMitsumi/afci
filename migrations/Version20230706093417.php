<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706093417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_ajout (id INT AUTO_INCREMENT NOT NULL, stagiaire_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_pe TINYINT(1) NOT NULL, is_asp TINYINT(1) NOT NULL, asp_created_at DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_session (id INT AUTO_INCREMENT NOT NULL, session_id VARCHAR(13) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', location VARCHAR(180) NOT NULL, designation VARCHAR(90) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users ADD session_id_id INT DEFAULT NULL, ADD is_valid TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A4392681 FOREIGN KEY (session_id_id) REFERENCES information_session (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9A4392681 ON users (session_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A4392681');
        $this->addSql('DROP TABLE admin_ajout');
        $this->addSql('DROP TABLE information_session');
        $this->addSql('DROP INDEX IDX_1483A5E9A4392681 ON users');
        $this->addSql('ALTER TABLE users DROP session_id_id, DROP is_valid, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
