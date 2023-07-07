<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704100605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE civil_state (id INT AUTO_INCREMENT NOT NULL, birthname VARCHAR(100) DEFAULT NULL, nationality VARCHAR(255) NOT NULL, birthday DATE NOT NULL, city VARCHAR(150) NOT NULL, zipcode VARCHAR(5) DEFAULT NULL, country VARCHAR(255) NOT NULL, socialsecuritynumber INT NOT NULL, cpam VARCHAR(150) NOT NULL, man TINYINT(1) NOT NULL, woman TINYINT(1) NOT NULL, maried TINYINT(1) NOT NULL, single TINYINT(1) NOT NULL, children INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employment_situation (id INT AUTO_INCREMENT NOT NULL, is_pe TINYINT(1) NOT NULL, is_indemnisation_pe TINYINT(1) NOT NULL, inscrit_since LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', pe_id VARCHAR(9) NOT NULL, indemnistaion_type VARCHAR(255) DEFAULT NULL, indemnisation_end DATE DEFAULT NULL, is_rsa TINYINT(1) NOT NULL, is_aah TINYINT(1) NOT NULL, is_ass TINYINT(1) NOT NULL, is_aspa TINYINT(1) NOT NULL, other_perception VARCHAR(100) DEFAULT NULL, ml VARCHAR(255) DEFAULT NULL, ml_tel VARCHAR(14) DEFAULT NULL, advisor VARCHAR(100) DEFAULT NULL, advisor_tel VARCHAR(14) DEFAULT NULL, advisor_mail VARCHAR(180) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, lastclass VARCHAR(150) NOT NULL, schoolleavingdate DATE DEFAULT NULL, since DATE DEFAULT NULL, lastdiplomaobtained VARCHAR(255) NOT NULL, lvl3 TINYINT(1) NOT NULL, lvl4 TINYINT(1) NOT NULL, lvl5 TINYINT(1) NOT NULL, lvl6 TINYINT(1) NOT NULL, lvl6_2 TINYINT(1) NOT NULL, lvl7 TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(150) NOT NULL, departement VARCHAR(255) NOT NULL, tel VARCHAR(14) NOT NULL, tel2 VARCHAR(14) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE civil_state');
        $this->addSql('DROP TABLE employment_situation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
