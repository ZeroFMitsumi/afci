<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706222949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employment_situation ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE employment_situation ADD CONSTRAINT FK_5AB4661C9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5AB4661C9D86650F ON employment_situation (user_id_id)');
        $this->addSql('ALTER TABLE formation ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BF9D86650F ON formation (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employment_situation DROP FOREIGN KEY FK_5AB4661C9D86650F');
        $this->addSql('DROP INDEX UNIQ_5AB4661C9D86650F ON employment_situation');
        $this->addSql('ALTER TABLE employment_situation DROP user_id_id');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF9D86650F');
        $this->addSql('DROP INDEX UNIQ_404021BF9D86650F ON formation');
        $this->addSql('ALTER TABLE formation DROP user_id_id');
    }
}
